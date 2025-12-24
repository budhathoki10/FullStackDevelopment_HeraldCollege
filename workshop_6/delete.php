<?php
require "databaseconnection.php";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM kushal WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Student deleted successfully!";
        echo "<br><a href='read.php'>Back to list</a>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "No ID provided.";
}
?>