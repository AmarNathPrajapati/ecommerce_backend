<?php

include('../config.php');

if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["id"])){
   
        $redirect_to="../../frontend/user/manage_career.php";
       
        $title=test_input($_POST['title']);
        $id=$_POST["id"];
        $active=$_POST["active"];
        $description=$_POST["description"];
        $job_type=test_input($_POST["job_type"]);

        $job_location=test_input($_POST["job_location"]);

        $job_category=test_input($_POST["job_category"]);
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
               
              
            $stmt="UPDATE `career` SET title=?,description=?,job_type=?,job_location=?,job_category=?,php_file_location=?,active=? WHERE id=(?)";
            $sql=mysqli_prepare($conn, $stmt);
        
            //binding the parameters to prepard statement
            
            if ($_POST["description"]) {
                $description=$_POST["description"];
            } else {
                $description="Not Available";
            }
            
            mysqli_stmt_bind_param($sql,"ssssssii",$title,$description,$job_type,$job_location,$job_category,$php_file_location,$active,$id);
        
        
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
                            window.location.href="'.$redirect_to.'"
                        <script>';
            }



          
    
}
else {
    $redirect_to="../../frontend/user/manage_career.php";
    echo '<script>
                                alert("Please fill all the required fields")
                                window.location.href="'.$redirect_to.'"
                                <script>';
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