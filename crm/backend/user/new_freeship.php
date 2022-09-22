<?php
include('../config.php');



if (true) {
    $currency = test_input($_POST["currency"]);
    $freeship_type = test_input($_POST["freeship_type"]);
    if(!empty($_POST["freeship_value1"])){
        $freeship_value = test_input($_POST["freeship_value1"]); 
    }
    if(!empty($_POST["freeship_value2"])){
        $freeship_value = test_input($_POST["freeship_value2"]); 
    }
    if(!empty($_POST["freeship_value3"])){
        $freeship_value = test_input($_POST["freeship_value3"]); 
    }
    if(!empty($_POST["freeship_value0"])){
        $freeship_value = test_input($_POST["freeship_value0"]); 
    }

    $start_date = test_input($_POST["start_date"]);
    $end_date = test_input($_POST["end_date"]);
    $from_location = $_SERVER['HTTP_REFERER'];


    $stmt = "INSERT INTO `freeship` (currency,freeship_type,freeship_value,start_date,end_date) VALUES (?,?,?,?,?)";
    $sql = mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql, 'sssss',$currency,$freeship_type, $freeship_value, $start_date, $end_date);
    $result = mysqli_stmt_execute($sql);
    if ($result) {
        mysqli_stmt_close($sql);

?>
        <script>
            alert("Successfully!! Created.");
            window.location.href = "../../frontend/user/manage_freeship.php";
        </script>
    <?php } else {
        mysqli_stmt_close($sql);
    ?> 
        <script>
            alert('Sorry Something Went Wrong. Please try again.');
            history.back();
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert("Please fill all the mandatory fields.");
        history.back();
    </script>
<?php
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = ucwords($data);

    if ($data == "" || $data == null) {
        $data = "Not Available";
    }
    return $data;
}
?>