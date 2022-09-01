<?php
include('../config.php');



if (!empty($_POST['name'])&& !empty($_POST['password'])) {
    $name = test_input($_POST["name"]);
    $password = test_input($_POST["password"]);

    $stmt = "SELECT name,password FROM customers where name=(?)";
    $sql = mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql, "s", $name);
    $result = mysqli_stmt_execute($sql);

    if ($result) {
        $data = mysqli_stmt_get_result($sql);
        $row = mysqli_fetch_assoc($data);
        //while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $name;
?>
            <script src="sweetalert.min.js"></script>

            <body>
                <script>
                    swal("Welcome To ECommerce", "Login Successful!", "success");
                    setTimeout(() => {
                    window.location.href = "../../../home.php";
                    }, 3000);
                </script>
            </body>
        <?php
        } else {
            mysqli_stmt_close($sql);
        ?>
            <script src="sweetalert.min.js"></script>

            <body>
                <script>
                    swal("Invalid Credentials", "Please Try Again!", "error");
                    setTimeout(() => {
                        history.back();
                    }, 3000);
                </script>
            </body>
        <?php
        }
        ?>
    <?php } else {
        mysqli_stmt_close($sql);
    ?>
        <script src="sweetalert.min.js"></script>

        <body>
            <script>
                swal("Invalid Credentials", "Please Try Again!", "error");
                setTimeout(() => {
                    history.back();
                }, 3000);
            </script>
        </body>
    <?php
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