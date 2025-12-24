<?php
require "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id      = intval($_POST["id"]);
    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $courses = $_POST["courses"];

    $sql = "UPDATE kushal 
            SET name='$name', email='$email', courses='$courses' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Student updated successfully!";
        echo "<br><a href='read.php'>Back to list</a>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>