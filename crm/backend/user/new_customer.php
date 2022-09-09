<?php
include('../config.php');



if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password'])) {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["password"]);
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $from_location = $_SERVER['HTTP_REFERER'];


    $sql = " SELECT email FROM `customers` where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
?>
        <script src="sweetalert.min.js"></script>

        <body>
            <script>
                swal("User Already Exist", "", "error");
                setTimeout(() => {
                    history.back();
                }, 3000);
            </script>
        </body>
        <?php
    } else {
        $stmt = "INSERT INTO `customers` (name,email,phone,password) VALUES (?,?,?,?)";
        $sql = mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql, 'ssis', $name, $email, $phone, $hashpass);
        $result = mysqli_stmt_execute($sql);
        if ($result) {
            mysqli_stmt_close($sql);

        ?>
            <script src="sweetalert.min.js"></script>

            <body>
                <script>
                    swal("Submission  Succesfully!", "Now, you can login", "success");
                    setTimeout(() => {
                        history.back();
                    }, 3000);
                </script>
            </body>
        <?php } else {
            mysqli_stmt_close($sql);
        ?>
            <script src="sweetalert.min.js"></script>

            <body>
                <script>
                    swal("Sorry Something Went Wrong", "Please Try Again!", "error");
                    setTimeout(() => {
                        history.back();
                    }, 3000);
                </script>
            </body>
    <?php
        }
    }
} else {
    ?>
    <script src="sweetalert.min.js"></script>

    <body>
        <script>
            swal("Please fill all the mandatory fields.", "Please Try Again!", "warning");
            setTimeout(() => {
                history.back();
            }, 3000);
        </script>
    </body>
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