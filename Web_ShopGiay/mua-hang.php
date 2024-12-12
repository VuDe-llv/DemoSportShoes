<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Mua hàng</title>
</head>

<style>
    .table-container {
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .table-container table {
        width: 100%;
    }

    .table-container th,
    .table-container td {
        font-family: 'Roboto', sans-serif;
        text-align: center;
        vertical-align: middle;
    }

    .table-container img {
        padding: 10px;
        max-width: 100px;
        height: auto;
    }

    .table-container .dropdown {
        width: 100%;
    }

    .td {
        text-align: justify;
    }

    .table-container {
        width: 100%;
        margin-top: 5px;
    }
</style>

<body>
    <?php
    include("admin/config_data/config.php");
    include("pages/header.php");
    include("pages/menu.php");

    if (isset($_SESSION['id_taikhoan'])) {
        $id_taikhoan = $_SESSION['id_taikhoan'];
        $query = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan = $id_taikhoan";
        $result = mysqli_query($conn, $query);
    ?>
        <div class="container-xxl" style="padding: 15px 40px;padding-top: 100px;">
            <div class="alert alert-primary m-0">
                <strong>
                    <div class="dashed-border" style="display: flex;justify-content: space-between;">
                        <p style="font-weight: bold;"><i class="fa-solid fa-location-dot" style="color: #ff0000;padding-right: 2px;"></i>
                            Địa chỉ nhận hàng
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal-diachi">Thêm địa chỉ</button>
                    </div>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                    ?>
                        <span style="font-weight: bold;padding-left: 20px; color: #000000;"><?php echo $row['tennguoinhan']; ?> <?php echo $row['sodienthoai']; ?></span>
                        <span style="font-weight: 400;padding-left: 20px; color: #000000;"><?php echo $row['diachi']; ?></span>
                    <?php
                    } else {
                        echo "Thêm địa chỉ giao hàng để chúng tôi có thể gửi đơn hàng đến bạn";
                    }
                    ?>
                </strong>
            </div>
        </div>
    <?php
    } else {
        echo "Chưa đăng nhập.";
    }
    ?>

    <?php
    if (isset($_GET['id_sanpham']) && isset($_GET['id_giohang'])) {
        $id_sanpham = $_GET['id_sanpham'];
        $id_giohang = $_GET['id_giohang'];
        $query = "SELECT giohang.*, sanpham.tensp, sanpham.giasp, sanpham.anhsp FROM tbl_giohang giohang JOIN tbl_sanpham sanpham ON giohang.id_sanpham = sanpham.id_sanpham WHERE giohang.id_sanpham = $id_sanpham AND giohang.id_giohang = $id_giohang";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
    ?>
            <div class="container-xxl" style="padding: 0 40px;">
                <div class="table-container" style="padding-top: 5px;margin: 0;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tong_tien_hang = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $tong_tien = $row['soluong'] * $row['giasp'];
                                $tong_tien_hang += $tong_tien;
                            ?>
                                <tr data-giohangid="<?php echo $row['id_giohang']; ?>">
                                    <td><img src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>"></td>
                                    <td style="min-width: 250px;max-width: 350px;font-weight: 500;"><?php echo $row['tensp']; ?></td>
                                    <td style="min-width: 130px;padding: 10px;"><?php echo $row['sizesp']; ?></td>
                                    <td style="min-width: 130px;padding: 10px;"><?php echo number_format($row['giasp'], 0, '.', '.'); ?> đ</td>
                                    <td style="min-width: 70px;max-width: 70px;padding: 10px;"><?php echo $row['soluong']; ?></td>
                                    <td style="min-width: 130px;padding: 10px;"><?php echo number_format($tong_tien, 0, '.', '.'); ?> đ</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    <?php
        } else {
            echo "Không tìm thấy sản phẩm trong giỏ hàng.";
        }
    } else {
        echo "Thiếu tham số id.";
    }
    ?>

    <div class="container-xxl" style="padding: 15px 40px;">
        <form action="xu-ly-mua-hang.php?id_sanpham=<?php echo $id_sanpham; ?>&id_giohang=<?php echo $id_giohang; ?>" method="post" enctype="multipart/form-data">
            <div class="alert alert-light">
                <div class="row">
                    <div class="col-6">
                        <p style="padding-left: 40px;font-weight: bold;margin: 0;">Lời nhắn</p>
                        <div style="padding-left: 60px;padding-top: 5px;">
                            <textarea style="padding: 10px;" name="loinhan" id="loinhan" cols="40" rows="3" placeholder="Lưu ý cho người bán..."></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <p style="padding-left: 40px;font-weight: bold;margin: 0 ;">Đơn vị vận chuyển</p>
                        <div class="radio-buttons-container">
                            <div style="padding: 0 60px;">
                                <div class="radio-buttons" style="display: flex;justify-content: space-between;margin-top: 5px;">
                                    <div>
                                        <input class="form-check-input" type="radio" name="donViVanChuyen" id="normalNote" value="20000" checked>
                                        <span style="font-weight: 500;" class="form-check-label" for="normalNote">Thường</span>
                                    </div>
                                    <span style="justify-content: end; color: #248BD6; font-weight: 500;">20.000đ</span>
                                </div>
                                <p style="padding-left: 30px;margin-bottom: 5px;">Nhận hàng sau 7 - 10 ngày</p>
                            </div>
                            <div style="padding: 0 60px;">
                                <div class="radio-buttons" style="display: flex;justify-content: space-between;">
                                    <div>
                                        <input class="form-check-input" type="radio" name="donViVanChuyen" id="quickNote" value="30000">
                                        <span style="font-weight: 500;" class="form-check-label" for="normalNote">Nhanh</span>
                                    </div>
                                    <span style="justify-content: end; color: #248BD6; font-weight: 500;">30.000đ</span>
                                </div>
                                <p style="padding-left: 30px;margin: 0;">Nhận hàng sau 5 - 7 ngày</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-light" style="padding: 0 20px;">
                <strong style="display: flex;justify-content: space-between;padding: 10px 40px;">
                    <div style="display: flex;justify-content: space-between;margin: 0;">
                        <p style="margin: 0; color: #000000;">Phương thức thanh toán</p>
                    </div>
                    <div class="radio-buttons-container">
                        <div style="display: flex;">
                            <div class="radio-buttons radio-buttons-2" style="padding: 0 30px;">
                                <input class="form-check-input" type="radio" name="phuongThucThanhToan" id="normal" value="Thanh toán khi nhận hàng" checked>
                                <label style="font-weight: 500;" class="form-check-label" for="normalNote">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="radio-buttons radio-buttons-2" style="padding: 0 30px;">
                                <input class="form-check-input" type="radio" name="phuongThucThanhToan" id="quick" value="Thanh toán bằng chuyển khoản">
                                <label style="font-weight: 500;" class="form-check-label" for="quickNote">Thanh toán bằng chuyển khoản</label>
                            </div>
                        </div>
                        <div style="padding: 0 60px;">
                        </div>
                    </div>
                </strong>
            </div>


            <div class="alert alert-light" style="padding: 0 60px;">
                <strong style="padding: 20px;">
                    <div class="row">
                        <div class="col-10">
                            <p style="display: flex; justify-content: flex-end;">Tổng tiền hàng:</p>
                            <p style="display: flex; justify-content: flex-end;">Phí vận chuyển:</p>
                            <p style="display: flex; justify-content: flex-end; margin: 0; padding-top: 7px;">Tổng thanh toán:</p>
                        </div>
                        <div class="col-2">
                            <p style="font-size: medium; display: flex; justify-content: flex-end;" id="tongTienHang"><?php echo number_format($tong_tien_hang, 0, '.', '.'); ?>đ</p>
                            <p style="font-size: medium; display: flex; justify-content: flex-end;" id="phiVanChuyen">0đ</p>
                            <p style="font-size: x-large; display: flex; justify-content: flex-end;color: #248BD6;" id="tongThanhToan"><?php echo number_format($tong_tien_hang, 0, '.', '.'); ?>đ</p>
                        </div>
                    </div>
                </strong>
            </div>
            <div style="display: flex;justify-content: space-between;font-weight: 400;align-items: center;">
                <p style="margin: 0;">Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân thủ theo điều khoản của
                    <span style="font-family: 'Mistral', cursive;font-size: 20px; color: #248BD6; font-weight: bold;">PV Sport</span>
                </p>
                <button style="width: 100px; margin-right: 50px;" type="submit" class="btn btn-primary">Đặt hàng</button>
            </div>
        </form>
    </div>

    <!-- Modal Thêm địa chỉ -->
    <div class="modal fade" id="myModal-diachi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm địa chỉ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="them-dia-chi.php" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Họ và Tên" name="tenNguoiNhan" required>
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="soDienThoai" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Phường/Xã, Huyện/Thành Phố, Tỉnh" name="xaHuyenTinh" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Số nhà (nếu có), Tổ, Ấp" name="soToAp" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("pages/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var phiVanChuyenElement = document.getElementsByName('donViVanChuyen');
        var phiVanChuyen = 30000;

        var radioNhanh = Array.from(phiVanChuyenElement).find(function(radio) {
            return radio.value === '30000';
        });

        if (radioNhanh) {
            radioNhanh.checked = true;
            phiVanChuyen = parseFloat(radioNhanh.value);
            updateTongThanhToan();
        }

        phiVanChuyenElement.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (radio.checked) {
                    phiVanChuyen = parseFloat(radio.value);
                    updateTongThanhToan();
                }
            });
        });

        function updateTongThanhToan() {
            var tongTienHang = <?php echo $tong_tien_hang; ?>;
            var tongThanhToan = tongTienHang + phiVanChuyen;
            document.getElementById('tongTienHang').textContent = tongTienHang.toLocaleString('vi-VN') + ' đ';
            document.getElementById('phiVanChuyen').textContent = phiVanChuyen.toLocaleString('vi-VN') + ' đ';
            document.getElementById('tongThanhToan').textContent = tongThanhToan.toLocaleString('vi-VN') + ' đ';
        }
    });
</script>

</html>