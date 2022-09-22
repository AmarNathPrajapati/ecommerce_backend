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
                                <h1 class="h2 mb-0 ls-tight mb-3">Edit discount on Category</h1>
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
                            <form class="px-sm-5" action="../../backend/user/edit_freeship.php" onsubmit="return showloader()" method="post" enctype="multipart/form-data">

                                <input type="number" hidden name="id" value="<?php echo $_POST["id"]; ?>">

                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Product Category</label><br>
                                    <!-- dynamic categories -->
                                    <select name="category" id="category_name">
                                        <option value="<?php echo $_POST["category"]; ?>" selected><?php echo $_POST["category"]; ?></option>
                                        <?php
                                        $stmt = "SELECT distinct id,title FROM `product` WHERE product.deleted_at IS NULL ORDER BY created_at DESC";
                                        $sql = mysqli_prepare($conn, $stmt);
                                        $result = mysqli_stmt_execute($sql);
                                        if ($result) {
                                            $data = mysqli_stmt_get_result($sql);
                                            while ($row = mysqli_fetch_array($data)) {
                                                if ($_POST["category"] == $row['title'])
                                                    continue;
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
                                    <option value="<?php echo $_POST["currency"]; ?>" selected><?php echo $_POST["currency"]; ?></option>

                                    <?php
                                    $stmt = "SELECT service_name,currency_symbol FROM `currency` WHERE currency.deleted_at IS NULL ORDER BY created_at DESC";
                                    $sql = mysqli_prepare($conn, $stmt);
                                    $result = mysqli_stmt_execute($sql);
                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        while ($row = mysqli_fetch_array($data)) {
                                            $curr = $row['service_name'] . " " . $row['currency_symbol'];
                                            if ($_POST["currency"] == $curr)
                                                continue;
                                    ?>
                                            <option value="<?php echo $row['service_name'] . " " . $row['currency_symbol']; ?>"><?php echo $row['service_name'] . " " . $row['currency_symbol']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select> <br>
                               
                                <label class="my-2" for="">Discount Type</label> <br>
                                <select name="dis_type" id="">
                                    <option value="<?php echo $_POST["dis_type"]; ?>"><?php echo $_POST["dis_type"]; ?></option>
                                    <option value="percentage">percentage(%)</option>
                                    <option value="Value in Currency">value in currency</option>
                                </select> <br>
                                <div class="mb-3">
                                    <label class="my-2" for="doc_name" class="form-label">Discount value/percentage</label>
                                    <input value="<?php echo $_POST["value_per"]; ?>" type="number" placeholder="Cost Price" required class="form-control" id="name" name="value_per">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Start Date</label>
                                    <input value="<?php echo $_POST["start_date"]; ?>" type="date" placeholder="SKU Number" required class="form-control" id="name" name="start_date">
                                </div>
                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">End Date</label>
                                    <input value="<?php echo $_POST["end_date"]; ?>" type="date" placeholder="Qunatity" required class="form-control" id="name" name="end_date">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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