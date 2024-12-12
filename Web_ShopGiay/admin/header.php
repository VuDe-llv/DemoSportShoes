<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
	die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
<nav class="navbar-top">
	<h4 class="navbar-top-logo">
		PV Sport
	</h4>
	<?php
	if (isset($_SESSION['email'])) {
		$email = $_SESSION['email'];

		// Truy vấn để lấy thông tin khách hàng từ tbl_taikhoan dựa trên email và chỉ lấy nếu có vai trò là 'admin'
		$query = "SELECT tenkhachhang, hinhanh FROM tbl_taikhoan WHERE email = '$email' AND role = 'admin'";
		$result = mysqli_query($conn, $query);

		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$tenkhachhang = $row['tenkhachhang'];
			$hinhanh = $row['hinhanh'];

			// Nếu không có dữ liệu trong cột hinhanh hoặc dữ liệu rỗng, sử dụng ảnh mặc định
			$hinhanh_src = $hinhanh ? "pages/khach/upload/$hinhanh" : "images/user.png";
		} else {
			// Xử lý khi không tìm thấy tài khoản admin
			$tenkhachhang = 'Admin';
			$hinhanh_src = "images/user.png";
		}
	?>
		<div class="profile">
			<p class="profile-name"><?php echo $tenkhachhang; ?></p>
			<img src="<?php echo $hinhanh_src; ?>" alt="" class="profile-image">
		</div>
	<?php } else { ?>
		<a style="padding-right: 20px;" href="login-register.php" class="navbar-brand">Admin
			<img style="margin: 0;" src="images/user.png" alt="" class="profile-image">
		</a>
	<?php } ?>
</nav>

<input type="checkbox" id="toggle">
<label class="side-toggle" for="toggle">
	<span class="fas fa-bars"></span>
</label>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>