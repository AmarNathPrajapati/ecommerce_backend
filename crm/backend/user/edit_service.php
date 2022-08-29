<?php
include('../config.php');

if (!empty($_POST["service_id"]) && !empty($_POST['service_name'])) {
    $id=test_input($_POST["service_id"]);
    $service_name = test_input($_POST["service_name"]);
    $from_location = $_SERVER['HTTP_REFERER'];
    $fileName = $_FILES['document']['name'];
    $fileTmpName = $_FILES['document']['tmp_name'];
    $fileSize = $_FILES['document']['size'];
    $fileError = $_FILES['document']['error'];
    $fileType = $_FILES['document']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg', 'docs', 'docx', "mp4");
    $fileNameNew = $fileExt[0] . uniqid('', true) . "." . $fileActualExt;

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize <= 6000000) {
                $structure = '../../documents/category';
                $fileDestination = $structure . "/" . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                //insertion in database
                $stmt = "UPDATE`services` SET service_name = ?, file=?, file_type=? where id=(?)";
                $sql = mysqli_prepare($conn, $stmt);
                mysqli_stmt_bind_param($sql, 'sssi', $service_name, $fileNameNew, $fileActualExt, $id);
                $result = mysqli_stmt_execute($sql);
                if ($result) {
                    mysqli_stmt_close($sql);
                    echo '
                    <script>
                    alert("Successfully!! Uploaded the file.");
                    history.back();
                    </script>
                    ';
?>
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
                // error is due to larger file
                $fileSizeInMb = $fileSize / 1000;

                echo '<script>
                  alert("Your file size is' . $fileSizeInMb . 'kb. Only less than 6MB files are supported.");
                  history.back();
                 </script>';
            }
        } else {
            echo mysqli_error($conn);

            echo '<script>
            alert("Something went wrong. We are facing some technical issue. It will be resolved soon. "' . mysqli_error($conn) . ')
                history.back();
            <script>';
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