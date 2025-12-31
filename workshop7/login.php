<?php
require "database.php";
$loginEmpty = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginid = $_POST["loginid"];
    $password = $_POST["loginpassword"];
    if (empty($password) || empty($loginid)) {
        $loginEmpty["empt"] = "required all fields";

    }

    $checkID = "SELECT * FROM week7Table WHERE student_id = '$loginid'";
    $result = mysqli_query($conn, $checkID);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedpassword = $row["password_hash"];

        if (password_verify($password, $hashedpassword)) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['studentid'] = $loginid;
            header('Location:Dashboard.php');
            exit();

        } else {
            $loginEmpty["pass"] = "Incorrect pasword";
        }

    } else {
        $loginEmpty["errorid"] = "No such ID";

    }




}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #errs {
            font-size: small;
            color: red;
        }
    </style>
</head>

<body>


    <form action="" method="POST">
        <label for="loginid">Enter your StudentID</label>
        <input type="text" name="loginid" id="loginid"> <br>
        <div id="errs"><?php echo $loginEmpty["errorid"] ?? "" ?> </div>
        <br>

        <label for="loginpassword">Enter your Password</label>
        <input type="password" name="loginpassword" id="loginpassword"> <br>
        <div id="errs"><?php echo $loginEmpty["empt"] ?? "" ?> </div>
        <div id="errs"><?php echo $loginEmpty["pass"] ?? "" ?> </div>
        <br>
        <button type="submit">Login</button>




    </form>
</body>

</html>