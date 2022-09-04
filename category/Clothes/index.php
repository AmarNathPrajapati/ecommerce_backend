<!DOCTYPE html>
<html lang="en">
<?php
include('../../crm/backend/config.php');
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Hello
                <?php
                session_start();
                echo $_SESSION['username'];
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                    <!-- Button trigger modal -->
                    <a href="./crm/backend/user/new_customer_logout.php" type="button" class="btn btn-primary">
                        logout
                    </a>


            </div>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
        </div>
    </nav>
    <!-- categories list -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown mx-3">
                        <div class="mb-3">
                            <!-- dynamic categories -->
                            <div class="dropdown">
                                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Product Category
                                </a>


                                <ul class="dropdown-menu">
                                    <?php
                                    $stmt = "SELECT id,service_name,file,created_at FROM `services` WHERE services.deleted_at IS NULL ORDER BY created_at DESC";
                                    $sql = mysqli_prepare($conn, $stmt);
                                    $result = mysqli_stmt_execute($sql);
                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                            <li>
                                                <a class="dropdown-item" href='<?php echo "/ecommerce/category/" . $row['service_name'] . "/index.php"; ?>'>
                                                    <?php echo $row['service_name']; ?></a>
                                            </li>

                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php
                    $stmt = "SELECT id,service_name,file,created_at FROM `services` WHERE services.deleted_at IS NULL ORDER BY created_at DESC";
                    $sql = mysqli_prepare($conn, $stmt);
                    $result = mysqli_stmt_execute($sql);
                    if ($result) {
                        $data = mysqli_stmt_get_result($sql);
                        while ($row = mysqli_fetch_array($data)) {
                            $category = $row['service_name'];
                    ?>
                            <li class="nav-item dropdown mx-3">
                                <img width="100px" src="<?php echo '../../crm/documents/category/' . $row['file'] ?>" alt="">
                                <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    $stmt1 = "SELECT id,title FROM `product` WHERE product.deleted_at IS NULL AND category = (?) ORDER BY created_at DESC";
                                    $sql1 = mysqli_prepare($conn, $stmt1);
                                    mysqli_stmt_bind_param($sql1, 's', $category);
                                    $result1 = mysqli_stmt_execute($sql1);
                                    if ($result1) {
                                        $data1 = mysqli_stmt_get_result($sql1);
                                        while ($row1 = mysqli_fetch_array($data1)) {
                                    ?>
                                            <li><a class="dropdown-item" href="#"><?php echo $row1['title']; ?></a></li>

                                    <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <!-- Section-->
    <section class="py-5">
        <div class="container-fluid mt-5">

            <!-- <p class="text-center services_desc">We position our clients at the forefront of their field by advancing an agenda.</p> -->
            <!-- <div class="row mb-5">
                <?php
                include('./new_crm/backend/config.php');
                $stmt = "SELECT id,title,description,file,file_type,php_file_location FROM `case_study` 
                     WHERE deleted_at IS NULL AND active=(?) ORDER BY created_at DESC";
                $sql = mysqli_prepare($conn, $stmt);

                mysqli_stmt_bind_param($sql, 'i', $active);
                $active = 1;

                $result = mysqli_stmt_execute($sql);
                if ($result) {
                    $data = mysqli_stmt_get_result($sql);
                    $sno = 1;
                    if ($data->num_rows > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                ?>
                            <?php $loc = $row['php_file_location'] ?>
                            <div class="col-12 mb-5 px-sm-4 col-sm-6 col-md-4 service_col">
                                <div class="card border-0" style="max-width: 100%; margin: auto; cursor: pointer;  height: 100%;" onclick='window.location.href="./<?php echo $loc; ?>"'>

                                    <?php
                                    if ($row["file_type"] == "mp4") {
                                    ?>
                                        <video style="height:200px; width:100%; object-fit:cover;" class="card-img-top" controls>
                                            <source src="./new_crm/documents/products/<?php echo $row["file"]; ?>" type="video/mp4">
                                        </video>

                                    <?php
                                    } else if ($row["file_type"] == "0") {
                                    ?>
                                        <img src="./new_crm/default.png" style="max-width:100%; height:200px; margin:auto; object-fit:cover;" class="card-img-top" alt="img">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="./new_crm/documents/products/<?php echo $row["file"]; ?>" style="max-width:100%; height:200px; margin:auto; object-fit:cover;" class="card-img-top" alt="img">
                                    <?php
                                    }

                                    ?>
                                    <div class="card-body" style="background-color: #252B42;">

                                        <h5 class="card-title"><?php echo $row["title"] == null ? "Not Available" : $row["title"]; ?></h5>
                                        <p class="card-text" style="width: 100%;white-space: nowrap;overflow: hidden; text-overflow: ellipsis;"><?php echo $row["description"] == null ? "Not Available" : $row["description"]; ?> <br>
                                            <button class="btn mt-2 btn-primary" onclick='window.location.href="./<?php echo $loc; ?>"'>Read More</button>
                                        </p>

                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        mysqli_stmt_close($sql);
                    } else {
                        ?><h2>No Case Study Available</h2><?php
                                                        }
                                                    } else {
                                                        echo mysqli_error($conn);
                                                    }
                                                            ?>

            </div> -->
        </div>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                // echo $_GET['document_id12'];
                $category = "Clothes";
                $stmt = "SELECT id,category,title,description,file,file_type,active,created_at,category,currency,actual_price,sale_price,cost_price,sku_number,quantity,weight,tag,marketing_angle FROM `product` 
                                    WHERE deleted_at IS NULL AND active=(?) AND category =(?) ORDER BY created_at DESC";
                $sql = mysqli_prepare($conn, $stmt);

                mysqli_stmt_bind_param($sql, 'is', $active, $category);
                $active = 1;
                $result = mysqli_stmt_execute($sql);

                if ($result) {
                    $data = mysqli_stmt_get_result($sql);
                    $sno = 1;
                    while ($row = mysqli_fetch_array($data)) {
                ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src='<?php echo "../../crm/documents/products/" . $row['file']; ?>' alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">
                                            <?php
                                            echo $row['title'];
                                            ?>
                                        </h5>
                                        <!-- Product price-->
                                        <p style="text-decoration: line-through;">
                                            <?php
                                            echo $row['actual_price'] . " " . $row['currency'];
                                            ?>
                                        </p>
                                        <p>
                                            <?php
                                            echo $row['sale_price'] . " " . $row['currency'];
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <!-- Product actions-->

                                <form action="./crm//frontend//user//product_details.php" method="post">
                                    <input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden>
                                    <input type="number" name="active" value="<?php echo $row["active"]; ?>" hidden>
                                    <input type="text" name="file" value="<?php echo $row["file"]; ?>" hidden>

                                    <input type="text" name="category" value="<?php echo $row["category"]; ?>" hidden>

                                    <input type="text" name="title" value="<?php echo $row["title"]; ?>" hidden>
                                    <input type="text" name="old_file_type" value="<?php echo $row["file_type"]; ?>" hidden>
                                    <input type="text" name="description" value="<?php echo $row["description"]; ?>" hidden>
                                    <input type="text" name="actual_price" value="<?php echo $row["actual_price"]; ?>" hidden>
                                    <input type="text" name="sale_price" value="<?php echo $row["sale_price"]; ?>" hidden>
                                    <input type="text" name="cost_price" value="<?php echo $row["cost_price"]; ?>" hidden>
                                    <input type="text" name="sku_number" value="<?php echo $row["sku_number"]; ?>" hidden>
                                    <input type="text" name="quantity" value="<?php echo $row["quantity"]; ?>" hidden>
                                    <input type="text" name="weight" value="<?php echo $row["weight"]; ?>" hidden>
                                    <input type="text" name="tag" value="<?php echo $row["tag"]; ?>" hidden>
                                    <input type="text" name="marketing_angle" value="<?php echo $row["marketing_angle"]; ?>" hidden>

                                    
                                    
                                </form>
                                <button class="btn btn-sm btn-outline-primary h-50 my-2">
                                    Add to Cart
                                </button>
                                <button class="btn btn-sm btn-outline-primary h-50">
                                    Order Now
                                </button>

                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>