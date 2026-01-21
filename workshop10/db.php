<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE if not exists  workshop10";

    $conn->exec($sql);
    // echo "Database created successfully<br>";



    $conn->exec("USE workshop10");
    $sqls = "CREATE TABLE if not exists week10table (
id INT  AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(250),
password VARCHAR(250)
)";

    if ($conn->query($sqls)) {
        // echo "Table workshop10 created successfully";
    } else {
        echo "Error creating table";
    }



} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}


