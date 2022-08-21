<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
  header("location: ./login.php");
}
include("../../backend/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
   
    <?php require('./user_components/header_links.php'); ?>
    <link rel="stylesheet" href="./css/new_document.css">
    <title>Edit Product</title>
</head>

<body>

<div id="loader" class="center"></div>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require('./user_components/side_bar.php'); ?>


        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight mb-3">Update Product</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">

                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">


                    <div class="card shadow border-0 mb-7 p-sm-5">
                        <div class="form-box px-sm-5 mb-5">
                            <form class="px-sm-5" action="../../backend/user/edit_product.php"
                            onsubmit="return showloader()" method="post" enctype="multipart/form-data">
 
                                <input type="number" hidden name="id"  value="<?php echo $_GET["id"];?>">
                                <input type="text" hidden name="file_old"  value="<?php echo $_GET["file"];?>">
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Product Category</label><br>
                                    <!-- dynamic categories -->
                                    <select name="post_category" id="category_name">
                                        <option disabled selected >Select Categories</option>
                                    <?php
                                     $stmt="SELECT id,service_name,created_at FROM `services` WHERE services.deleted_at IS NULL ORDER BY created_at DESC";
                                     $sql=mysqli_prepare($conn, $stmt);
                                    $result = mysqli_stmt_execute($sql);
                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                                <option value="<?php echo $row['service_name']; ?>"><?php echo $row['service_name']; ?></option>
                                                <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Product Title</label>
                                    <input type="text" placeholder="Case Study Title" required class="form-control" id="name" name="title" 
                                    value="<?php echo $_GET["title"];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Product Description</label>
                                    <textarea type="text" placeholder="Case Study Description" required  
                                    class="form-control" id="description" name="description"><?php echo $_GET["description"];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Actual Price</label>
                                    <input value="<?php echo $_GET["actual_price"];?>" type="text" placeholder="Actual Price" required class="form-control" id="name" name="actual_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Sale Price</label>
                                    <input value="<?php echo $_GET["sale_price"];?>" type="text" placeholder="Sale Price" required class="form-control" id="name" name="sale_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Cost Price</label>
                                    <input value="<?php echo $_GET["cost_price"];?>" type="text" placeholder="Cost Price" required class="form-control" id="name" name="cost_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Discounted Price</label>
                                    <select class="form-select mb-3" name="enable">
                                        <option value="0">Disable</option>
                                        <option value="1">enable</option>
                                    </select>
                                </div> 
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">SKU Number</label>
                                    <input value="<?php echo $_GET["sku_number"];?>" type="text" placeholder="SKU Number" required class="form-control" id="name" name="sku_number">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Quantity</label>
                                    <input value="<?php echo $_GET["quantity"];?>" type="text" placeholder="Qunatity" required class="form-control" id="name" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Weight</label>
                                    <input value="<?php echo $_GET["weight"];?>" type="text" placeholder="Weight" required class="form-control" id="name" name="weight">
                                </div>
                               
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Tag</label>
                                    <input value="<?php echo $_GET["tag"];?>" type="text" placeholder="Tag" required class="form-control" id="name" name="tag">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Marketing Angle</label>
                                    <input value="<?php echo $_GET["marketing_angle"];?>" type="text" placeholder="Marketing Angle" required class="form-control" id="name" name="tag">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="file">Product Image/Video</label>
                                    <input type="file"  accept=".png,.jpg,.jpeg,video/*" class="form-control" name="document" id="file">
                                    <p class="text-danger">Only .png,.jpg,.jpeg,.mp4 type file formate and less than 5 mb file is supportted.</p>
                                </div>
                                <input type="text" name="old_file" hidden readonly value="<?php echo $_GET["file"]; ?>">
                                <input type="text" name="old_file_type" hidden readonly value="<?php echo $_GET["old_file_type"]; ?>">

                                <select class="form-select mb-3" name="active">
                                    
                                    <option <?php echo $_GET["active"]==0?"selected":""?> value="0">Inactive</option>
                                    <option <?php echo $_GET["active"]==1?"selected":""?> value="1">Active</option>
                                    
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


<?php require('./user_components/scripts.php');?>

</body>

</html>