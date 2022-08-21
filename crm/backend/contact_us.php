<?php
    include('./config.php');
    

   
    if(!empty($_POST['email']) && !empty($_POST['name']) && isset($_POST['subject']))
    {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $phone=test_input($_POST['phone']);
        $company_name=test_input($_POST['company_name']);
        $subjects=$_POST['subject'];
        $message=test_input($_POST['message']);
         // $flag=$_POST['flag'];
        $flag=$_SERVER['HTTP_REFERER'];
        $from_location=$_SERVER['HTTP_REFERER'];

        $common_code=time();

        $notChecked=true;

        if(isset($subjects)){
            for ($i=0; $i <count($subjects) ; $i++) { 
                    if ($subjects[$i] && gettype($subjects[$i])=="string") {
                        $notChecked=false;
                        break;
                    }
            }
        }
        if ($notChecked==true) {
            
            mysqli_close($conn);

            die;
            ?>
            <script>
                alert("Something went wrong. Either no check box is selected or value of the check box is wrong.");
                window.location.href="<?php echo $from_location; ?>";
            </script>
            <?php
        }

        $stmt="INSERT INTO `contact_us` (email,name,phone,company_name,message,subject_code,page_name) VALUES (?,?,?,?,?,?,?)";
        $sql = mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql, 'ssissss', $email, $name, $phone,$company_name,$message,$common_code,$flag);
        $result=mysqli_stmt_execute($sql);
        if($result)
        {
            mysqli_stmt_close($sql); 
            for ($i=0; $i <count($subjects) ; $i++) { 
                $subjects[$i]=test_input($subjects[$i]);
                if ($subjects[$i]) {
            
                    $stmt="INSERT INTO `contact_subject_list` (service_id,code) VALUES (?,?)";
                    $sql = mysqli_prepare($conn, $stmt);
                    mysqli_stmt_bind_param($sql, 'ii', $subjects[$i],$common_code);
                    $result=mysqli_stmt_execute($sql);
                    if($result)
                    {    mysqli_stmt_close($sql); 
                        
                    }
                    else{
                        mysqli_stmt_close($sql);
                        mysqli_close($conn);
                        ?>
                        <script>alert('Sorry Something Went Wrong. Please try again.');
                           history.back();
                        </script>
                        <?php
                    }
                }
            }

            ?>
                <script>alert('We will get back to you within 24 working hours');
                        window.location.href="<?php echo $from_location; ?>";
                        
                </script>
            <?php 
        } 
        else
        {
            mysqli_stmt_close($sql);
            mysqli_close($conn);
            ?>
            <script>alert('Sorry Something Went Wrong. Please try again.');
               history.back();
            </script>
            <?php
        }
    }
    else{

        mysqli_close($conn);
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

        if ($data=="" || $data==null) {
            $data="Not Available";
        }
        return $data;
    }
?>