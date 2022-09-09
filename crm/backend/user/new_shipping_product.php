<?php
include('../config.php');

if (!empty($_POST['category']) && !empty($_POST['currency']) && !empty($_POST['fixed_value'])) {
    $category = test_input($_POST["category"]);
    $currency = test_input($_POST["currency"]);
    $fixed_value = test_input($_POST["fixed_value"]);
    $pincode = ($_POST["pincode"]);
    $pin_value = ($_POST["pin_value"]);
    $range_km = ($_POST["range_km"]);
    $range_value = ($_POST["range_value"]);
    $from_location = "../../frontend/user/shipping_product.php";
    if (count($pincode) >= count($range_km)) {
        foreach ($pincode as $index => $names) {
            // echo $names."_".$phone[$index];
            $s_pincode = $names;
            $s_pinvalue = $pin_value[$index];
            $s_range_km = $range_km[$index];
            if( empty($s_range_km)){
                $s_range_km = "--";
            }
            $s_range_value = $range_value[$index];
            if( empty($s_range_value)){
                $s_range_value = 0;
            }

            $stmt = "INSERT INTO `shipping_product` (category,currency,fixed_value,pincode,pin_value,range_km,range_value) VALUES (?,?,?,?,?,?,?)";
            $sql = mysqli_prepare($conn, $stmt);
            mysqli_stmt_bind_param($sql, 'sssssss', $category, $currency, $fixed_value, $s_pincode, $s_pinvalue, $s_range_km, $s_range_value);
            $result = mysqli_stmt_execute($sql);
        }
        if ($result) {
            mysqli_stmt_close($sql);

?>
            <script>
                window.location.href = "<?php echo $from_location; ?>"
                alert("Submitted Successfully!");
            </script>
        <?php } else {
            mysqli_stmt_close($sql);
        ?>
            <script>
                alert('Sorry Something Went Wrong. Please try again.');
                // history.back();
            </script>
    <?php
        }
    }else{
        foreach ($range_km as $index => $names) {
            // echo $names."_".$phone[$index];
            $s_range_km = $names;
            $s_range_value= $range_value[$index];
            $s_pincode = $pincode[$index];
            if( empty($s_pincode)){
                $s_pincode = 0;
            }
            $s_pinvalue = $pin_value[$index];
            if( empty($s_pinvalue)){
                $s_pinvalue = 0;
            }

            $stmt = "INSERT INTO `shipping_product` (category,currency,fixed_value,pincode,pin_value,range_km,range_value) VALUES (?,?,?,?,?,?,?)";
            $sql = mysqli_prepare($conn, $stmt);
            mysqli_stmt_bind_param($sql, 'sssssss', $category, $currency, $fixed_value, $s_pincode, $s_pinvalue, $s_range_km, $s_range_value);
            $result = mysqli_stmt_execute($sql);
        }
        if ($result) {
            mysqli_stmt_close($sql);

?>
            <script>
                window.location.href = "<?php echo $from_location; ?>"
                alert("Submitted Successfully!");
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