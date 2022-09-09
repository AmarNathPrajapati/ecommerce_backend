<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <h2>Don't worry!</h2>
        <form method="POST" action="./crm//backend//user//forgot_password.php">
            <label class="my-2" for="mail">Enter your Email Id:</label> <br>
            <input name="email" type="mail"> <br>
            <label class="my-2" for="mail">New Password</label> <br>
            <input name="password" type="password"> <br>
            <label class="my-2" for="mail">Confirm Password</label> <br>
            <input name="cpassword" type="password"> <br>
            <button class="btn btn-primary my-3" type="submit" >Submit</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>