<?php
require_once('../../admin/config_data/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['giohangId']) && isset($_POST['newSize']) && isset($_POST['newQuantity'])) {
    $giohangId = $_POST['giohangId'];
    $newSize = $_POST['newSize'];
    $newQuantity = $_POST['newQuantity'];

    $updateQuery = "UPDATE tbl_giohang SET sizesp = '$newSize', soluong = '$newQuantity' WHERE id_giohang = '$giohangId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if (!$updateResult) {
        echo "Lỗi cập nhật cơ sở dữ liệu: " . mysqli_error($conn);
    }
}
?>
