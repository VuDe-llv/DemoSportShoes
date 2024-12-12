<?php
require_once(__DIR__ . '/../config_data/config.php');
$lietkesp_sql = "SELECT mh.*, tk.tenkhachhang, tk.email, sp.* 
                FROM tbl_muahang AS mh 
                INNER JOIN tbl_taikhoan AS tk ON mh.id_taikhoan = tk.id_taikhoan 
                INNER JOIN tbl_sanpham AS sp ON mh.id_sanpham = sp.id_sanpham 
                WHERE mh.trangthai = 'CHỜ XÁC NHẬN' 
                ORDER BY mh.id_muahang DESC";
$result = mysqli_query($conn, $lietkesp_sql);
?>

<?php
// Tính tổng doanh thu
$doanhThuSql = "SELECT SUM(tongthanhtoan) AS tongdoanhthu FROM tbl_muahang";
$doanhThuResult = mysqli_query($conn, $doanhThuSql);
$doanhThuRow = mysqli_fetch_assoc($doanhThuResult);
$tongDoanhThu = $doanhThuRow['tongdoanhthu'];

// Tính tổng số đơn hàng
$tongDonHangSql = "SELECT COUNT(*) AS tongdonhang FROM tbl_muahang WHERE trangthai != 'CHỜ XÁC NHẬN'";
$tongDonHangResult = mysqli_query($conn, $tongDonHangSql);
$tongDonHangRow = mysqli_fetch_assoc($tongDonHangResult);
$tongSoDonHang = $tongDonHangRow['tongdonhang'];

// Tính tổng số khách hàng (tài khoản có role là 'user')
$tongKhachHangSql = "SELECT COUNT(*) AS tongkhachhang FROM tbl_taikhoan WHERE role = 'user'";
$tongKhachHangResult = mysqli_query($conn, $tongKhachHangSql);
$tongKhachHangRow = mysqli_fetch_assoc($tongKhachHangResult);
$tongSoKhachHang = $tongKhachHangRow['tongkhachhang'];

// Tính tổng số đơn hàng hằng ngày
$donHangHangNgaySql = "SELECT COUNT(*) AS tongdonhanghangngay FROM tbl_muahang WHERE DATE(ngaymua) = CURDATE() AND trangthai != 'CHỜ XÁC NHẬN'";
$donHangHangNgayResult = mysqli_query($conn, $donHangHangNgaySql);
$donHangHangNgayRow = mysqli_fetch_assoc($donHangHangNgayResult);
$tongSoDonHangHangNgay = $donHangHangNgayRow['tongdonhanghangngay'];
?>

<style>
    #admin-don-hang-table td {
        vertical-align: middle;
    }
</style>

<main>
    <div class="dashboard-container" style="padding-top: -10px;">
        <div class="card total1" style="background-color: #2D972E;height: 150px;">
            <div class="info">
                <div class="info-detail">
                    <h3 style="font-size: 25px;font-weight: 600;color: #FFFFFF;">Doanh thu</h3>
                </div>
                <div class="info-image">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
            <h2 style="color: #FFFFFF;font-size: 22px;"><?php echo number_format($tongDoanhThu, 0, ',', '.'); ?> <span style="font-size: 22px;">đ</span></h2>
        </div>
        <div class="card total2" style="background-color: #FFA705;height: 150px;">
            <div class="info">
                <div class="info-detail">
                    <h3 style="font-size: 25px;font-weight: 600;color: #FFFFFF;">Tổng số đơn hàng</h3>
                </div>
                <div class="info-image">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
            <h2 style="color: #FFFFFF;font-size: 22px;"><?php echo $tongSoDonHang; ?> <span style="font-size: 22px;">đơn</span></h2>
        </div>
        <div class="card total3" style="background-color: #9132BD;height: 150px;">
            <div class="info">
                <div class="info-detail">
                    <h3 style="font-size: 25px;font-weight: 600;color: #FFFFFF;">Khách hàng</h3>
                </div>
                <div class="info-image">
                    <i class="fas fa-user-friends"></i>
                </div>
            </div>
            <h2 style="color: #FFFFFF;font-size: 22px;"><?php echo $tongSoKhachHang; ?> <span style="font-size: 22px;">khách</span></h2>
        </div>
        <div class="card total4" style="background-color: #15A1FE;height: 150px;">
            <div class="info">
                <div class="info-detail">
                    <h3 style="font-size: 25px;font-weight: 600;color: #FFFFFF;">Đơn hàng hằng ngày</h3>
                </div>
                <div class="info-image">
                    <i class="fas fa-shipping-fast"></i>
                </div>
            </div>
            <h2 style="color: #FFFFFF;font-size: 22px;"><?php echo $tongSoDonHangHangNgay; ?> <span style="font-size: 22px;">đơn</span></h2>
        </div>
    </div>

    <div class="dashboard-container-sanpham" style="padding-top: 20px;">
        <div class="card detail">
            <div class="detail-header">
                <h2>Xác nhận đơn hàng</h2>
            </div>
            <table class="table" id="admin-don-hang-table">
                <thead>
                    <tr>
                        <th>Tên đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Đơn giá</th>
                        <th style="width: 50px;">Số lượng</th>
                        <th>Tổng thanh toán</th>
                        <th>Ngày mua</th>
                        <th style="min-width: 80px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $orderId = $row['id_muahang'];
                        $isApproved = isOrderApproved($orderId); // Kiểm tra xem đơn hàng đã được duyệt chưa
                    ?>
                        <tr data-id="<?php echo $orderId; ?>" <?php echo $isApproved ? 'style="display: none;"' : ''; ?>>
                            <td style="max-width: 180px;"><?php echo $row['tensp']; ?></td>
                            <td style="padding: 10px;"><?php echo $row['tenkhachhang']; ?></td>
                            <td><?php echo number_format($row['giasp'], 0, ',', '.'); ?> đ</td>
                            <td style="width: 50px;"><?php echo $row['soluong']; ?></td>
                            <td><?php echo number_format($row['tongthanhtoan'], 0, ',', '.'); ?> đ</td>
                            <td><?php echo $row['ngaymua']; ?></td>
                            <td style="min-width: 80px;">
                                <button type="button" class="btn btn-success approve-btn" data-id="<?php echo $orderId; ?>">
                                    <span>Xác nhận</span>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    function isOrderApproved($orderId)
    {
        return false;
    }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var approveButtons = document.querySelectorAll('.approve-btn');
            approveButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var orderId = button.getAttribute('data-id');
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                var rowToHide = document.querySelector('[data-id="' + orderId + '"]');
                                if (rowToHide) {
                                    rowToHide.style.display = 'none';
                                }
                            } else {
                                console.error('Lỗi khi gửi yêu cầu duyệt đơn hàng.');
                            }
                        }
                    };
                    xhr.open('POST', 'admin/main/duyet-dh.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('orderId=' + orderId);
                });
            });
        });
    </script>
</main>