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
    <title>Shipping charge on new product</title>
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
                                <h1 class="h2 mb-0 ls-tight mb-3">Add Shipping Charge on particular product</h1>
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
                            <form action="../../backend/user/new_shipping_product.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="category_name" class="form-label">Product Name</label><br>
                                        <!-- dynamic categories -->
                                        <select required name="category" id="category_name">
                                            <option disabled selected>Select product</option>
                                            <?php
                                            $stmt = "SELECT id,title,created_at FROM `product` WHERE product.deleted_at IS NULL ORDER BY created_at DESC";
                                            $sql = mysqli_prepare($conn, $stmt);
                                            $result = mysqli_stmt_execute($sql);
                                            if ($result) {
                                                $data = mysqli_stmt_get_result($sql);
                                                while ($row = mysqli_fetch_array($data)) {
                                            ?>
                                                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
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
                                                <option value="<?php echo $row['service_name'] . " " . $row['currency_symbol']; ?>"><?php echo $row['service_name'] . " " . $row['currency_symbol']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select> <br>

                                    <label class="mt-2" for="">shipping charge Fixed Amount</label>
                                    <input name="fixed_value" type="text" class="form-control " required id="" placeholder="Enter Total Value">

                                    <label for="">shipping Charge based on Pincode </label>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="name">Pincode</label>
                                                <input required class="form-control" type="text" id="name" name="pincode[]" placeholder="Enter Pincode">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone">Shipping Charge</label>
                                                <input required class="form-control" type="text" id="phone" name="pin_value[]" placeholder="Enter Shipping Charges">
                                            </div>
                                            <div class="adding_form">

                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary add_form my-2">Add More Pincode</a>
                                    </div>
                                    <label for="">shipping Charge based on Pincode </label>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="name">Range</label>
                                                <input required class="form-control" type="text" id="name" name="range_km[]" placeholder="Enter Range">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone">Shipping Charge</label>
                                                <input required class="form-control" type="text" id="phone" name="range_value[]" placeholder="Enter Shipping Charges">
                                            </div>
                                            <div class="adding_form1">

                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary add_form1 my-2">Add More Range</a>
                                    </div>
                                </div>
                                <div class="text-center mt-4 mb-2">
                                    <button type="submit" class="btn btn-sm btn-primary w-50">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>


    <?php require('./user_components/scripts.php'); ?>
    <script>
        $(document).ready(function() {
            //adding remove functionality
            // adding more form
            $(document).on("click", '.add_form', function() {
                $('.adding_form').append(' <div class="row main_row">\
                <div class="col-md-4">\
                <label for="name">Pincode</label>\
                <input required class="form-control" type="text" id="name" name="pincode[]" placeholder="Enter\ Pincode">\
                </div>\
                <div class="col-md-4">\
                <label for="phone">Shipping Charge</label>\
                <input required class="form-control" type="text" id="phone" name="pin_value[]" \ placeholder="Enter Shipping Charges">\
                </div>\
                <div class="col-md-4">\
                <button class="btn btn-danger remove_btn mt-4">Remove</button>\
                </div>\
                </div>\
                ');
            })
            $(document).on('click', '.remove_btn', function() {
                $(this).closest('.main_row').remove();
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            //adding remove functionality
            // adding more form
            $(document).on("click", '.add_form1', function() {
                $('.adding_form1').append(' <div class="row main_row">\
                <div class="col-md-4">\
                <label for="name">Range</label>\
                <input required class="form-control" type="text" id="name" name="range_km[]" placeholder="Enter\ Range">\
                </div>\
                <div class="col-md-4">\
                <label for="phone">Shipping Charge</label>\
                <input required class="form-control" type="text" id="phone" name="range_value[]" \ placeholder="Enter Shipping Charges">\
                </div>\
                <div class="col-md-4">\
                <button class="btn btn-danger remove_btn mt-4">Remove</button>\
                </div>\
                </div>\
                ');
            })
            $(document).on('click', '.remove_btn', function() {
                $(this).closest('.main_row').remove();
            })
        })
    </script>
</body>

</html>