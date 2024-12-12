<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];

    require_once(__DIR__ . '/../config_data/config.php');

    $duyetDonHangSql = "UPDATE tbl_muahang SET trangthai = 'ĐANG LẤY HÀNG' WHERE id_muahang = ?";
    $stmt = mysqli_prepare($conn, $duyetDonHangSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $orderId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_error($stmt)) {
            echo 'error';
        } else {
            echo 'success';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'error';
    }

    mysqli_close($conn);
} else {
    echo 'Invalid request';
}
?>
