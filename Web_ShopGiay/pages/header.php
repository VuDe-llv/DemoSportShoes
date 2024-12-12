<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
<nav class="navbar navbar-small navbar-expand-lg fixed-top" style="background-color: #248BD6; z-index: 100;">
    <div class="container-xxl container-xxl-header">
        <ul class="header">
            <li class="header-link">
                <span class="header-link-no-pointer">Kết nối</span>
                <a class="icon-facebook navbar-brand" href="#">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a class="icon-instagram navbar-brand" href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </li>
        </ul>
        <ul class="header">
            <li class="header-link">
                <?php
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];

                    // Truy vấn để lấy tên khách hàng từ tbl_taikhoan dựa trên email
                    $query = "SELECT tenkhachhang FROM tbl_taikhoan WHERE email = '$email'";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $tenkhachhang = $row['tenkhachhang'];
                    } else {
                        // Xử lý khi không tìm thấy tài khoản
                        $tenkhachhang = 'Khách hàng';
                    }
                ?>
                    <div class="dropdown">
                        <a class="navbar-brand" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $tenkhachhang; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="top: 25px;font-size: 15px;">
                            <li>
                                <a class="dropdown-item" href="index.php?khach=taikhoan">Tài khoản</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?khach=donmua">Đơn mua</a>
                            </li>
                            <li>
                                <form action="logout.php" method="post">
                                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="login-register.php" class="navbar-brand">Đăng nhập</a>
                <?php } ?>
            </li>
            <li class="header-link">
                <?php
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];

                    // Truy vấn để lấy ảnh khách hàng từ tbl_taikhoan dựa trên email
                    $query = "SELECT hinhanh FROM tbl_taikhoan WHERE email = '$email'";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $hinhanh = $row['hinhanh'];

                        // Nếu không có dữ liệu trong cột hinhanh hoặc dữ liệu rỗng, sử dụng ảnh mặc định
                        $hinhanh_src = $hinhanh ? "pages/khach/upload/$hinhanh" : "images/user.png";
                    } else {
                        $hinhanh_src = "images/user.png";
                    }
                ?>
                    <img src="<?php echo $hinhanh_src; ?>" style="width:20px;margin-bottom: 2px;" class="rounded-pill">
                <?php } else { ?>
                    <!-- Nếu không có session email, sử dụng ảnh mặc định -->
                    <img src="images/user.png" style="width:20px;margin-bottom: 2px;" class="rounded-pill">
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
