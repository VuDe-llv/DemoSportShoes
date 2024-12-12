<?php
$role = $_POST['role'];
$id_taikhoan = $_POST['id_taikhoan'];
require_once(__DIR__ . '/../config_data/config.php');
$updatesql = "UPDATE tbl_taikhoan SET role = '$role' WHERE id_taikhoan = $id_taikhoan";

if (mysqli_query($conn, $updatesql)) {
    header('Location: ../../admin.php?khachhang=khachhang');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
