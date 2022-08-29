<?php
    include('../config.php');
    

   
    if(!empty($_POST['service_name']))
    {
        $service_name = test_input($_POST["service_name"]);
        $currency_symbol = test_input($_POST["currency_symbol"]);
       
        $from_location=$_SERVER['HTTP_REFERER'];
       

        $stmt="INSERT INTO `currency` (service_name,currency_symbol) VALUES (?,?)";
        $sql = mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql, 'ss', $service_name,$currency_symbol);
        $result=mysqli_stmt_execute($sql);
        if($result)
        {
            mysqli_stmt_close($sql); 
            
            ?>
            <script>
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