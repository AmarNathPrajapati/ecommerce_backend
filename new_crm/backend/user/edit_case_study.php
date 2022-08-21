<?php

include('../config.php');

if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["id"] && !empty($_POST["file_old"]))){
    if (!empty($_FILES["document"]['name'])) {
        $redirect_to="../../frontend/user/manage_case_study.php";
        $file=$_FILES['document'];
        $title=$_POST['title'];
        $id=$_POST["id"];
        $file_old=$_POST["file_old"];
        $active=$_POST["active"];
        $description=$_POST["description"];
        $folder_name = str_replace(' ', '_', $title); 
       
       
        // $fromlocation=$_POST["from_location"];
        $fileName=$_FILES['document']['name'];
        $fileTmpName=$_FILES['document']['tmp_name'];
        $fileSize=$_FILES['document']['size'];
        $fileError=$_FILES['document']['error'];
        $fileType=$_FILES['document']['type'];
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('pdf','jpg','png','jpeg','docs','docx',"mp4");
        $fileNameNew= $fileExt[0].uniqid('',true).".".$fileActualExt;
       if (in_array($fileActualExt,$allowed)) {
           if ($fileError==0) {
               if ($fileSize<=6000000) {
                   $structure = '../../documents/case_study';

                   if($fileActualExt=="mp4") {
                    $media='<video style="max-width:100%; margin:auto; object-fit:cover;" class="card-img-top" controls>
                    <source src="../../crm/documents/case_study/'.$fileNameNew.'" type="video/mp4">
                </video>';
                } else {
                   
                    $media='<img src="../../crm/documents/case_study/'.$fileNameNew.'" style="max-width:100%; margin:auto; object-fit:cover;" class="card-img-top" alt="img">';
                    
                }
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
    <title>'. $title.'</title>
</head>

<body>
    <!-- Navbar -->
    <?php
    include("../components/navbar.php")
    ?>
    <div class="container">
        <h1 id="post-title" class="text-center my-5">'. $title.'</h1>
        '.$media.'
        <p  class="mt-4" style="font-size:20px;text-align:"justify";">'. $description.'</p>
        
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
                $dir="../../../case_study/".$folder_name;
                if (!is_dir( $dir )) {
                    mkdir($dir,0777, true);
                } 
        
        
                $fp = fopen($dir."/index.php","wb");
                fwrite($fp,$content);
                fclose($fp);
                $php_file_location="case_study/".$folder_name."/index.php";
                        if(!is_dir($structure)){
                          
                            //Directory does not exist, so lets create it.
                            mkdir($structure, 0777, true);
                            $fileDestination=$structure."/".$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            unlink('../../documents/case_study/'.$_POST["old_file"]);

                            $stmt="UPDATE `case_study` SET title=?,description=?,file=?,file_type=?,php_file_location=?,active=? WHERE id=(?)";
                            $sql=mysqli_prepare($conn, $stmt);
                        
                            //binding the parameters to prepard statement
                          
                            if ($_POST["description"]) {
                                $description=$_POST["description"];
                            } else {
                                $description="Not Available";
                            }
                            
                            mysqli_stmt_bind_param($sql,"sssssii",$title,$description,$fileNameNew,$fileActualExt,$php_file_location,$active,$id);
                        
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
                        else{
                            $fileDestination=$structure."/".$fileNameNew;

                            move_uploaded_file($fileTmpName, $fileDestination);
                            unlink('../../documents/case_study/'.$_POST["old_file"]);
                            $stmt="UPDATE `case_study` SET title=?,description=?,file=?,file_type=?,php_file_location=?,active=? WHERE id=(?)";
                            $sql=mysqli_prepare($conn, $stmt);
                        
                            //binding the parameters to prepard statement
                          
                            if ($_POST["description"]) {
                                $description=$_POST["description"];
                            } else {
                                $description="Not Available";
                            }
                            
                            mysqli_stmt_bind_param($sql,"sssssii",$title,$description,$fileNameNew,$fileActualExt,$php_file_location,$active,$id);
                        
                        
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

                }

                else {
                    // error is due to larger file
                    $fileSizeInMb=$fileSize/1000;
                   
                    echo '<script>
                     alert("Your file size is'. $fileSizeInMb.'kb. Only less than 6MB files are supported.");
                     window.location.href="'.$redirect_to.'";
                    </script>';
                }

           }
           else{
            echo $fileError;
            echo '<script>
            alert("Sorry there is an error in your file ->'.$fileError.'");
            window.location.href="'.$redirect_to.'";
           </script>';
           }
       }
       else {
        echo '<script>
        alert("Your file of type *'.end($fileExt).'* . This type of File formate is not supported.");
        window.location.href="'.$redirect_to.'";
        </script>';
       }
    
}
else{
    $redirect_to="../../frontend/user/manage_case_study.php";
    $title=$_POST['title'];
    $id=$_POST["id"];
    $active=$_POST["active"];
    
    $stmt="UPDATE `case_study` SET title=?, description=?,php_file_location=?,active=? WHERE id=(?)";
    $sql=mysqli_prepare($conn, $stmt);




    //binding the parameters to prepard statement
    
    if ($_POST["description"]) {
        $description=$_POST["description"];
    } else {
        $description="Not Available";
    }
    $folder_name=$_POST["title"];

    if($_POST["old_file_type"]=="mp4") {
        $media='<video style="max-width:100%; margin:auto; object-fit:cover;" class="card-img-top" controls>
        <source src="../../crm/documents/case_study/'.$_POST["old_file"].'" class="d-block mx-auto mb-0" style="object-fit:cover; width:65%;" type="video/mp4">
    </video>';
    } else {
       
        $media='<img src="../../crm/documents/case_study/'.$_POST["old_file"].'" class="d-block mx-auto mb-0" style="object-fit:cover; width:65%;" alt="img">';
        
    }
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
    <title>'. $title.'</title>
</head>

<body>
    <!-- Navbar -->
    <?php
    include("../components/navbar.php")
    ?>
    <div class="container">
        <h1 id="post-title" class="text-center my-5">'. $title.'</h1>
        '.$media.'
        <p  class="mt-4" style="font-size:20px;text-align:"justify";">'. $description.'</p>
        
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
    $dir="../../../case_study/".$folder_name;
    if (!is_dir( $dir )) {
        mkdir($dir,0777, true);
    } 


    $fp = fopen($dir."/index.php","wb");
    fwrite($fp,$content);
    fclose($fp);
    $php_file_location="case_study/".$folder_name."/index.php";
    
    mysqli_stmt_bind_param($sql,"sssii",$title,$description,$php_file_location,$active,$id);

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
} else {
    $redirect_to="../../frontend/user/manage_case_study.php";
    echo '<script>
                                alert("Please fill all the required fields")
                                window.location.href="'.$redirect_to.'"
                                <script>';
}


?>