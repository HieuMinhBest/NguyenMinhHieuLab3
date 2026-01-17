<?php
session_start(); 
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Sai email hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h3>Đăng nhập</h3>
    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Mật khẩu: <input type="password" name="password" required><br><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>