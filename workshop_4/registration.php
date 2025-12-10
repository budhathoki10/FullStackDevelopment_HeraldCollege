<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conformpassowrd = $_POST["conformpassword"];


    if (empty($name)) {
        $errors["name"] = "Please enter name";
    }

    if (empty($email)) {
        $errors["email"] = "Please enter your email";
    }

    if (empty($password)) {
        $errors["password"] = "Please enter your password";
    } elseif (mb_strlen($password) < 8) {
        $errors["password"] = "Password size must be greater than 8";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors["password"] = "Password must contain at least one number.";
    } elseif (!preg_match('/[\W_]/', $password)) {
        $errors["password"] = "Password must contain at least one special character.";
    }

    if (empty($conformpassowrd)) {
        $errors["conformpassword"] = "Please re-enter password";
    }
    elseif ($password != $conformpassowrd) {
        $errors["conformpassword"] = "Password does not match";
    }

    if (empty($errors)) {

        if (!file_exists("user.json")) {
            file_put_contents("user.json", "[]");
        }

        $file = file_get_contents("user.json");
        $users = json_decode($file, true);

        if (!is_array($users)) {
            $users = [];
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $newdata = [
            "name" => $name,
            "email" => $email,
            "password" => $hash
        ];

        $users[] = $newdata;

        file_put_contents("user.json", json_encode($users, JSON_PRETTY_PRINT));

        $success = "Registration Successful!";
        echo $success;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php echo "hi"; ?>

   <div class="form">
    
     <form action="registration.php" method="post">
        <h1>User Registration</h1>
        <label for="name">Name: </label>
        <input type="text" id="name" name="name">
         <div class="errors"><?php  echo  $errors["name"] ?? ""  ?></div><br>

         <label for="email">Email: </label>
        <input type="email" id="email" name="email">
<div class="errors"><?php  echo $errors["email"] ??""  ?></div><br>

         <label for="password">Password: </label>
        <input type="text" id="password" name="password">
<div class="errors"><?php  echo $errors["password"] ?? "" ?></div><br>

         <label for="conformpassword">Conform Password: </label>
        <input type="text" id="conformpassword" name="conformpassword">
<div class="errors"> <?php echo $errors["conformpassword"] ?? "" ?></div><br>

        <button type="submit">submit</button>

    </form>
   </div>
</body>
</html>