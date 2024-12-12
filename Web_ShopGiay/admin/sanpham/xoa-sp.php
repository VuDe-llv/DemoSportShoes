<?php
$productId = $_GET['spid'];
require_once(__DIR__ . '/../config_data/config.php');

$anhsp_sql = "SELECT anhsp FROM tbl_sanpham WHERE id_sanpham = $productId";
$result = mysqli_query($conn, $anhsp_sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $anhsp = $row['anhsp'];

    $anhsp_tmp = __DIR__ . '/upload/' . $anhsp;
    if (file_exists($anhsp_tmp)) {
        unlink($anhsp_tmp);
    }

    $xoasp_sql = "DELETE FROM tbl_sanpham WHERE id_sanpham = $productId";
    mysqli_query($conn, $xoasp_sql);

    header('Location: ../../admin.php?sanpham=sanpham');
} else {
    echo "Lỗi: Không tìm thấy thông tin sản phẩm";
}
mysqli_close($conn);
?>

