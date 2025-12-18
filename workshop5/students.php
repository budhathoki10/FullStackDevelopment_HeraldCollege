<?php
include "header.php";
include "function.php";
$file = file_get_contents("student.txt");
$student = json_decode($file, true);

if(!$student){
    die("invalid json or empty");
}
foreach ($student as $std) {
    formatname($std);
    echo "<p>Email:" . htmlspecialchars($std["email"]) . "</p>";
clean_skills($std);
}

?>

<?php include 'footer.php' ?>

