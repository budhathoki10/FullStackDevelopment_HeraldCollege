<?php
require 'db.php';


require 'setupSessionCookie.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}



$error = '';

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (
            !isset($_POST['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
        ) {
            http_response_code(403);
            die('CSRF token validation failed');
        }




        $email = htmlspecialchars($_POST['email']);
        $passwords = htmlspecialchars($_POST['password']);
        if (empty($email) || empty($passwords)) {
            $error = "Please fill all the fields";
        }

        $sql = "SELECT * FROM week10table WHERE email = '$email'"; 
        $stmt = $conn->query($sql);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       
   if (  $user ) {

        if (password_verify($passwords, $user['password'])){
            echo "password ocrrect";
                $_SESSION['user_id'] = $user['id'];
                session_regenerate_id(true); 
                header('Location: dashboard.php');
                exit;
                
        } else {
            $error = "Incorrect password";
        }
    }else {
        $error = "Email does not exist";
    }
                     

} 
}catch (Exception $e) {
    $error = "Something went wrong.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Email:</label><br>
        <input type="text" name="email"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>"> <br>
    </form>
    <br>
    <a href="signup.php">Go to Signup</a>
</body>

</html>