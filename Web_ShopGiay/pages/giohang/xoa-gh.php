<?php
require_once('../../admin/config_data/config.php');

if (isset($_GET['ghid']) && is_numeric($_GET['ghid'])) {
    $cartId = $_GET['ghid'];
    $xoasp_sql = "DELETE FROM tbl_giohang WHERE id_giohang = ?";
    $stmt = mysqli_prepare($conn, $xoasp_sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $cartId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo '<script>window.history.back();</script>';
        exit();
    } else {
        echo "Lỗi trong quá trình xóa sản phẩm.";
    }
} else {
    echo "ID giỏ hàng không hợp lệ.";
}

mysqli_close($conn);
?>

