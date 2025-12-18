<?php

include 'header.php';
include 'function.php';
$erros =[];
echo '<h1>Add student</h1>';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name= $_POST["name"];
$email= $_POST["email"];
$skills= $_POST["skills"];
if(empty($name)){
    $erros['name'] = "Enter your name";
}

if(empty($email)){
    $erros['email'] = "Enter your email";
}
else if(!validateEmail($email)){
    $erros["emails"] = 'invalid email type';

}

if(empty($skills)){
    $erros['skills'] = "Enter your skills";
}

if(empty($erros)){
save_student($name,$email,$skills);

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
<style>
        .errors{
                font-size: small;
                color: red;
        }

</style>
</head>
<body>
    <form action="addstudent.php" method="POST">
<label for="name">Enter your name</label>
<input type="text" name="name" id="name" >
<div class="errors"><?php  echo $erros['name'] ?? '' ?></div><br>

<label for="email">Enter your email</label>
<input type="text" name="email" id="email" name="emails" >
<div class="errors"><?php echo  $erros['email'] ?? '' ?></div><br>

<label for="skills">Enter your Skills</label>
<input type="text" name="skills" id="skills" >
<div class="errors"><?php  echo $erros['skills'] ?? '' ?></div><br>

<button type="submit">send</button>
</form>

</body>
</html>

<?php include 'footer.php'?>