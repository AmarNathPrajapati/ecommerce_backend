<?php
    include('../config.php');
    

   
    if(!empty($_POST['email']))
    {
        $from_location=$_SERVER['HTTP_REFERER'];
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if($password == $cpassword){
            $stmt="UPDATE `customers` SET  password = (?) where email=(?) ";
            $hash_pass = password_hash($password,PASSWORD_DEFAULT);
        }
        $sql = mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql, 'ss', $hash_pass,$email);
        $result=mysqli_stmt_execute($sql);
        if($result)
        {
            mysqli_stmt_close($sql); 
            ?>
            <script>
                alert("Password update successfully");
                window.location.href="<?php echo $from_location; ?>"
            </script>
        <?php } 
        else
        {
            mysqli_stmt_close($sql);
            ?>
            <script>alert('Sorry Something Went Wrong. Please try again.');
               history.back();
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Please fill all the mandatory fields.");
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