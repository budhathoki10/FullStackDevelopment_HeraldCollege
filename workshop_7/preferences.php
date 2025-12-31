<?php
require "checksesssion.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$theme = $_POST["theme"];
// valid for 30 day
setcookie("theme",$theme,time()+86400*30);
header("Location:dashboard.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="radio" name="theme" value="dark_mode" > Dark mode <br>
        <input type="radio" name="theme" value="light_mode"> Light mode <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>