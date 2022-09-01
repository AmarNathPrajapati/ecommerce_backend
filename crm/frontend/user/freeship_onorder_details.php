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
                                <h1 class="h2 mb-0 ls-tight mb-3">Discount Details on Order</h1>
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
                               
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Product Name</label>
                                    <input readonly type="text" placeholder="Product Category" required class="form-control" id="name" name="category" 
                                    value="<?php echo $_POST["category"];?>">
                                </div>
                                <!-- category,dis_per,currency,dis_value,total_value,start_date,end_date,created_at -->
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Freeship On Minimum Order</label>
                                    <input readonly value="<?php echo $_POST["dis_value"];?>" type="text" placeholder="Sale Price" required class="form-control" id="name" name="dis_value">
                                </div>

                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Currency</label>
                                    <input readonly value="<?php echo $_POST["currency"];?>" type="text" placeholder="Actual Price" required class="form-control" id="name" name="currency">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Freeship Above Total value</label>
                                    <input readonly value="<?php echo $_POST["total_value"];?>" type="text" placeholder="Cost Price" required class="form-control" id="name" name="total_value">
                                </div> 
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Start Date</label>
                                    <input readonly value="<?php echo $_POST["start_date"];?>" type="text" placeholder="SKU Number" required class="form-control" id="name" name="start_date">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">End Date</label>
                                    <input readonly value="<?php echo $_POST["end_date"];?>" type="text" placeholder="Qunatity" required class="form-control" id="name" name="end_date">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Created At</label>
                                    <input readonly value="<?php echo $_POST["created_at"];?>" type="text" placeholder="Weight" required class="form-control" id="name" name="created_at">
                                </div>
                               
            
                               
                                <!-- <div class="mb-3">
                                    <label class="form-label" for="file">Product Image/Video</label>
                                    <input type="file"  accept=".png,.jpg,.jpeg,video/*" class="form-control" name="document" id="file">
                                    <p class="text-danger">Only .png,.jpg,.jpeg,.mp4 type file formate and less than 5 mb file is supportted.</p>
                                </div> -->
    

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