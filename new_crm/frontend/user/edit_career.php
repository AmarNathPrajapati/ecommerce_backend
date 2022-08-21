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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <title>Edit Career</title>
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
                                <h1 class="h2 mb-0 ls-tight mb-3">Career</h1>
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
                        <!-- <div class="card-header">
                            <h5 class="mb-0">Documents</h5>
                        </div> -->

                        <div class="form-box px-sm-5 mb-5">
                            <form class="px-sm-5" action="../../backend/user/edit_career.php"
                            onsubmit="return showloader()" method="post" enctype="multipart/form-data">
                                <input type="number" hidden name="id"  value="<?php echo $_GET["id"];?>">

                               

                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Job Title*</label>
                                    <input type="text" placeholder="Career Title" required class="form-control" id="name" name="title" 
                                    value="<?php echo $_GET["title"];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Job Description*</label>
                                    <textarea type="text" placeholder="Career Description" required  
                                    class="form-control" id="description" name="description"><?php echo $_GET["description"];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="job_type" class="form-label">Job Type*</label>
                                    <select class="form-select mb-3" name="job_type">
                                        
                                        <option <?php echo $_GET["job_type"]=="Full Time"?"selected":""?> value="Full Time">Full Time</option>
                                        <option <?php echo $_GET["job_type"]=="Part Time"?"selected":""?>  value="Part Time">Part Time</option>
                                        
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="job_location" class="form-label">Job Location*</label>

                                <select class="form-select mb-3" name="job_location">  
                                    <option <?php echo $_GET["job_location"]=="Hydrabad"?"selected":""?> value="Hydrabad">Hydrabad</option>
                                    <option  <?php echo $_GET["job_location"]=="Mumbai"?"selected":""?> value="Mumbai">Mumbai</option>
                                    <option  <?php echo $_GET["job_location"]=="Delhi"?"selected":""?> value="Delhi">Delhi</option>
                                    <option  <?php echo $_GET["job_location"]=="Remote"?"selected":""?> value="Remote">Remote</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="job_category" class="form-label">Job Category</label>
                                    <select class="form-select mb-3" name="job_category">  
                                        <option  value="0">Please Select Job Category</option>
                                        <option  <?php echo $_GET["job_category"]=="Accounts"?"selected":""?> value="Accounts">Accounts</option>
                                        <option  <?php echo $_GET["job_category"]=="Finance"?"selected":""?> value="Finance">Finance</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="active" class="form-label">Job Status*</label>
                                <select  class="form-select mb-3" name="active">
                                    
                                    <option <?php echo $_GET["active"]==1?"selected":""?>  value="1">Active</option>
                                    <option <?php echo $_GET["active"]==0?"selected":""?> value="0">Inactive</option>
                                    
                                </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


<?php require('./user_components/scripts.php');?>

<script>
        CKEDITOR.replace( 'description' );
    </script>

</body>

</html>