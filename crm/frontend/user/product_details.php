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
    <title>Product Details</title>
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
                                <h1 class="h2 mb-0 ls-tight mb-3">Product Details</h1>
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
 
                                <input type="number" hidden name="id"  value="<?php echo $_POST["id"];?>">
                                <input type="text" hidden name="file_old"  value="<?php echo $_POST["file"];?>">
                                
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Product Category</label>
                                    <input readonly type="text" placeholder="Product Category" required class="form-control" id="name" name="category" 
                                    value="<?php echo $_POST["category"];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Product Title</label>
                                    <input readonly type="text" placeholder="Product Title" required class="form-control" id="name" name="title" 
                                    value="<?php echo $_POST["title"];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Product Description</label>
                                    <textarea readonly type="text" placeholder="Product Description" required  
                                    class="form-control" id="description" name="description"><?php echo $_POST["description"];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Currency</label>
                                    <input readonly value="<?php echo $_POST["currency"];?>" type="text" placeholder="Actual Price" required class="form-control" id="name" name="currency">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Actual Price</label>
                                    <input readonly value="<?php echo $_POST["actual_price"];?>" type="text" placeholder="Actual Price" required class="form-control" id="name" name="actual_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Sale Price</label>
                                    <input readonly value="<?php echo $_POST["sale_price"];?>" type="text" placeholder="Sale Price" required class="form-control" id="name" name="sale_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Cost Price</label>
                                    <input readonly value="<?php echo $_POST["cost_price"];?>" type="text" placeholder="Cost Price" required class="form-control" id="name" name="cost_price">
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
                                    <input readonly value="<?php echo $_POST["sku_number"];?>" type="text" placeholder="SKU Number" required class="form-control" id="name" name="sku_number">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Quantity</label>
                                    <input readonly value="<?php echo $_POST["quantity"];?>" type="text" placeholder="Qunatity" required class="form-control" id="name" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Weight</label>
                                    <input readonly value="<?php echo $_POST["weight"];?>" type="text" placeholder="Weight" required class="form-control" id="name" name="weight">
                                </div>
                               
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Tag</label>
                                    <input readonly value="<?php echo $_POST["tag"];?>" type="text" placeholder="Tag" required class="form-control" id="name" name="tag">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Marketing Angle</label>
                                    <input readonly value="<?php echo $_POST["marketing_angle"];?>" type="text" placeholder="Marketing Angle" required class="form-control" id="name" name="marketing_angle">
                                </div>
                               
                                <!-- <div class="mb-3">
                                    <label class="form-label" for="file">Product Image/Video</label>
                                    <input type="file"  accept=".png,.jpg,.jpeg,video/*" class="form-control" name="document" id="file">
                                    <p class="text-danger">Only .png,.jpg,.jpeg,.mp4 type file formate and less than 5 mb file is supportted.</p>
                                </div> -->
                                <input readonly type="text" name="old_file" hidden readonly value="<?php echo $_POST["file"]; ?>">
                                <input type="text" name="old_file_type" hidden readonly value="<?php echo $_POST["old_file_type"]; ?>">

                                <select class="form-select mb-3" name="active">
                                    
                                    <option <?php echo $_POST["active"]==0?"selected":""?> value="0">Inactive</option>
                                    <option <?php echo $_POST["active"]==1?"selected":""?> value="1">Active</option>
                                    
                                </select>
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