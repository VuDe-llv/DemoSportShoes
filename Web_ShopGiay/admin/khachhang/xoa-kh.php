<?php
$kh_id = $_GET['khid'];
require_once(__DIR__ . '/../config_data/config.php');
$xoa_sql = "DELETE FROM tbl_taikhoan WHERE id_taikhoan = $kh_id";
mysqli_query($conn, $xoa_sql);
header('Location: ../../admin.php?khachhang=khachhang');
