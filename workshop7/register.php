<?php
require "database.php";
$error = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name= $_POST["name"];
$studentid= $_POST["studentid"];
$password= $_POST["password"];

if(empty($name) || empty($studentid) || empty($password)){
    $error["errors"] = "Empty filed";
}else{


    $checkID= "SELECT * FROM week7Table WHERE student_id = $studentid";
    $result = mysqli_query($conn, $checkID);
    if(mysqli_fetch_assoc($result)>0){
    $error["errorid"] = "this is already present";
        
    }
    else{



         $hashpassword= password_hash($password, PASSWORD_BCRYPT);
    $insert = "INSERT INTO week7Table (student_id, full_name, password_hash) values('$studentid', '$name','$hashpassword') ";
    mysqli_query($conn,$insert);
    header("Location: login.php");
    exit();
    }
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
        #err{
            font-size: small;
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
<label for="name">Enter your name</label>
<input type="text" name="name" id="name"> <br><br>

<label for="id">Enter your StudentID</label>
<input type="text" name="studentid" id="studentid"> <br>
<div id="err"><?php echo $error["errorid"] ?? "" ?> </div><br>

<label for="password">Enter your Password</label>
<input type="password" name="password" id="password"> <br>
<div id="err"><?php echo $error["errors"] ?? "" ?> </div>
<br>
<button type="submit">Send</button>
</form>
</body>
</html>