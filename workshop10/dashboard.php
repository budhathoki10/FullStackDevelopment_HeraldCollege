<?php
require 'db.php';
require 'setupSessionCookie.php';

$user_email = '';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


    $sql = "SELECT email FROM week10table WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $user_email = $user['email'];
    }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_destroy();
        header("Location: login.php"); 
        exit;


      }


  
} else {
    echo "No session";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome to my site</h1>
<?php
if($user_email){ 
    ?>
    
  <p>Logged In User : <?php echo htmlspecialchars($user_email); ?></p>
  
<form action="" method="POST">
    <button type="submit">Logout</button>
</form>
  <?php 
}
else{
    ?>
   
    <a href="login.php"><button>login</button></a>
<?php
}

?>

</body>
</html>