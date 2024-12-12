<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Cho phép truy cập vào các tính năng quản trị
    // Ví dụ, chuyển hướng đến bảng quản trị
    header("Location: admin.php");
    exit();
}
?>
