<?php
require 'databaseconnection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET["id"]);
    $get_query = "SELECT * FROM kushal WHERE id=$id";
    $res = mysqli_query($conn, $get_query);

    if ($row = mysqli_fetch_assoc($res)) {
?>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label for="name">Name: </label>
    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"><br><br>

    <label for="email">Email: </label>
    <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"><br><br>

    <label for="courses">Course: </label>
    <input type="text" name="courses" id="courses" value="<?php echo $row['courses']; ?>"><br><br>

    <button type="submit">Update</button>
</form>






<?php
    } else {
        echo "No student found.";
    }
} else {
    echo "No ID provided in URL.";
}
?>