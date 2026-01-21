<?php
require 'databaseconnection.php';

$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $course = trim($_POST["course"]);
    if (empty($name) || empty($email) || empty($course)) {
        $error['error'] = "All filed must be filled";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error['email'] = "invalid email";

} 
    if (empty($error)) {
        $query = "insert into  kushal (name,email,courses)
         VALUES ('$name', '$email', '$course')
        ";
        if (mysqli_query($conn, $query)) {
            // echo "sucessfully added";
        } else {
            echo "Error creating database: " . mysqli_error($conn) . "<br>";
        }
    }
   

}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    #error{
        color: red;
        font-size: small;

    }


</style>
<body>
    <h1>ADD STUDENT</h1>
    <form action="" method="POST">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Email: </label>
        <input type="text" name="email" id="email"><br>
        <div id="error"><?php  echo $error['email'] ?? "" ?></div><br>

        <label for="course">Course: </label>
        <input type="text" name="course" id="course"><br>
        <div id="error"><?php  echo $error['error'] ?? "" ?></div><br>

        <button>add students</button>
        <br><a href='index.php'>Back to list</a>





    </form>

</body>

</html>