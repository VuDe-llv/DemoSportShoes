<?php
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id_taikhoan = $_POST['id_taikhoan'];
    $tenkhachhang = isset($_POST['tenkhachhang']) ? $_POST['tenkhachhang'] : '';
    $sodienthoai = isset($_POST['sodienthoai']) ? $_POST['sodienthoai'] : '';
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
    $ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';

    // Kiểm tra xem có hình ảnh mới được chọn không
    if ($_FILES['hinhanh']['name'] != '') {
        // Xử lý và lưu hình ảnh mới
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh_moi = time() . ' ' . $hinhanh;
        move_uploaded_file($hinhanh_tmp, 'upload/' . $hinhanh_moi);

        // Cập nhật thông tin tài khoản và hình ảnh
        $update_taikhoan_sql = "UPDATE tbl_taikhoan SET tenkhachhang='$tenkhachhang', sodienthoai='$sodienthoai', gioitinh='$gioitinh', ngaysinh='$ngaysinh', hinhanh='$hinhanh_moi' WHERE id_taikhoan=$id_taikhoan";
    } else {
        // Không có hình ảnh mới, chỉ cập nhật thông tin tài khoản
        $update_taikhoan_sql = "UPDATE tbl_taikhoan SET tenkhachhang='$tenkhachhang', sodienthoai='$sodienthoai', gioitinh='$gioitinh', ngaysinh='$ngaysinh' WHERE id_taikhoan=$id_taikhoan";
    }

    // Thực hiện truy vấn cập nhật
    $update_taikhoan_result = mysqli_query($conn, $update_taikhoan_sql);

    if ($update_taikhoan_result) {
        // Cập nhật thành công, có thể thực hiện các công việc khác hoặc điều hướng trang
        echo '<script>window.history.back();</script>';
        exit();
    } else {
        // Lỗi khi cập nhật
        echo "Lỗi khi cập nhật tài khoản: " . mysqli_error($conn);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>
