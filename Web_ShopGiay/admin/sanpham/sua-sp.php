<?php
require_once(__DIR__ . '/../config_data/config.php');

$tensp = isset($_POST['sua_tensp']) ? $_POST['sua_tensp'] : '';
$loaisp = isset($_POST['sua_loaisp']) ? $_POST['sua_loaisp'] : '';
$hangsp = isset($_POST['sua_hangsp']) ? $_POST['sua_hangsp'] : '';
$soluongsp = isset($_POST['sua_soluongsp']) ? $_POST['sua_soluongsp'] : '';
$giasp = isset($_POST['sua_giasp']) ? $_POST['sua_giasp'] : '';
$motasp = isset($_POST['sua_motasp']) ? htmlspecialchars($_POST['sua_motasp']) : '';
$thongsosp = isset($_POST['sua_thongsosp']) ? htmlspecialchars($_POST['sua_thongsosp']) : '';

$anhsp = $_FILES['sua_anhsp']['name'];
$anhsp_tmp = $_FILES['sua_anhsp']['tmp_name'];

$anhsp1 = $_FILES['sua_anhsp1']['name'];
$anhsp1_tmp = $_FILES['sua_anhsp1']['tmp_name'];

$anhsp2 = $_FILES['sua_anhsp2']['name'];
$anhsp2_tmp = $_FILES['sua_anhsp2']['tmp_name'];

$anhsp3 = $_FILES['sua_anhsp3']['name'];
$anhsp3_tmp = $_FILES['sua_anhsp3']['tmp_name'];

$anhsp4 = $_FILES['sua_anhsp4']['name'];
$anhsp4_tmp = $_FILES['sua_anhsp4']['tmp_name'];

$productId = $_POST['spid'];

$dulieucu_sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $productId";
$result = mysqli_query($conn, $dulieucu_sql);

if ($result) {
    $dulieucu = mysqli_fetch_assoc($result);

    $anhsp_moi = !empty($anhsp) ? time() . ' ' . $anhsp : $dulieucu['anhsp'];
    $anhsp1_moi = !empty($anhsp1) ? time() . ' ' . $anhsp1 : $dulieucu['anhsp1'];
    $anhsp2_moi = !empty($anhsp2) ? time() . ' ' . $anhsp2 : $dulieucu['anhsp2'];
    $anhsp3_moi = !empty($anhsp3) ? time() . ' ' . $anhsp3 : $dulieucu['anhsp3'];
    $anhsp4_moi = !empty($anhsp4) ? time() . ' ' . $anhsp4 : $dulieucu['anhsp4'];

    move_uploaded_file($anhsp_tmp, 'upload/' . $anhsp_moi);
    move_uploaded_file($anhsp1_tmp, 'upload/' . $anhsp1_moi);
    move_uploaded_file($anhsp2_tmp, 'upload/' . $anhsp2_moi);
    move_uploaded_file($anhsp3_tmp, 'upload/' . $anhsp3_moi);
    move_uploaded_file($anhsp4_tmp, 'upload/' . $anhsp4_moi);

    $updatesp_sql = "UPDATE tbl_sanpham SET anhsp='$anhsp_moi', anhsp1='$anhsp1_moi', anhsp2='$anhsp2_moi', anhsp3='$anhsp3_moi', anhsp4='$anhsp4_moi', tensp='$tensp', loaisp='$loaisp', hangsp='$hangsp', soluongsp='$soluongsp', giasp='$giasp', motasp='$motasp', thongsosp='$thongsosp' WHERE id_sanpham= $productId";

    mysqli_query($conn, $updatesp_sql);
    mysqli_close($conn);
    header('Location: ../../admin.php?sanpham=sanpham');
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
