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
    <title>Edit Media</title>
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
                                <h1 class="h2 mb-0 ls-tight mb-3">Media</h1>
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
                            <form class="px-sm-5" action="../../backend/user/edit_media.php"
                            onsubmit="return showloader()" method="post" enctype="multipart/form-data">
                                <input type="number" hidden name="id"  value="<?php echo $_GET["id"];?>">

                                <input type="text" hidden name="file_old"  value="<?php echo $_GET["file"];?>">

                                <div class="mb-3">
                                    <label for="doc_name" class="form-label">Media Title</label>
                                    <input type="text" placeholder="Media Title" required class="form-control" id="name" name="title" 
                                    value="<?php echo $_GET["title"];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Media Description</label>
                                    <textarea type="text" placeholder="Media Description" required  class="form-control" 
                                    id="description" name="description"><?php echo $_GET["description"];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="file">Media File</label>
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