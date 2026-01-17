<?php
require 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $hashed_password]);
        echo "Đăng ký thành công! <a href='login.php'>Đăng nhập ngay</a>";
    } catch (PDOException $e) {
        echo "Lỗi: Email này có thể đã tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h3>Đăng ký tài khoản</h3>
    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Mật khẩu: <input type="password" name="password" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>