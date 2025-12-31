<?php
require "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $read= "SELECT * FROM kushal";
$result=  mysqli_query($conn, $read);
    echo "
    <table>
<tr>
<th>id</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>Actions</th>
</tr>

    ";
    if(mysqli_num_rows($result)> 0) {
        while($row=mysqli_fetch_assoc($result)) {
     

            echo "<tr>";
            echo "<td>" .$row['id']."</td>";
             echo "<td>" .$row['name']."</td>";
             echo "<td>" .$row['email']."</td>";
             echo "<td>" .$row['courses']."</td>";
             echo "<td>
    <a href='edit.php?id=" . $row["id"] . "'><button>Edit</button></a>  
    <a href='delete.php?id=" . $row["id"] . "'><button>Delete</button></a>
</td>";
            echo "</tr>";
        }
        echo "</table>";

       

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>


    table,td,th{
        border: 1px solid black;
        padding:12px; 
        border-collapse: collapse;
    }
</style>
<body>
     <a  href="addstudent.php"><button>Add student </button></a>
</body>
</html>
