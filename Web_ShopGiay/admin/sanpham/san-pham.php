<main>
	<div class="dashboard-container-sanpham">
		<div class="card detail">
			<div class="detail-header">
				<h2>Thông tin sản phẩm</h2>
				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal-them">
					<i class="fa-solid fa-plus"></i> Thêm
				</button>
			</div>
			<table>
				<tr>
					<th>Mã SP</th>
					<th>Ảnh</th>
					<th>Tên sản phẩm</th>
					<th>Loại sản phẩm</th>
					<th>Hãng</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Tùy chọn</th>
				</tr>
				<?php
				require_once(__DIR__ . '/../config_data/config.php');
				$lietkesp_sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham";
				$result = mysqli_query($conn, $lietkesp_sql);
				while ($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td>PV-SP<?php echo $row['id_sanpham']; ?></td>
						<td>
							<img class="img-shoe" src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>">
						</td>
						<td style="padding-right: 10px;"><?php echo $row['tensp']; ?></td>
						<td><?php echo $row['loaisp']; ?></td>
						<td><?php echo $row['hangsp']; ?></td>
						<td><?php echo $row['soluongsp']; ?></td>
						<td><?php echo number_format($row['giasp'], 0, ',', '.'); ?></td>
						<td>
							<a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#myModal-sua-<?php echo $row['id_sanpham']; ?>">
								<i class="fa-solid fa-pen-to-square"></i>
							</a>
							<a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#myModal-xoa" data-id="<?php echo $row['id_sanpham']; ?>">
								<i class="fa-solid fa-trash-can"></i>
							</a>
						</td>
					</tr>
				<?php
				}
				?>
			</table>

		</div>
	</div>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</main>

