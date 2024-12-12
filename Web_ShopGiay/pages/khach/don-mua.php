<?php
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$id_taikhoan = $_SESSION['id_taikhoan'];
$lietkesp_sql = "SELECT mh.*, tk.tenkhachhang, tk.email, sp.* FROM tbl_muahang AS mh INNER JOIN tbl_taikhoan AS tk ON mh.id_taikhoan = tk.id_taikhoan INNER JOIN tbl_sanpham AS sp ON mh.id_sanpham = sp.id_sanpham WHERE mh.id_taikhoan = $id_taikhoan ORDER BY mh.id_muahang DESC";
$result = mysqli_query($conn, $lietkesp_sql);
?>

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
    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="container-xxl" style="padding-top: 100px; padding-left: 30px; padding-right: 30px;">
            <div class="table-container" style="padding-top: 5px; margin: 0;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><img src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>" style="width: 100px;height: 100px;"></td>
                                <td style="min-width: 220px; max-width: 300px; font-weight: 500;"><?php echo $row['tensp']; ?></td>
                                <td><?php echo $row['sizesp']; ?></td>
                                <td style="min-width: 130px; padding: 10px;"><?php echo number_format($row['giasp'], 0, ',', '.'); ?> đ</td>
                                <td style="min-width: 70px; max-width: 70px; padding: 10px;"><?php echo $row['soluong']; ?></td>
                                <td class="total-price" data-unit-price="" style="min-width: 130px; padding: 10px;"><?php echo number_format($row['tongthanhtoan'], 0, ',', '.'); ?> đ</td>
                                <td style="min-width: 150px; max-width: 150px; padding: 10px;font-weight: 500;font-size: 15px;color: #248BD6;"><?php echo $row['trangthai']; ?></td>
                                <td>
                                    <?php if ($row['trangthai'] == 'CHỜ XÁC NHẬN') { ?>
                                        <form action="pages/khach/huy-dh.php" method="post">
                                            <input type="hidden" name="id_muahang" value="<?php echo $row['id_muahang']; ?>">
                                            <button type="submit" class="btn btn-warning delete-btn" data-bs-toggle="modal" data-bs-target="#myModal-huy">
                                                Hủy
                                            </button>
                                        </form>
                                    <?php } ?>
                                </td>
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
        echo '<div style="padding-top: 100px; text-align: center;">';
        echo '<img src="images/checkout.png" alt="Giỏ hàng rỗng" style="margin: 0 auto;padding: 30px; width: 260px">';
        echo '<h4 style="text-align: center;color: #248BD6;">Đơn hàng đã đặt sẽ xuất hiện ở đây</h4>';
        echo '</div>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>