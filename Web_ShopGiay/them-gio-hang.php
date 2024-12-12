<?php
session_start();
require_once(__DIR__ . '/admin/config_data/config.php');

$id_sanpham = isset($_GET['id_sanpham']) ? $_GET['id_sanpham'] : null;

if ($id_sanpham === null) {
    echo "Không có ID sản phẩm được chọn.";
    exit();
}

if (!isset($_SESSION['id_taikhoan']) || !isset($_SESSION['email'])) {
    header("Location: login-register.php");
    exit();
}

$id_taikhoan = $_SESSION['id_taikhoan'];
$email_khachhang = $_SESSION['email'];

if ($id_sanpham !== null) {
    $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 1;
    $sizesp = isset($_POST['sizesp']) ? $_POST['sizesp'] : '39';

    if ($email_khachhang === $_SESSION['email']) {
        $sql_check = "SELECT * FROM tbl_giohang WHERE id_taikhoan = $id_taikhoan AND id_sanpham = $id_sanpham AND sizesp = '$sizesp'";
        $query_check = mysqli_query($conn, $sql_check);

        if (!$query_check) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($query_check) == 0) {

            $sql_insert = "INSERT INTO tbl_giohang (id_taikhoan, id_sanpham, email, soluong, sizesp) VALUES ($id_taikhoan, $id_sanpham, '$email_khachhang', $soluong, '$sizesp')";
            $query_insert = mysqli_query($conn, $sql_insert);

            if ($query_insert) {
                // Hiển thị thông báo thành công bằng JavaScript
                echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng thành công."); window.history.back();</script>';
            } else {
                echo "Lỗi khi thêm vào giỏ hàng: " . mysqli_error($conn);
            }
        } else {
            $row = mysqli_fetch_assoc($query_check);

            if ($row['sizesp'] == $sizesp) {
                $new_quantity = $row['soluong'] + $soluong;
                $sql_update = "UPDATE tbl_giohang SET soluong = $new_quantity WHERE id_taikhoan = $id_taikhoan AND id_sanpham = $id_sanpham AND sizesp = '$sizesp'";
                $query_update = mysqli_query($conn, $sql_update);

                if ($query_update) {
                    // Hiển thị thông báo thành công bằng JavaScript
                    echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng thành công."); window.history.back();</script>'; 
                } else {
                    echo "Lỗi khi cập nhật giỏ hàng: " . mysqli_error($conn);
                }
            } else {
                $sql_insert = "INSERT INTO tbl_giohang (id_taikhoan, id_sanpham, email, soluong, sizesp) VALUES ($id_taikhoan, $id_sanpham, '$email_khachhang', $soluong, '$sizesp')";
                $query_insert = mysqli_query($conn, $sql_insert);

                if ($query_insert) {
                    // Hiển thị thông báo thành công bằng JavaScript
                    echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng thành công."); window.history.back();</script>';
                } else {
                    echo "Lỗi khi thêm vào giỏ hàng: " . mysqli_error($conn);
                }
            }
        }
    } else {
        header("Location: login-register.php");
        exit();
    }
} else {
    echo "Không có ID sản phẩm được chọn.";
}

mysqli_close($conn);
?>
