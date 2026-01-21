<?php
$arr= [];

require 'db.php';
require 'setupSessionCookie.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}



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
        $password = htmlspecialchars($_POST['password']);

        if (empty($email) || empty($passwords)) {
            $error = "Please fill all the fields";
        }


        if(!filter_var( $email, FILTER_VALIDATE_EMAIL)){
           $arr['email']="invalid email";
        }
        if(strlen($password)<6){
             $arr['password'] = 'weak password';
        }
        if(empty($arr)){
        $hashedPassword= password_hash( $password,PASSWORD_BCRYPT);
$sql = "INSERT INTO week10table (email, password) VALUES (:email, :password)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

$stmt->execute();

        header('refresh: 2; url=login.php');
        }
    }

} catch (Exception $e) {
    $message = "caught error from exception";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup</h2>

<form action="signup.php" method="POST">
    <label>Email:</label><br>
    <input type="text" name="email"><br>
    <div><?php echo $arr["email"]?? "" ;?></div>
    <br>

    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <div><?php echo $arr["password"]?? "" ;?></div>
    
    <br>

      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>"> <br>

    <button type="submit">Signup</button>
</form>

<br>
<a href="login.php">Go to Login</a>

</body>
</html>
