<?php
require_once(__DIR__ . '/admin/config_data/config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_taikhoan = $_SESSION['id_taikhoan'];
    $id_sanpham = $_GET['id_sanpham'];
    $id_giohang = $_GET['id_giohang'];

    $queryGioHang = "SELECT giohang.*, sanpham.giasp FROM tbl_giohang giohang JOIN tbl_sanpham sanpham ON giohang.id_sanpham = sanpham.id_sanpham WHERE giohang.id_sanpham = $id_sanpham AND giohang.id_giohang = $id_giohang";
    $resultGioHang = mysqli_query($conn, $queryGioHang);

    if ($resultGioHang && mysqli_num_rows($resultGioHang) > 0) {
        $rowGioHang = mysqli_fetch_assoc($resultGioHang);

        $giasp = (float)$rowGioHang['giasp'];
        $soluong = (int)$rowGioHang['soluong'];
        $tongtien = floatval($rowGioHang['giasp']) * intval($rowGioHang['soluong']);
        $sizesp = $rowGioHang['sizesp'];

        $phivanchuyen = floatval($_POST['donViVanChuyen']);
        $phuongthucthanhtoan = $_POST['phuongThucThanhToan'];
        $loinhan = $_POST['loinhan'];

        $tongthanhtoan = $tongtien + $phivanchuyen;

        $insertQuery = "INSERT INTO tbl_muahang (id_taikhoan, id_sanpham, sizesp, giasp, soluong, tongtien, phivanchuyen, tongthanhtoan, phuongthucthanhtoan, loinhan, ngaymua) 
                        VALUES ('$id_taikhoan', '$id_sanpham', '$sizesp', '$giasp', '$soluong', '$tongtien', '$phivanchuyen', '$tongthanhtoan', '$phuongthucthanhtoan', '$loinhan', NOW())";

        if (mysqli_query($conn, $insertQuery)) {
            $deleteQuery = "DELETE FROM tbl_giohang WHERE id_sanpham = $id_sanpham AND id_giohang = $id_giohang";
            mysqli_query($conn, $deleteQuery);

            header("Location: index.php?giohang=giohang");
            exit;
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        echo "Không tìm thấy sản phẩm trong giỏ hàng.";
    }
} else {
    echo "Phương thức không hợp lệ.";
}
?>
