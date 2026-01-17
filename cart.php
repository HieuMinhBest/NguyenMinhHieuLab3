<?php
session_start();

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// --- XỬ LÝ THÊM VÀO GIỎ (Đã sửa lỗi F5) ---
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $_SESSION['cart'][] = $product_name;

    // QUAN TRỌNG: Chuyển hướng ngay lập tức về chính trang này
    // $_SERVER['PHP_SELF'] tự động lấy tên file hiện tại (cart.php)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit; // Luôn phải có exit sau header
}

// --- XỬ LÝ XÓA GIỎ HÀNG (Cũng nên dùng redirect) ---
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    
    // Thay vì Refresh:0, dùng Location chuẩn hơn
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
    <h3>Giỏ hàng Demo (Đã fix lỗi F5)</h3>
    
    <form method="post">
        <button type="submit" name="add_to_cart">Thêm iPhone 15</button>
        <input type="hidden" name="product_name" value="iPhone 15">
    </form>
    <br>
    <form method="post">
        <button type="submit" name="add_to_cart">Thêm Samsung S24</button>
        <input type="hidden" name="product_name" value="Samsung S24">
    </form>

    <hr>

    <h3>Giỏ hàng của bạn:</h3>
    <ul>
        <?php 
        if (empty($_SESSION['cart'])) {
            echo "<li>Giỏ hàng trống</li>";
        } else {
            foreach ($_SESSION['cart'] as $item) {
                echo "<li>" . $item . "</li>";
            }
        }
        ?>
    </ul>
    
    <form method="post">
        <button type="submit" name="clear_cart">Xóa hết giỏ hàng</button>
    </form>
</body>
</html>