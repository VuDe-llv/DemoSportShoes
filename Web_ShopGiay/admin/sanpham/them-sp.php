<?php
$tensp = trim($_POST['them_tensp']);
$loaisp = trim($_POST['them_loaisp']);
$hangsp = trim($_POST['them_hangsp']);
$soluongsp = trim($_POST['them_soluongsp']);
$giasp = trim($_POST['them_giasp']);
$motasp = htmlspecialchars(trim($_POST['them_motasp'])); // Sử dụng htmlspecialchars để giữ nguyên định dạng
$thongsosp = htmlspecialchars(trim($_POST['them_thongsosp'])); // Sử dụng htmlspecialchars để giữ nguyên định dạng

$anhsp = $_FILES['them_anhsp']['name'];
$anhsp = time() . ' ' . $anhsp;
$anhsp_tmp = $_FILES['them_anhsp']['tmp_name'];

$anhsp1 = $_FILES['them_anhsp1']['name'];
$anhsp1 = time() . ' ' . $anhsp1;
$anhsp1_tmp = $_FILES['them_anhsp1']['tmp_name'];

$anhsp2 = $_FILES['them_anhsp2']['name'];
$anhsp2 = time() . ' ' . $anhsp2;
$anhsp2_tmp = $_FILES['them_anhsp2']['tmp_name'];

$anhsp3 = $_FILES['them_anhsp3']['name'];
$anhsp3 = time() . ' ' . $anhsp3;
$anhsp3_tmp = $_FILES['them_anhsp3']['tmp_name'];

$anhsp4 = $_FILES['them_anhsp4']['name'];
$anhsp4 = time() . ' ' . $anhsp4;
$anhsp4_tmp = $_FILES['them_anhsp4']['tmp_name'];

require_once(__DIR__ . '/../config_data/config.php');

$themsp_sql = "INSERT INTO tbl_sanpham (anhsp, tensp, loaisp, hangsp, soluongsp, giasp, anhsp1, anhsp2, anhsp3, anhsp4, motasp, thongsosp) 
VALUES ('$anhsp', '$tensp', '$loaisp', '$hangsp', '$soluongsp', '$giasp', '$anhsp1', '$anhsp2', '$anhsp3', '$anhsp4', '$motasp', '$thongsosp')";
move_uploaded_file($anhsp_tmp, 'upload/' . $anhsp);
move_uploaded_file($anhsp1_tmp, 'upload/' . $anhsp1);
move_uploaded_file($anhsp2_tmp, 'upload/' . $anhsp2);
move_uploaded_file($anhsp3_tmp, 'upload/' . $anhsp3);
move_uploaded_file($anhsp4_tmp, 'upload/' . $anhsp4);

if (mysqli_query($conn, $themsp_sql)) {
    header('Location: ../../admin.php?sanpham=sanpham');
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
mysqli_close($conn);