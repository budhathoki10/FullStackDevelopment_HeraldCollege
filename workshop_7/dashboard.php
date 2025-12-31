<?php
require "checksesssion.php";
$theme= $_COOKIE["theme"]?? "light mode" ;

if($theme== "light_mode"){
$bgcolor= "white";
$fontcolor= "black";
}else if ( $theme== "dark_mode"){
$bgcolor= "black";
$fontcolor= "white";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body{
    background-color: <?php  echo $bgcolor ?>;
    color: <?php  echo $fontcolor ?> ;
    
}
a{
    text-decoration: none;
}


    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <a href="dashboard.php"><button>Home</button></a> 
        <a href="preferences.php"><button>Preferences</button></a> 
        <a href="logout.php"><button>Logout</button></a

</body>
</html>