<?php
$email_khachhang = isset($_SESSION['email']) ? $_SESSION['email'] : null;

if ($email_khachhang !== null) {
    $lietkesp_sql = "SELECT giohang.*, sanpham.tensp, sanpham.giasp, sanpham.anhsp FROM tbl_giohang giohang JOIN tbl_sanpham sanpham ON giohang.id_sanpham = sanpham.id_sanpham WHERE giohang.email = '$email_khachhang'";
    $result = mysqli_query($conn, $lietkesp_sql);

    if (!$result) {
        echo "Lỗi truy vấn cơ sở dữ liệu: " . mysqli_error($conn);
    } else {
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
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
                                    <th>Tổng tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $tong_tien = $row['soluong'] * $row['giasp'];
                                ?>
                                    <tr data-giohangid="<?php echo $row['id_giohang']; ?>">
                                        <td><img src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>" style="width: 100px;height: 100px;"></td>
                                        <td style="min-width: 250px; max-width: 350px; font-weight: 500;"><?php echo $row['tensp']; ?></td>
                                        <td>
                                            <select class="form-select size-select" name="sizesp">
                                                <option <?php if ($row['sizesp'] == '39') echo 'selected'; ?>>39</option>
                                                <option <?php if ($row['sizesp'] == '40') echo 'selected'; ?>>40</option>
                                                <option <?php if ($row['sizesp'] == '41') echo 'selected'; ?>>41</option>
                                                <option <?php if ($row['sizesp'] == '42') echo 'selected'; ?>>42</option>
                                                <option <?php if ($row['sizesp'] == '43') echo 'selected'; ?>>43</option>
                                            </select>
                                        </td>

                                        <td style="min-width: 130px; padding: 10px;"><?php echo number_format($row['giasp'], 0, '.', '.'); ?> đ</td>
                                        <td style="min-width: 70px; max-width: 70px; padding: 10px;">
                                            <input type="number" class="form-control quantity-input" name="soluong" min="1" max="10" value="<?php echo $row['soluong']; ?>">
                                        </td>
                                        <td class="total-price" data-unit-price="<?php echo $row['giasp']; ?>" style="min-width: 130px; padding: 10px;"><?php echo number_format($tong_tien, 0, '.', '.'); ?> đ</td>
                                        <td>
                                            <a href="mua-hang.php?id_sanpham=<?php echo $row['id_sanpham']; ?>&id_giohang=<?php echo $row['id_giohang']; ?>" class="btn btn-primary edit-btn" data-id-sanpham="<?php echo $row['id_sanpham']; ?>">
                                                Mua hàng
                                            </a>
                                            <a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#myModal-xoa" data-id="<?php echo $row['id_giohang']; ?>">
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Xóa -->
                <div class="modal fade" id="myModal-xoa">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="border: none;">
                                <h5 class="modal-title">Xác nhận xóa ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="pages/giohang/xoa-gh.php" method="post">
                                    <p style="padding-left: 40px; font-size: 20px;">Bạn chắc chắn muốn xóa ?</p>
                                    <div class="modal-footer" style="border: none;">
                                        <button type="submit" class="btn btn-success" name="luu">Đồng ý</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

                <!-- Xoá và Tổng tiền -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var deleteButtons = document.querySelectorAll('.delete-btn');
                        var quantityInputs = document.querySelectorAll('.quantity-input');
                        var sizeSelects = document.querySelectorAll('.size-select');
                        var totalElements = document.querySelectorAll('.total-price');
                        deleteButtons.forEach(function(button) {
                            button.addEventListener('click', function() {
                                var giohangId = button.getAttribute('data-id');
                                var modal = document.getElementById('myModal-xoa');
                                var form = modal.querySelector('form');
                                form.setAttribute('action', 'pages/giohang/xoa-gh.php?ghid=' + giohangId);
                            });
                        });

                        function updateCartItem(index) {
                            var giohangId = document.querySelectorAll('[data-giohangid]')[index].getAttribute('data-giohangid');
                            var newSize = sizeSelects[index].value;
                            var newQuantity = quantityInputs[index].value;

                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'pages/giohang/update-gio-hang.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    var unitPrice = parseFloat(totalElements[index].getAttribute('data-unit-price'));
                                    var newTotal = unitPrice * newQuantity;
                                    totalElements[index].textContent = newTotal.toLocaleString('vi-VN') + ' đ';
                                }
                            };
                            xhr.send('giohangId=' + giohangId + '&newSize=' + newSize + '&newQuantity=' + newQuantity);
                        }
                        quantityInputs.forEach(function(input, index) {
                            input.addEventListener('change', function() {
                                updateCartItem(index);
                            });
                        });
                        sizeSelects.forEach(function(select, index) {
                            select.addEventListener('change', function() {
                                updateCartItem(index);
                            });
                        });
                    });
                </script>
            </body>
<?php
        } else {
            echo '<div style="padding-top: 100px; text-align: center;">';
            echo '<img src="images/gio-hang-rong.png" alt="Giỏ hàng rỗng" style="margin: 0 auto;">';
            echo '<h4 style="text-align: center;color: #248BD6;">Không có gì trong giỏ hàng</h4>';
            echo '</div>';
        }
    }
} else {
    echo '<div style="padding-top: 180px;padding-bottom: 30px;; text-align: center;">';
    echo '<h4 style="text-align: center;color: #248BD6;">Vui lòng đăng nhập để xem giỏ hàng</h4>';
    echo '</div>';
}

mysqli_close($conn);
?>