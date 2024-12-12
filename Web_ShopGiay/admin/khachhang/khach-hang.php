<?php
require_once(__DIR__ . '/../config_data/config.php');
$lietkekh_sql = "SELECT * FROM tbl_taikhoan WHERE id_taikhoan";
$result = mysqli_query($conn, $lietkekh_sql);
?>
<main>
	<div class="dashboard-container-khachhang">
		<div class="card detail">
			<div class="detail-header">
				<h2>Thông tin khách hàng</h2>
			</div>
			<!-- Modal Xóa -->
			<div class="modal fade" id="myModal-xoa">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header" style="border: none;">
							<h5 class="modal-title">Xác nhận xóa ?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>

						<!-- <div class="modal-body"> -->
						<form action="admin/khachhang/xoa-kh.php" method="post">
							<p style="padding: 0 30px ;">Bạn chắc chắn muốn xóa ?</p>
							<div class="modal-footer" style="border: none;">
								<button type="submit" class="btn btn-primary" name="luu">Xác nhận</button>
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
							</div>
						</form>
						<!-- </div> -->
					</div>
				</div>
			</div>

			<table>
				<tr>
					<th>Hình ảnh</th>
					<th>Họ và Tên</th>
					<th>Số điện thoại</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Tùy chọn</th>
				</tr>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td>
							<img class="img-shoe" src="pages/khach/upload/<?php echo $row['hinhanh']; ?>" class="rounded-circle" alt="Ảnh khách hàng">
						</td>
						<td><?php echo $row['tenkhachhang']; ?></td>
						<td><?php echo $row['sodienthoai']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td style="padding: 0 20px;max-width: 300px;"><?php echo $row['diachi']; ?></td>
						<td>
							<a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#myModal-xem-<?php echo $row['id_taikhoan']; ?>">
								<i class="fa-solid fa-pen-to-square"></i>
							</a>
							<a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#myModal-xoa" data-id="<?php echo $row['id_taikhoan']; ?>">
								<i class="fa-solid fa-trash-can"></i>
							</a>
						</td>
					</tr>

					<!-- Modal sửa -->
					<div class="modal fade modal-lg" id="myModal-xem-<?php echo $row['id_taikhoan']; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Thông tin khách hàng</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<div class="modal-body" style="padding: 20px 50px;">
									<form action="admin/khachhang/sua-kh.php" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id_taikhoan" value="<?php echo $row['id_taikhoan']; ?>">
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label style="font-weight: 500; padding-right: 20px;" for="anhkh" class="form-label">Hình ảnh</label>
													<img id="anhkh" src="pages/khach/upload/<?php echo $row['hinhanh']; ?>" style="max-width: 60px; max-height: 60px;">
												</div>
												<div class="mb-3">
													<label style="font-weight: 500;" for="sodienthoai">Số điện thoại</label>
													<p style="padding-left: 15px;"><?php echo $row['sodienthoai']; ?></p>
												</div>
												<div class="mb-3">
													<label style="font-weight: 500;" for="ngaysinh">Ngày sinh</label>
													<?php
													$ngaySinh = $row['ngaysinh'];
													$ngaySinhFormatted = date("d/m/Y", strtotime($ngaySinh));
													echo '<p style="padding-left: 15px;">' . $ngaySinhFormatted . '</p>';
													?>
												</div>
												<div>
													<label style="font-weight: 500;" for="diachi">Địa chỉ</label>
													<p style="padding-left: 15px; margin: 0;"><?php echo $row['diachi']; ?></p>
												</div>
											</div>
											<div class="col-6" style="padding-top: 13px;">
												<div class=" mb-3">
													<label style="font-weight: 500;" for="tenkhachhang">Tên khách hàng</label>
													<p style="padding-left: 15px;"><?php echo $row['tenkhachhang']; ?></p>
												</div>
												<div class="mb-3">
													<label style="font-weight: 500;" for="email">Địa chỉ email</label>
													<p style="padding-left: 15px;"><?php echo $row['email']; ?></p>
												</div>
												<div class="mb-3">
													<label style="font-weight: 500;" for="gioitinh">Giới tính</label>
													<p style="padding-left: 15px;"><?php echo $row['gioitinh']; ?></p>
												</div>
												<div>
													<label style="font-weight: 500;" for="role">Quyền</label>
													<select class="form-select" id="role" name="role">
														<option <?php echo ($row['role'] == 'user') ? 'selected' : ''; ?>>user</option>
														<option <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>admin</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
										</div>
									</form>
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

<!-- Xóa -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var deleteButtons = document.querySelectorAll('.delete-btn');

		deleteButtons.forEach(function(button) {
			button.addEventListener('click', function() {
				var khachHangId = button.getAttribute('data-id');
				var modal = document.getElementById('myModal-xoa');
				var form = modal.querySelector('form');
				form.setAttribute('action', 'admin/khachhang/xoa-kh.php?khid=' + khachHangId);
			});
		});
	});
</script>