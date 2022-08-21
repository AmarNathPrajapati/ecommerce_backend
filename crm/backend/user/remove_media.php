<?php 
  include('../config.php');
    if (!empty($_POST["id"])) {
    $stmt="UPDATE `media` SET deleted_at=? WHERE id=(?)";
    $sql=mysqli_prepare($conn, $stmt);

    //binding the parameters to prepard statement
    $timestamp=date("Y-m-d H:i:s");
    mysqli_stmt_bind_param($sql,"si",$timestamp,$_POST['id']);

    $result=mysqli_stmt_execute($sql);
        if ($result) {
            mysqli_stmt_close($sql);
            mysqli_close($conn);
            echo "<script>
                        window.location.href='../../frontend/user/manage_media.php';
                        </script>";
        } else {
        echo mysqli_error($conn);
        mysqli_stmt_close($sql);
        mysqli_close($conn);
        echo "<script>alert('Sorry!! Something went wrong');
        window.location.href='../../frontend/user/manage_media.php';
        </script>";
        }
    } 
    else {

        mysqli_close($conn);
        echo '<script>
        alert("Something went wrong. We are facing some technical issue. It will be resolved soon. "'.mysqli_error($conn).')
        window.location.href="../../frontend/user/manage_media.php"
        <script>';
    }
    
?>