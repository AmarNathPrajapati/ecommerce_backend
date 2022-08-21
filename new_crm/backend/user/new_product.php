<?php

include('../config.php');

$redirect_to="../../frontend/user/manage_products.php";
if (!empty($_POST['post_title']) && !empty($_FILES['document']['name']) ) {
        $file=$_FILES['document'];
        $title=test_input($_POST['post_title']);
        $category=test_input($_POST['post_category']);
        $description=test_input($_POST["post_description"]);
        $actual_price=$_POST["actual_price"];
        $sale_price=$_POST["sale_price"];
        $cost_price=$_POST["cost_price"];
        $sku_number=$_POST["sku_number"];
        $quantity=$_POST["quantity"];
        $weight=$_POST["weight"];
        $tag=$_POST["tag"];
        $active=$_POST["active"];
        $fileName=$_FILES['document']['name']; 
        $fileTmpName=$_FILES['document']['tmp_name'];
        $fileSize=$_FILES['document']['size'];
        $fileError=$_FILES['document']['error']; 
        $fileType=$_FILES['document']['type'];
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','png','jpeg','docs','docx',"mp4");
        $fileNameNew= $fileExt[0].uniqid('',true).".".$fileActualExt;


       if (in_array($fileActualExt,$allowed)) {
           if ($fileError==0) {
               if ($fileSize<=6000000) {
                   $structure = '../../documents/products';

                    // create dynamic .php file

                    $folder_name = str_replace(' ', '_', $title);
                    if($fileActualExt=="mp4") {
                        $media='<video style="max-width:100%; margin:auto; object-fit:cover;" class="card-img-top" controls>
                        <source src="../../crm/documents/products/'.$fileNameNew.'" type="video/mp4">
                    </video>';
                    } else {
                       
                        $media='<img src="../../crm/documents/products/'.$fileNameNew.'" style="max-width:100%; margin:auto; object-fit:cover;" class="card-img-top" alt="img">';
                        
                    }
                    $content = '
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'. $title.'</title>
    </head>

    <body>
        <!-- Navbar -->
        <div class="container">
            <h1 id="post-title" class="text-center my-5">'.$title.'</h1>
            '.$media.'
            <p  class="mt-4" style="font-size:20px;text-align:justify";">'. $description.'</p>
            
        </div>
        <!-- Footer -->
    </body>

    </html>';

                    $dir="../../../products/".$folder_name;
                    if (!is_dir( $dir )) {
                        mkdir($dir,0777, true);
                    } 
            
            
                    $fp = fopen($dir."/index.php","wb");
                    fwrite($fp,$content);
                    fclose($fp);
                    $php_file_location="products/".$folder_name."/index.php";//imp
            
                    if(!is_dir($structure)){
                        
                        //Directory does not exist, so lets create it.
                        mkdir($structure, 0777, true);
                        $fileDestination=$structure."/".$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $stmt="INSERT INTO `product` (category,title,description,actual_price,sale_price,cost_price,sku_number,quantity,weight,tag,file,file_type,php_file_location,active) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $sql=mysqli_prepare($conn, $stmt);
                        //binding the parameters to prepard statement
                        mysqli_stmt_bind_param($sql,"sssssssssssssi",$category,$title,$description,$actual_price,$sale_price,$cost_price,$sku_number,$quantity,$weight,$tag,$fileNameNew,$fileActualExt,$php_file_location,$active);
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
                        $stmt="INSERT INTO `product` (category,title,description,actual_price,sale_price,cost_price,sku_number,quantity,weight,tag,file,file_type,php_file_location,active) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $sql=mysqli_prepare($conn, $stmt);
                    
                        //binding the parameters to prepard statement
                        
                        if ($_POST["post_description"]) {
                            $description=$_POST["post_description"];
                        } else {
                            $description="Not Available";
                        }
                        
                        mysqli_stmt_bind_param($sql,"sssssssssssssi",$category,$title,$description,$actual_price,$sale_price,$cost_price,$sku_number,$quantity,$weight,$tag,$fileNameNew,$fileActualExt,$php_file_location,$active);
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
else if(!empty($_POST['post_title'])){
    $title=test_input($_POST['post_title']);
        $description=test_input($_POST["post_description"]);
        $active=$_POST["active"];
        $folder_name = str_replace(' ', '_', $title);
    $media='<img src="../../crm/default.png" class="d-block img-fluid w-100" alt="default">';
    $content = '
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'. $title.'</title>
    </head>

    <body>
        <!-- Navbar -->
        <div class="container">
            <h1 id="post-title" class="text-center my-5">'.$title.'</h1>
            '.$media.'
            <p  class="mt-4" style="font-size:20px;text-align:justify";">'. $description.'</p>
            
        </div>
        <!-- Footer -->
    </body>

    </html>';
    $fileActualExt='0';
    $fileNameNew='0';

                    $dir="../../../products/".$folder_name;
                    if (!is_dir( $dir )) {
                        mkdir($dir,0777, true);
                    } 
            
                    $fp = fopen($dir."/index.php","wb");
                    fwrite($fp,$content);
                    fclose($fp);
                    $php_file_location="products/".$folder_name."/index.php";

                    $stmt="INSERT INTO `product` (category,title,description,actual_price,sale_price,cost_price,sku_number,quantity,weight,tag,file,file_type,php_file_location,active) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $sql=mysqli_prepare($conn, $stmt);
                
                    //binding the parameters to prepard statement
                    
                    if ($_POST["post_description"]) {
                        $description=$_POST["post_description"];
                    } else {
                        $description="Not Available";
                    }
                    
                    mysqli_stmt_bind_param($sql,"sssssssssssssi",$category,$title,$description,$actual_price,$sale_price,$cost_price,$sku_number,$quantity,$weight,$tag,$fileNameNew,$fileActualExt,$php_file_location,$active);
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