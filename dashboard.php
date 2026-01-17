<?php
session_start(); 

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit; 
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Trang quản trị (Dashboard)</h1>
    <p>Xin chào, <b><?php echo $_SESSION['user']; ?></b></p>
    
    <a href="logout.php">Đăng xuất</a>
</body>
</html>