<?php

include('../config.php');

$redirect_to=$_SERVER['HTTP_REFERER'];
if (!empty($_POST['post_title']) && !empty($_FILES['document']['name']) ) {
        $file=$_FILES['document'];
        $post_title=test_input($_POST['post_title']);
        $post_description=test_input($_POST["post_description"]);
        $active=$_POST["active"];


       

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
                   $structure = '../../documents/media';

                    // create dynamic .php file

                    $folder_name = str_replace(' ', '_', $post_title);
                   
                    $php_file_location="media/".$folder_name."/index.php";
            
                        if(!is_dir($structure)){
                          
                            //Directory does not exist, so lets create it.
                            mkdir($structure, 0777, true);
                            $fileDestination=$structure."/".$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);

                            $stmt="INSERT INTO `media` (title,description,file,file_type,active) VALUES (?,?,?,?,?)";
                            $sql=mysqli_prepare($conn, $stmt);
                        
                            //binding the parameters to prepard statement
                           
                            
                            
                            mysqli_stmt_bind_param($sql,"ssssi",$post_title,$post_description,$fileNameNew,$fileActualExt,$active);
                        
                            $result=mysqli_stmt_execute($sql);
                        
                            if ($result) {
                                echo '<script>
                            alert("Successfully!! Uploaded the file.");
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
                            $fileDestination=$structure."/".$fileNameNew;

                            move_uploaded_file($fileTmpName, $fileDestination);
                            $stmt="INSERT INTO `media` (title,description,file,file_type,active) VALUES (?,?,?,?,?)";
                            $sql=mysqli_prepare($conn, $stmt);
                        
                            //binding the parameters to prepard statement
                           
                            if ($_POST["post_description"]) {
                                $post_description=$_POST["post_description"];
                            } else {
                                $post_description="Not Available";
                            }
                            
                            mysqli_stmt_bind_param($sql,"ssssi",$post_title,$post_description,$fileNameNew,$fileActualExt,$active);
                        
                        
                            $result=mysqli_stmt_execute($sql);
                        
                            if ($result) {
                                echo '<script>
                                        alert("Successfully!! Uploaded the file.");
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

                }

                else {
                    // error is due to larger file
                    $fileSizeInMb=$fileSize/1000;
                   
                    echo '<script>
                     alert("Your file size is'. $fileSizeInMb.'kb. Only less than 6MB files are supported.");
                     history.back();
                    </script>';
                }

           }
           else{
            echo $fileError;
            echo '<script>
            alert("Sorry there is an error in your file ->'.$fileError.'");
            history.back();
           </script>';
           }
       }
       else {
        echo '<script>
        alert("Your file of type *'.end($fileExt).'* . This type of File formate is not supported.");
        history.back();
        </script>';
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