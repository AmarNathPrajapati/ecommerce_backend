<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
    header("location: ./login.php");
}
include("../../backend/config.php");
$stmt = "SELECT name FROM users WHERE id=(?) AND is_admin=(?) LIMIT 1";
$sql = mysqli_prepare($conn, $stmt);

//binding the parameters to prepard statement

$is_admin = 1;

mysqli_stmt_bind_param($sql, "ii", $_SESSION["admin_id"], $is_admin);
$result = mysqli_stmt_execute($sql);

if (!empty($result) && isset($result)) {
    $data = mysqli_stmt_get_result($sql);
    $user_name = mysqli_fetch_array($data);
    if (empty($user_name)) {
        # code...
        session_destroy();
?>
        <script>
            alert("Sorry something went wrong. Please login again.");
            window.location.href = "./login.php";
        </script>
<?php

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./user_components/header_links.php'); ?>
    <title>Dashboard</title>

    <style>
        .tags {
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .tags li {
            float: left;
        }

        .tag {
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;

            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2 {
            max-width: 100px !important;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2::-webkit-scrollbar {
            display: none;
        }

        .tag::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }

        .tag::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .tag:hover {
            background-color: blue;
            color: white;
        }

        .tag:hover::after {
            border-left-color: blue;
        }
    </style>
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
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a> -->

                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">

                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <div class="alert alert-primary" role="alert">
                Hello <?php echo $user_name['name']; ?>
            </div>
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <!-- 
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./contact_queries.php" id="activity_form23" method="get">
                                <a  onclick="document.getElementById('activity_form23').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8" >
                                                    <span 
                                                    class="h6 font-semibold text-muted 
                                                    text-sm d-block mb-2 text-truncate">Contact Queries</span>
                                                    <?php

                                                    // $stmt="SELECT count(id) FROM `contact_us` WHERE deleted_at IS NULL";
                                                    // $sql=mysqli_prepare($conn, $stmt);

                                                    // $is_admin=0;
                                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);

                                                    // $result=mysqli_stmt_execute($sql);
                                                    //     if ($result){
                                                    //         $data= mysqli_stmt_get_result($sql);
                                                    //         $sno=1;
                                                    //         while ($row = mysqli_fetch_array($data)){
                                                    //     
                                                    ?>
                                                                <span class="h3 font-bold mb-0"><?php
                                                                                                //echo $row[0]; 
                                                                                                ?></span>
                                                            <?php //}
                                                            //}
                                                            ?>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-people"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                        </div> -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./manage_order_details.php" id="activity_form26" method="get">
                                <a onclick="document.getElementById('activity_form26').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="h6 font-semibold text-muted 
                                                    text-sm d-block mb-2 text-truncate">Order Details</span>
                                                    <?php

                                                    $stmt = "SELECT count(order_id) FROM `order_details` WHERE deleted_at IS NULL";
                                                    $sql = mysqli_prepare($conn, $stmt);

                                                    // $is_admin=0;
                                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);

                                                    $result = mysqli_stmt_execute($sql);
                                                    if ($result) {
                                                        $data = mysqli_stmt_get_result($sql);
                                                        $sno = 1;
                                                        while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                            <span class="h3 font-bold mb-0"><?php echo $row[0]; ?></span>
                                                    <?php }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-bag-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./customers.php" id="activity_form28" method="get">
                                <a onclick="document.getElementById('activity_form28').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="h6 font-semibold text-muted 
                                                    text-sm d-block mb-2 text-truncate">Customers</span>
                                                    <?php

                                                    $stmt = "SELECT count(id) FROM `customers` WHERE deleted_at IS NULL";
                                                    $sql = mysqli_prepare($conn, $stmt);

                                                    // $is_admin=0;
                                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);

                                                    $result = mysqli_stmt_execute($sql);
                                                    if ($result) {
                                                        $data = mysqli_stmt_get_result($sql);
                                                        $sno = 1;
                                                        while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                            <span class="h3 font-bold mb-0"><?php echo $row[0]; ?></span>
                                                    <?php }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./manage_currency.php" id="activity_form27" method="get">
                                <a onclick="document.getElementById('activity_form27').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="h6 font-semibold text-muted 
                                                    text-sm d-block mb-2 text-truncate">Currency</span>
                                                    <?php

                                                    $stmt = "SELECT count(id) FROM `currency` WHERE deleted_at IS NULL";
                                                    $sql = mysqli_prepare($conn, $stmt);

                                                    // $is_admin=0;
                                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);

                                                    $result = mysqli_stmt_execute($sql);
                                                    if ($result) {
                                                        $data = mysqli_stmt_get_result($sql);
                                                        $sno = 1;
                                                        while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                            <span class="h3 font-bold mb-0"><?php echo $row[0]; ?></span>
                                                    <?php }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                                            <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./manage_categories.php" id="activity_form25" method="get">
                                <a onclick="document.getElementById('activity_form25').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="h6 font-semibold text-muted 
                                                    text-sm d-block mb-2 text-truncate">Categories</span>
                                                    <?php

                                                    $stmt = "SELECT count(id) FROM `services` WHERE deleted_at IS NULL";
                                                    $sql = mysqli_prepare($conn, $stmt);

                                                    // $is_admin=0;
                                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);

                                                    $result = mysqli_stmt_execute($sql);
                                                    if ($result) {
                                                        $data = mysqli_stmt_get_result($sql);
                                                        $sno = 1;
                                                        while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                            <span class="h3 font-bold mb-0"><?php echo $row[0]; ?></span>
                                                    <?php }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-columns-gap"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./manage_products.php" id="activity_form24" method="get">
                                <a onclick="document.getElementById('activity_form24').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="h6 font-semibold text-muted 
                                                    text-sm d-block mb-2 text-truncate">Products</span>
                                                    <?php

                                                    $stmt = "SELECT count(id) FROM `product` WHERE deleted_at IS NULL";
                                                    $sql = mysqli_prepare($conn, $stmt);

                                                    // $is_admin=0;
                                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);

                                                    $result = mysqli_stmt_execute($sql);
                                                    if ($result) {
                                                        $data = mysqli_stmt_get_result($sql);
                                                        $sno = 1;
                                                        while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                            <span class="h3 font-bold mb-0"><?php echo $row[0]; ?></span>
                                                    <?php }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                        <i class="bi bi-bag-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>


                </div>
            </main>
        </div>
    </div>

    <script>
        function confirm_delete() {
            var confirm_del = confirm("Are you sure ?");
            if (confirm_del == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <?php require('./user_components/scripts.php'); ?>

</body>

</html>