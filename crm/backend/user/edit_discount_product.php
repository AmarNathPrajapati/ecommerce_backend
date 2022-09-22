<?php
include('../config.php');



if (true) {
    $id = test_input($_POST["id"]);
    $category = test_input($_POST["category"]);
    $currency = test_input($_POST["currency"]);
    $dis_type = test_input($_POST["dis_type"]);
    $value_per = test_input($_POST["value_per"]);
    $start_date = test_input($_POST["start_date"]);
    $end_date = test_input($_POST["end_date"]);
    $from_location = $_SERVER['HTTP_REFERER'];


    $stmt = "UPDATE `discount_order` SET category = ?,currency = ?,dis_type = ?,value_per = ?,start_date = ?,end_date = ? where id = ?";
    $sql = mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql, 'sssissi', $category,$currency, $dis_type, $value_per, $start_date, $end_date,$id);
    $result = mysqli_stmt_execute($sql);
    if ($result) {
        mysqli_stmt_close($sql);
 
?>
        <script>
            alert("Successfully! Updated.");
            window.location.href = "../../frontend/user/discount_onproduct.php";
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