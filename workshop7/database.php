<?php
$servernae="localhost";
$username="root";
$password= "";
$conn= mysqli_connect($servernae,$username,$password);
if(!$conn){
    die ("error caught ".mysqli_connect_error());
}
$database= "CREATE DATABASE IF NOT EXISTS herald_dbs";
mysqli_query($conn,$database);
mysqli_select_db($conn,"herald_dbs");
// echo "serverconnected";

$table = "CREATE TABLE IF NOT EXISTS week7Table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) UNIQUE NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL
)";
if(mysqli_query($conn,$table)){
    // echo "table create sucessfully";
}

?>