<?php 
    if (isset($_POST["service_id"])) {
        include('../config.php');
        $from_location=$_SERVER['HTTP_REFERER'];


        $stmt="UPDATE `services` SET deleted_at=? WHERE id=(?)";
        $sql=mysqli_prepare($conn, $stmt);

        //binding the parameters to prepard statement
        $timestamp=date('Y-m-d H:i:s');
        mysqli_stmt_bind_param($sql,"si",$timestamp,$_POST['service_id']);
        
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
        else {
            echo mysqli_error($conn);
            mysqli_stmt_close($sql);
            mysqli_close($conn);
            ?>
            <script>alert('Sorry Something Went Wrong. Please try again.');
               history.back();
            </script>
            <?php
        
        }
    } 
    
    else {

       
        ?>
        <script>alert('Please fill all the mandatory details.');
           history.back();
        </script>
        <?php
    
    }
    
?>