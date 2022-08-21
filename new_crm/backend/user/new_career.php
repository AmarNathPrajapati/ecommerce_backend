<?php

include('../config.php');

$redirect_to=$_SERVER['HTTP_REFERER'];
if (!empty($_POST['post_title']) && !empty($_POST['post_description'])) {
        
        $title=test_input($_POST['post_title']);
        $description=$_POST["post_description"];
        $active=$_POST["active"];
        $job_type=test_input($_POST['job_type']);
        $job_location=test_input($_POST['job_location']);
        $job_category=test_input($_POST['job_category']);

        $folder_name = str_replace(' ', '_', $title);

          $content = '
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <?php
                        include("../components/header_links.php")
                        ?>
                        <title>'.$title.'</title>
                    </head>

                    <body>
                        <!-- Navbar -->
                        <?php
                        include("../components/navbar.php")
                        ?>
                        <div class="container">
                            <h1 id="post-title" class="text-center my-5">'.$title.'</h1>
                           
                            <div class="row">
                                <div class="col-12">'. $description.'</div>
                            </div>
                            <a href="mailto:recruitment@oremuscorp.com" class="fw-bold btn btn-lg btn-outline-primary mb-3 d-grid gap-3 ">
                                Apply Now
                            </a>
                        </div>
                        <!-- Footer -->
                        <?php
                        include("../components/footer.php")
                        ?>
                        <?php
                        include("../components/scripts.php")
                        ?>
                    </body>

                    </html>';

        $dir="../../../career/".$folder_name;
        if (!is_dir( $dir )) {
            mkdir($dir,0777, true);
        } 


        $fp = fopen($dir."/index.php","wb");
        fwrite($fp,$content);
        fclose($fp);
        $php_file_location="career/".$folder_name."/index.php";

        $stmt="INSERT INTO `career` (title,description,job_type,job_location,job_category,php_file_location,active) 
        VALUES (?,?,?,?,?,?,?)";
        $sql=mysqli_prepare($conn, $stmt);
    
        //binding the parameters to prepard statement
        
        mysqli_stmt_bind_param($sql,"ssssssi",$title,$description,$job_type,$job_location,$job_category,$php_file_location,$active);
    
        $result=mysqli_stmt_execute($sql);
    
        if ($result) {
            echo '<script>
                    
                    window.location.href="'.$redirect_to.'";
                    </script>';
        } 
        else {
            echo mysqli_error($conn);
    
            echo '<script>
                alert("Something went wrong. We are facing some technical issue. It will be resolved soon. "'.mysqli_error($conn).')
                    history.back();
                <script>';
        }
    
}

else{
    echo '<script>
    alert("Technical Issue.");
   
    </script>';   

    echo $_POST['post_title']." ".$_POST['active']." ".$_FILES["document"];
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    if ($data=="" || $data==null) {
        $data="Not Available";
    }
    return $data;
}
?>