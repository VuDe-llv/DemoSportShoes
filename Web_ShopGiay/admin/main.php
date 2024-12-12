
	<?php
	if (isset($_GET['khachhang'])) {
		$tam = $_GET['khachhang'];
	} elseif (isset($_GET['sanpham'])) {
		$tam = $_GET['sanpham'];
	} elseif (isset($_GET['donhang'])) {
		$tam = $_GET['donhang'];
	} elseif (isset($_GET['tintuc'])) {
		$tam = $_GET['tintuc'];
	} else {
		$tam = '';
	}

	if ($tam == 'khachhang') {
		include("khachhang/khach-hang.php");
	} elseif ($tam == 'sanpham') {
		include("sanpham/san-pham.php");
	} elseif ($tam == 'donhang') {
		include("donhang/don-hang.php");
	} elseif ($tam == 'huydonhang') {
		include("donhang/don-da-huy.php");
	} elseif ($tam == 'tintuc') {
		include("tintuc/tin-tuc.php");
	} else {
		include("main/admin.php");
	}

	?>



