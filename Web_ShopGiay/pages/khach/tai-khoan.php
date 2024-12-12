<?php
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy id_taikhoan từ tham số truyền vào, hoặc từ session
$id_taikhoan_to_display = isset($_GET['id_taikhoan']) ? $_GET['id_taikhoan'] : $_SESSION['id_taikhoan'];

$lietkekh_sql = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan = $id_taikhoan_to_display AND role = 'user' ORDER BY id_taikhoan";
$result = mysqli_query($conn, $lietkekh_sql);
?>
<div class="container-xxl" style="padding-top: 100px; padding-left: 30px; padding-right: 30px;">
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div style="padding-top: 5px; margin: 0;border-radius: 5px;border: 2px solid rgba(0, 0, 0, 0.1);padding: 20px;">
            <h5 style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);padding-bottom: 10px;margin: 0;">Hồ sơ khách hàng</h5>
            <form action="pages/khach/luu-tai-khoan.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_taikhoan" value="<?php echo $row['id_taikhoan']; ?>">
                <div class="row">
                    <div class="col-4" style="padding: 30px 60px;">
                        <div class="mb-3">
                            <label style="font-weight: 500; padding-right: 20px;" for="hinhanh" class="form-label">Hình ảnh</label>
                            <img style="margin-left: 25px;margin-bottom: 15px;" src="pages/khach/upload/<?php echo $row['hinhanh']; ?>" class="rounded-circle" alt="Ảnh khách hàng" width="200" height="200">
                            <input class="form-control" type="file" id="hinhanh" placeholder="Chọn hình ảnh" name="hinhanh">
                        </div>
                    </div>
                    <div class="col-8" style="border-left: 1px solid rgba(0, 0, 0, 0.1); padding: 30px 70px;">
                        <div class="mb-3" style="display: flex;align-items: center;">
                            <label style="font-weight: 500;width: 100px;" for="tenkhachhang">Họ và Tên: </label>
                            <input class="form-control" type="text" name="tenkhachhang" value="<?php echo $row['tenkhachhang']; ?>">
                        </div>
                        <div class="mb-3" style="display: flex;align-items: center;padding: 10px 0;">
                            <label style="font-weight: 500;" for="email">Email: </label>
                            <p style="padding-left: 15px;margin: 0;"><?php echo $row['email']; ?></p>
                        </div>
                        <div class="mb-3" style="display: flex;align-items: center;">
                            <label style="font-weight: 500;width: 130px;" for="sodienthoai">Số điện thoại: </label>
                            <input name="sodienthoai" class="form-control" type="text" value="<?php echo $row['sodienthoai']; ?>">
                        </div>
                        <div class="mb-3" style="display: flex;align-items: center;">
                            <label style="font-weight: 500;width: 85px;" for="gioitinh">Giới tính: </label>
                            <select class="form-select" id="gioitinh" name="gioitinh">
                                <option <?php echo ($row['gioitinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                <option <?php echo ($row['gioitinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                                <option <?php echo ($row['gioitinh'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                            </select>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <label style="font-weight: 500; width: 100px;" for="ngaysinh">Ngày sinh: </label>
                            <input name="ngaysinh" class="form-control" type="date" value="<?php echo $row['ngaysinh']; ?>" onchange="formatDate(this)">
                        </div>
                    </div>
                </div>
                <div style="border-top: 1px solid rgba(0, 0, 0, 0.1); padding-top: 10px;display: flex;justify-content: end;padding-right: 50px;">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    <?php
    }
    ?>
</div>