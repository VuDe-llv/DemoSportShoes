<?php
$tenkhachhang = trim($_POST['them_ten']);
$sodienthoai = trim($_POST['them_sdt']);
$email = trim($_POST['them_email']);
$diachi = trim($_POST['them_diachi']);

require_once(__DIR__ . '/../config_data/config.php');
$themsql = "INSERT INTO tbl_taikhoan (tenkhachhang, sodienthoai, email, diachi) VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$diachi')";

if (mysqli_query($conn, $themsql)) {
	header('Location: ../../admin.php?khachhang=khachhang');
} else {
	echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);