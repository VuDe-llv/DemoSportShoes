<?php
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_muahang'])) {
        $id_muahang = $_POST['id_muahang'];

        // Lấy thông tin đơn hàng từ tbl_muahang
        $muahang_sql = "SELECT * FROM tbl_muahang WHERE id_muahang = $id_muahang";
        $muahang_result = mysqli_query($conn, $muahang_sql);
        $muahang_row = mysqli_fetch_assoc($muahang_result);

        // Lấy trạng thái đơn hàng
        $trangthai_sql = "SELECT trangthai FROM tbl_muahang WHERE id_muahang = $id_muahang";
        $trangthai_result = mysqli_query($conn, $trangthai_sql);
        $trangthai_row = mysqli_fetch_assoc($trangthai_result);

        if ($trangthai_row['trangthai'] == 'CHỜ XÁC NHẬN') {
            // Lưu thông tin đơn hàng vào tbl_huydon với thêm ngày mua
            $insert_sql = "INSERT INTO tbl_huydon (id_taikhoan, id_sanpham, sizesp, giasp, soluong, tongtien, phivanchuyen, tongthanhtoan, phuongthucthanhtoan, ngaymua)
                            VALUES ('{$muahang_row['id_taikhoan']}', '{$muahang_row['id_sanpham']}', '{$muahang_row['sizesp']}', '{$muahang_row['giasp']}', '{$muahang_row['soluong']}', '{$muahang_row['tongtien']}', '{$muahang_row['phivanchuyen']}', '{$muahang_row['tongthanhtoan']}', '{$muahang_row['phuongthucthanhtoan']}', NOW())";
            $insert_result = mysqli_query($conn, $insert_sql);

            if ($insert_result) {
                // Xóa đơn hàng khi trạng thái là "CHỜ XÁC NHẬN"
                $xoa_sql = "DELETE FROM tbl_muahang WHERE id_muahang = $id_muahang";
                $xoa_result = mysqli_query($conn, $xoa_sql);

                if ($xoa_result) {
                    // Điều hướng hoặc thông báo thành công
                    echo '<script>window.history.back();</script>';
                    exit();
                } else {
                    // Thông báo lỗi nếu xóa không thành công
                    echo "Lỗi khi hủy đơn hàng: " . mysqli_error($conn);
                }
            } else {
                // Thông báo lỗi nếu không thể chép dữ liệu
                echo "Lỗi khi chép dữ liệu vào tbl_huydon: " . mysqli_error($conn);
            }
        } else {
            // Ẩn thông báo hoặc thực hiện các xử lý khác khi trạng thái không phải "CHỜ XÁC NHẬN"
            // ...
        }
    }
}
?>
