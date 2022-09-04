<?php
include('../config.php');

if (!empty($_POST["product_id"]) && !empty($_POST["user_id"])) {
    $from_location = $_SERVER['HTTP_REFERER'];
    $total = test_input($_POST["total"]);
    $quantity = test_input($_POST["order_quantity"]);
    $remain_product = $total - $quantity;
    $product_id = test_input($_POST["product_id"]);
    $product_name = test_input($_POST["product_name"]);
    if ($remain_product >= 0) {

        $stmt = "UPDATE `product` SET quantity =(?) WHERE product.id = (?) AND product.title = (?);";
        $sql = mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql, 'iis', $remain_product, $product_id, $product_name);
        $result = mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
    } else {
?>
        <script>
            alert('Out of Stock!');
            window.location.href = "<?php echo $from_location; ?>"
        </script>
    <?php

    }
    $user_id = test_input($_POST["user_id"]);
    $user_name = test_input($_POST["user_name"]);
    $order_status = test_input($_POST["order_status"]);
    $stmt = "INSERT INTO `order_details` (user_id,product_id,user_name,product_name,quantity,order_status) VALUES (?,?,?,?,?,?)";
    $sql = mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql, 'iissis', $user_id, $product_id, $user_name, $product_name, $quantity, $order_status);
    $result = mysqli_stmt_execute($sql);
    if ($result) {
        mysqli_stmt_close($sql);

    ?>
        <script>
            alert('Ordered Successfully');
            window.location.href = "<?php echo $from_location; ?>"
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