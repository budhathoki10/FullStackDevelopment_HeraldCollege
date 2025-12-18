<?php 
include 'header.php'; 
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = uploadPortfolioFile($_FILES['portfolio']);

    if ($result) {
        echo "<p>File uploaded successfully: $result</p>";
    } else {
        echo "<p>Error uploading file</p>";
    }
}
?>

<h2>Upload Portfolio File</h2>

<form method="POST" enctype="multipart/form-data">
    Select File: <input type="file" name="portfolio"><br><br>
    <button type="submit">Upload</button>
</form>

<?php include 'footer.php'; ?>