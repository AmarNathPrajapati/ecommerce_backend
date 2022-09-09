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
    <title>New Product</title>
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
                                <h1 class="h2 mb-0 ls-tight mb-3">Add New Product's Details</h1>
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
                        <!-- <div class="card-header">user
                            <h5 class="mb-0">Documents</h5>
                        </div> -->

                        <div class="form-box px-sm-5 mb-5">
                            <form class="px-sm-5" action="../../backend/user/new_product.php" onsubmit="return showloader()" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Product Category</label><br>
                                    <!-- dynamic categories -->
                                    <select required name="post_category" id="category_name">
                                        <option disabled selected>Select Categories</option>
                                        <?php
                                        $stmt = "SELECT id,service_name,created_at FROM `services` WHERE services.deleted_at IS NULL ORDER BY created_at DESC";
                                        $sql = mysqli_prepare($conn, $stmt);
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
                                    <input required type="text" placeholder="Title" class="form-control" id="name" name="post_title">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Product Description</label>
                                    <textarea type="text" placeholder="Description" class="form-control" rows="3" id="description" name="post_description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="currency" class="form-label">Select Currency</label><br>
                                    <!-- dynamic categories -->
                                    <select name="currency" id="currency">
                                        <?php
                                        $stmt = "SELECT service_name,currency_symbol FROM `currency` WHERE currency.deleted_at IS NULL ORDER BY created_at DESC";
                                        $sql = mysqli_prepare($conn, $stmt);
                                        $result = mysqli_stmt_execute($sql);
                                        if ($result) {
                                            $data = mysqli_stmt_get_result($sql);
                                            while ($row = mysqli_fetch_array($data)) {
                                        ?>
                                                <option value="<?php echo $row['currency_symbol']; ?>"><?php echo $row['service_name'] . " " . $row['currency_symbol']; ?></option>
                                        <?php
                                            } 
                                        }
                                        ?>
                                    </select> <br>
                                    <!-- dynamic categories -->
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Actual Price</label>
                                    <input required type="number" placeholder="Actual Price" class="form-control" id="name" name="actual_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Sale Price</label>
                                    <input type="number" placeholder="Sale Price" class="form-control" id="name" name="sale_price">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Cost Price</label>
                                    <input type="number" placeholder="Cost Price" class="form-control" id="name" name="cost_price">
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
                                    <input type="text" placeholder="SKU Number" class="form-control" id="name" name="sku_number">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Quantity</label>
                                    <input type="text" placeholder="Qunatity" class="form-control" id="name" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Select weight Unit</label>
                                    <select  name="weight_unit" id="">
                                        <option value="Kg">Kg</option>
                                        <option value="gram">gram</option>
                                        <option value="mg">mg</option>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Weight</label>
                                    <input type="number" placeholder="Weight" class="form-control" id="name" name="weight">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Shippable Products to all pincodes</label>
                                    <input type="text" placeholder="pincode" class="form-control" id="name" name="pincode">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Tag</label>
                                    <input type="text" placeholder="Tag" class="form-control" id="name" name="tag">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Marketing Angle</label>
                                    <input type="text" placeholder="Marketing Angle" class="form-control" id="name" name="marketing_angle">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="file">Product image/video</label>
                                    <input type="file" accept=".png,.jpg,.jpeg,video/*" class="form-control" name="document" id="file">
                                    <p class="text-danger">Only .png,.jpg,.jpeg,.mp4 type file formate and less than 5 mb file is supportted.</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="file">Status</label>
                                    <select class="form-select mb-3" name="active">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>


    <?php require('./user_components/scripts.php'); ?>

</body>

</html>