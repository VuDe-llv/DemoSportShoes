<?php
require_once(__DIR__ . '/admin/config_data/config.php');

// Kiểm tra xem người dùng đã đăng nhập hay chưa
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $tenNguoiNhan = $_POST['tenNguoiNhan'];
    $soDienThoai = $_POST['soDienThoai'];
    $xaHuyenTinh = $_POST['xaHuyenTinh'];
    $soToAp = $_POST['soToAp'];

    // Lấy ID của tài khoản đang đăng nhập
    $id_taikhoan = $_SESSION['id_taikhoan'];

    // Gộp địa chỉ
    $diaChi = $soToAp . ', ' . $xaHuyenTinh;

    // Kiểm tra xem địa chỉ đã tồn tại cho tài khoản hay chưa
    $checkQuery = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan = '$id_taikhoan'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Nếu đã tồn tại, thực hiện câu lệnh UPDATE
        $updateQuery = "UPDATE tbl_taikhoan SET tennguoinhan = '$tenNguoiNhan', sodienthoai = '$soDienThoai', diachi = '$diaChi' WHERE id_taikhoan = '$id_taikhoan'";
        
        if (mysqli_query($conn, $updateQuery)) {
            // Cập nhật thành công, chuyển hướng trở lại trang trước đó
            echo '<script>window.history.back();</script>';
            exit;
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}
?>