<!-- Modal Thêm -->
<div class="modal fade modal-xl" id="myModal-them">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thêm sản phẩm</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="admin/sanpham/them-sp.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-6">
							<div class="mb-3">
								<label for="them_anhsp" class="form-label">Ảnh sản phẩm</label>
								<input class="form-control" type="file" id="them_anhsp" placeholder="Chọn hình ảnh" name="them_anhsp">
							</div>
							<div class="mb-3">
								<label for="them_tensp">Tên sản phẩm</label>
								<input type="text" class="form-control" id="them_tensp" placeholder="Nhập tên sản phẩm" name="them_tensp">
							</div>
							<div class="mb-3">
								<label for="them_loaisp">Loại sản phẩm</label>
								<select class="form-select" id="them_loaisp" name="them_loaisp">
									<option>Giày cỏ tự nhiên</option>
									<option>Giày cỏ nhân tạo</option>
									<option>Giày futsal</option>
									<option>Quả bóng đá</option>
									<option>Balo túi xách</option>
									<option>Bảo vệ ống đồng</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="them_hangsp">Hãng</label>
								<select class="form-select" id="them_hangsp" name="them_hangsp">
									<option>Nike</option>
									<option>Adidas</option>
									<option>Puma</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="them_soluongsp">Số lượng</label>
								<input type="number" class="form-control" id="them_soluongsp" placeholder="Nhập tổng số lượng" name="them_soluongsp">
							</div>
							<div class="mb-3">
								<label for="them_giasp">Giá</label>
								<input type="text" class="form-control" id="them_giasp" placeholder="Nhập giá" name="them_giasp">
							</div>
						</div>
						<div class="col-6">
							<div class="row p-3">
								<div class="col-3">
									<div class="mb-3">
										<label for="them_anhsp1" class="form-label">Ảnh 1</label>
										<input class="form-control" type="file" id="them_anhsp1" placeholder="Chọn hình ảnh" name="them_anhsp1">
									</div>
								</div>
								<div class="col-3">
									<div class="mb-3">
										<label for="them_anhsp2" class="form-label">Ảnh 2</label>
										<input class="form-control" type="file" id="them_anhsp2" placeholder="Chọn hình ảnh" name="them_anhsp2">
									</div>
								</div>
								<div class="col-3">
									<div class="mb-3">
										<label for="them_anhsp3" class="form-label">Ảnh 3</label>
										<input class="form-control" type="file" id="them_anhsp3" placeholder="Chọn hình ảnh" name="them_anhsp3">
									</div>
								</div>
								<div class="col-3">
									<div class="mb-3">
										<label for="them_anhsp4" class="form-label">Ảnh 4</label>
										<input class="form-control" type="file" id="them_anhsp4" placeholder="Chọn hình ảnh" name="them_anhsp4">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="them_motasp">Mô tả sản phẩm</label>
								<textarea class="form-control" rows="5" id="them_motasp" name="them_motasp"></textarea>
							</div>
							<div class="mb-3">
								<label for="them_thongsosp">Thông số kỹ thuật</label>
								<textarea class="form-control" rows="5" id="them_thongsosp" name="them_thongsosp"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Thêm</button>
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Sửa -->
<?php
require_once(__DIR__ . '/../config_data/config.php');
$lietkesp_sql = "SELECT * FROM tbl_sanpham";
$result = mysqli_query($conn, $lietkesp_sql);
while ($row = mysqli_fetch_assoc($result)) {
	$productId = $row['id_sanpham'];
?>
	<div class="modal fade modal-xl" id="myModal-sua-<?php echo $row['id_sanpham']; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Sửa sản phẩm</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form action="admin/sanpham/sua-sp.php" method="post" enctype="multipart/form-data" id="<?php echo $productId; ?>">
						<input type="hidden" name="spid" value="<?php echo $productId; ?>">
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label for="sua_anhsp" class="form-label">Ảnh sản phẩm</label>
									<img id="sua_anhsp" src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" style="max-width: 60px; max-height: 60px;">
									<input class="form-control" type="file" id="sua_anhsp" name="sua_anhsp">
								</div>
								<div class=" mb-3">
									<label for="sua_tensp">Tên sản phẩm</label>
									<input type="text" class="form-control" id="sua_tensp" placeholder="Nhập tên sản phẩm" name="sua_tensp" value="<?php echo $row['tensp']; ?>">
								</div>
								<div class="mb-3">
									<label for="sua_loaisp">Loại sản phẩm</label>
									<select class="form-select" id="sua_loaisp" name="sua_loaisp">
										<option <?php echo ($row['loaisp'] == 'Giày cỏ tự nhiên') ? 'selected' : ''; ?>>Giày cỏ tự nhiên</option>
										<option <?php echo ($row['loaisp'] == 'Giày cỏ nhân tạo') ? 'selected' : ''; ?>>Giày cỏ nhân tạo</option>
										<option <?php echo ($row['loaisp'] == 'Giày futsal') ? 'selected' : ''; ?>>Giày futsal</option>
										<option <?php echo ($row['loaisp'] == 'Quả bóng đá') ? 'selected' : ''; ?>>Quả bóng đá</option>
										<option <?php echo ($row['loaisp'] == 'Balo túi xách') ? 'selected' : ''; ?>>Balo túi xách</option>
										<option <?php echo ($row['loaisp'] == 'Bảo vệ ống đồng') ? 'selected' : ''; ?>>Bảo vệ ống đồng</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="sua_hangsp">Hãng</label>
									<select class="form-select" id="sua_hangsp" name="sua_hangsp">
										<option <?php echo ($row['hangsp'] == 'Nike') ? 'selected' : ''; ?>>Nike</option>
										<option <?php echo ($row['hangsp'] == 'Adidas') ? 'selected' : ''; ?>>Adidas</option>
										<option <?php echo ($row['hangsp'] == 'Puma') ? 'selected' : ''; ?>>Puma</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="sua_soluongsp">Số lượng</label>
									<input type="number" class="form-control" id="sua_soluongsp" placeholder="Nhập tổng số lượng" name="sua_soluongsp" value="<?php echo $row['soluongsp']; ?>">
								</div>
								<div class="mb-3">
									<label for="sua_giasp">Giá</label>
									<input type="text" class="form-control" id="sua_giasp" placeholder="Nhập giá" name="sua_giasp" value="<?php echo $row['giasp']; ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="row p-3">
									<div class="col-3">
										<div class="mb-3">
											<label for="sua_anhsp1" class="form-label">Ảnh 1</label>
											<img id="sua_anhsp" src="admin/sanpham/upload/<?php echo $row['anhsp1']; ?>" style="max-width: 40px; max-height: 40px;">
											<input class="form-control" type="file" id="sua_anhsp1" placeholder="Chọn hình ảnh" name="sua_anhsp1">
										</div>
									</div>
									<div class="col-3">
										<div class="mb-3">
											<label for="sua_anhsp2" class="form-label">Ảnh 2</label>
											<img id="sua_anhsp" src="admin/sanpham/upload/<?php echo $row['anhsp2']; ?>" style="max-width: 40px; max-height: 40px;">
											<input class="form-control" type="file" id="sua_anhsp2" placeholder="Chọn hình ảnh" name="sua_anhsp2">
										</div>
									</div>
									<div class="col-3">
										<div class="mb-3">
											<label for="sua_anhsp3" class="form-label">Ảnh 3</label>
											<img id="sua_anhsp" src="admin/sanpham/upload/<?php echo $row['anhsp3']; ?>" style="max-width: 40px; max-height: 40px;">
											<input class="form-control" type="file" id="sua_anhsp3" placeholder="Chọn hình ảnh" name="sua_anhsp3">
										</div>
									</div>
									<div class="col-3">
										<div class="mb-3">
											<label for="sua_anhsp4" class="form-label">Ảnh 4</label>
											<img id="sua_anhsp" src="admin/sanpham/upload/<?php echo $row['anhsp4']; ?>" style="max-width: 40px; max-height: 40px;">
											<input class="form-control" type="file" id="sua_anhsp4" placeholder="Chọn hình ảnh" name="sua_anhsp4">
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="sua_motasp">Mô tả sản phẩm</label>
									<textarea class="form-control" rows="5" id="sua_motasp" name="sua_motasp"><?php echo $row['motasp']; ?></textarea>
								</div>
								<div class="mb-3">
									<label for="sua_thongsosp">Thông số kỹ thuật</label>
									<textarea class="form-control" rows="5" id="sua_thongsosp" name="sua_thongsosp"><?php echo $row['thongsosp']; ?></textarea>
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

<!-- Modal Xóa -->
<div class="modal fade" id="myModal-xoa">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border: none;">
				<h5 class="modal-title">Xác nhận xóa ?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="admin/sanpham/xoa-sp.php" method="post">
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

<!-- Xoá -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var deleteButtons = document.querySelectorAll('.delete-btn');
		deleteButtons.forEach(function(button) {
			button.addEventListener('click', function() {
				var sanphamId = button.getAttribute('data-id');
				var modal = document.getElementById('myModal-xoa');
				var form = modal.querySelector('form');
				form.setAttribute('action', 'admin/sanpham/xoa-sp.php?spid=' + sanphamId);
			});
		});
	});
</script>