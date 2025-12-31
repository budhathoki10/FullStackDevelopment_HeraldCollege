<?php
$servername = "localhost";
$username   = "NP03CS4A240072";
$password   = "jVmOwQ9Ztm";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$database = "CREATE DATABASE if not exists  NP03CS4A240072";
if (mysqli_query($conn, $database)) {
    // echo "Successfully created database<br>";
} else {
    // echo "Error creating database: " . mysqli_error($conn) . "<br>";
}


mysqli_select_db($conn, "NP03CS4A240072");


$table = "CREATE TABLE if not exists kushal (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    courses VARCHAR(250) NOT NULL
)";
if (mysqli_query($conn, $table)) {
    // echo "Successfully created table<br>";
} else {
    // echo "Error creating table: " . mysqli_error($conn) . "<br>";
}


?>