<?php
require_once(__DIR__ . '/../config_data/config.php');
$lietkesp_sql = "SELECT mh.*, tk.tenkhachhang, tk.email, sp.* FROM tbl_huydon AS mh INNER JOIN tbl_taikhoan AS tk ON mh.id_taikhoan = tk.id_taikhoan INNER JOIN tbl_sanpham AS sp ON mh.id_sanpham = sp.id_sanpham ORDER BY mh.id_huydon DESC";
$result = mysqli_query($conn, $lietkesp_sql);
?>

<main>
    <div class="dashboard-container-sanpham">
        <div class="card detail">
            <div class="detail-header">
                <h2>Đơn hàng đã hủy</h2>
                <a href="admin.php?donhang=donhang" class="btn btn-primary approve-btn">
                    Trở về
                </a>
            </div>

            <table id="don-hang-table">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng thanh toán</th>
                    <th>Thời gian</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><img class="img-shoe" src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>"></td>
                        <td style="max-width: 200px;"><?php echo $row['tensp']; ?></td>
                        <td style="padding: 10px;"><?php echo $row['tenkhachhang']; ?></td>
                        <td><?php echo number_format($row['tongthanhtoan'], 0, ',', '.'); ?> đ</td>
                        <td><?php echo $row['ngaymua']; ?></td>
                        <td style="min-width: 80px;">
                            <a href="#" class="btn btn-primary approve-btn" data-bs-toggle="modal" data-bs-target="#myModal-xem-<?php echo $row['id_huydon']; ?>">
                                Xem
                            </a>
                        </td>
                    </tr>
                    <!-- Modal xem -->
                    <div class="modal fade modal-lg" id="myModal-xem-<?php echo $row['id_huydon']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Chi tiết đơn hàng</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body" style="padding: 20px 50px;">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; padding-right: 20px;" for="anhsp" class="form-label">Hình ảnh</label>
                                                <img id="anhsp" src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" style="max-width: 60px; max-height: 60px;">
                                            </div>
                                            <div class=" mb-3">
                                                <label style="font-weight: 500;" for="tenkh">Tên khách hàng</label>
                                                <p style="padding-left: 15px;"><?php echo $row['tenkhachhang']; ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="tensp">Tên sản phẩm</label>
                                                <p style="padding-left: 15px;"><?php echo $row['tensp']; ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="thuonghieu">Thương hiệu</label>
                                                <p style="padding-left: 15px;"><?php echo $row['hangsp']; ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="giasp">Đơn giá</label>
                                                <p style="padding-left: 15px;"><?php echo $row['giasp']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-6" style="padding-top: 13px;">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label style="font-weight: 500;" for="soizesp">Size</label>
                                                        <p style="padding-left: 15px;"><?php echo $row['sizesp']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label style="font-weight: 500;" for="soluong">Số lượng</label>
                                                        <p style="padding-left: 15px;"><?php echo $row['soluong']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="phivanchuyen">Phí vận chuyển</label>
                                                <p style="padding-left: 15px;"><?php echo $row['phivanchuyen']; ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="tongthanhtoan">Tổng thanh toán</label>
                                                <p style="padding-left: 15px;"><?php echo $row['tongthanhtoan']; ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="phuongthucthanhtoan">Phương thức thanh toán</label>
                                                <p style="padding-left: 15px;"><?php echo $row['phuongthucthanhtoan']; ?></p>
                                            </div>
                                            <div class="mb-3">
                                                <label style="font-weight: 500;" for="ngaymua">Thời gian</label>
                                                <p style="padding-left: 15px;"><?php echo $row['ngaymua']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</main>