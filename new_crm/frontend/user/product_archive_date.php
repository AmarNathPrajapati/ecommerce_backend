<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
  header("location: ../login.php");
}
include("../../backend/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php require('./user_components/header_links.php'); ?>
    <title>Archived Product Queries</title>
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
                                <h1 class="h2 mb-0 ls-tight mb-4">Archived Requested Session</h1>
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
                                    <a href="./product_queries.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <!-- <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span> -->
                                        <span>Go Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <!-- <li class="nav-item ">
                                <a href="./dashboard.php" class="nav-link active">Uploaded By You</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Uploaded By Students</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link font-regular">File requests</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                  

                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <!-- <h5 class="mb-0">Documents</h5> -->
                        </div>
                        <div class="table-responsive" style="padding: 30px 18px;">
                            <table class="table table-hover table-nowrap" id="myTable" style="border: 0px solid black !important; padding: 30px 2px;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="font-size: 16px;">Sno</th>
                                        <th style="font-size: 16px;">Name</th>
                                        <th style="font-size: 16px;">Email</th>
                                        <th style="font-size: 16px;">Phone</th>
                                        <th style="font-size: 16px;">Message</th>
                                        <th style="font-size: 16px;">Product</th>
                                        <th style="font-size: 16px;">Time</th>
                                        <th style="font-size: 15px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    // echo $_GET['document_id12'];
                                   
                                        $stmt="SELECT id, product_query.name AS s_name,product_query.email AS 
                                        s_email,product_query.phone as s_phone,product_query.product as s_product, product_query.message as s_message,
                                           product_query.created_at AS s_created_at FROM product_query 
                                           WHERE product_query.deleted_at IS NULL AND product_query.archive=(?)
                                       ";
                                        $sql=mysqli_prepare($conn, $stmt);
                                        // if (!mysqli_stmt_bind_param($sql)) {
                                        //     # code...
                                        //     echo mysqli_error($conn);
                                        // } 
                                        $archive=1;
                                        mysqli_stmt_bind_param($sql,'i',$archive);
                                        $result=mysqli_stmt_execute($sql);

                                        if ($result){
                                                $data= mysqli_stmt_get_result($sql);
                                                $sno=1;
                                                while ($row = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td style="font-size: 14px;">
                                            <?php echo $sno;?>
                                        </td>

                                        <td style="font-size: 14px;">
                                            <?php echo $row["s_name"];?>
                                        </td>
                                        <td style="font-size: 14px;">
                                            <?php echo $row["s_email"];?>
                                        </td>
                                        <td style="font-size: 14px;">
                                            <?php echo $row["s_phone"];?>
                                        </td>
                                        <td style="font-size: 14px;">
                                            <?php echo $row["s_message"];?>
                                        </td>
                                        <td style="font-size: 14px;">
                                            <?php echo $row["s_product"];?>
                                        </td>
                                        <td style="font-size: 14px;">
                                            <?php echo $row["s_created_at"];?>
                                        </td>
                                        <td style="font-size: 14px;">
                                           <form action="../../backend/user/unarchive_product_data.php" method="post">
                                               <input type="number" hidden value="<?php echo $row["id"]; ?>" name="contact_row_id" readonly>
                                               <button class="btn btn-success p-2">UnArchive</button>
                                           </form>
                                        </td>
                                    </tr>
                                    <?php
                                    $sno++;
                                    }
                                    mysqli_stmt_close($sql);
                                    mysqli_close($conn);
                                }
                                else{
                                    echo mysqli_error($conn);
                                }
                                
                                ?>

                                    <!-- <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Cody Fisher
                                        </a>
                                    </td>
                                    <td>
                                        Apr 10, 2021
                                    </td>
                                    <td>
                                        <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-5.png" class="avatar avatar-xs rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Webpixels
                                        </a>
                                    </td>
                                    <td>
                                        $1.500
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-danger"></i>Canceled
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="card-footer border-0 py-5">
                            <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        </div> -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require('./user_components/scripts.php');?>

</body>

</html>