<?php
if (!empty($_POST["service_id"]) && !empty($_POST["service_name"])) {
    include('../config.php');
   
    $from_location=$_SERVER['HTTP_REFERER'];
    $stmt="UPDATE `services` SET service_name=? WHERE id=(?)";
    $sql=mysqli_prepare($conn, $stmt);

    $id=test_input($_POST["service_id"]);
    $service_name=test_input($_POST["service_name"]);

    //binding the parameters to prepard statement
    mysqli_stmt_bind_param($sql,"si",$service_name,$id);

    $result=mysqli_stmt_execute($sql);
    if ($result) {
        

            mysqli_stmt_close($sql);
            mysqli_close($conn);
            ?>
             <script>
                    window.location.href="<?php echo $from_location; ?>"
                    
            </script>
            <?php
        

    }
    else{

        mysqli_stmt_close($sql);
            mysqli_close($conn);
            ?>
            <script>alert('Sorry Something Went Wrong. Please try again.');
               history.back();
            </script>
            <?php
        
    }
                
                
            
} else {
    
    ?>
    <script>alert('Please fill all mandatory fields.');
       history.back();
    </script>
    <?php

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data=ucwords($data);

    if ($data=="" || $data==null) {
        $data="Not Available";
    }
    return $data;
}


?>
