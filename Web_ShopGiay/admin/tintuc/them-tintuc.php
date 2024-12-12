<?php
$tieude1 = trim($_POST['them_tieude1']);
$noidung1 =htmlspecialchars(trim($_POST['them_noidung1'])) ;
$tieude2 = trim($_POST['them_tieude2']);
$noidung2 = htmlspecialchars(trim($_POST['them_noidung2']));
$tieude3 = trim($_POST['them_tieude3']);
$noidung3 =htmlspecialchars(trim($_POST['them_noidung3']));

$anh1 = $_FILES['them_anh1']['name'];
$anh1 = time() . ' ' . $anh1;
$anh1_tmp = $_FILES['them_anh1']['tmp_name'];

$anh2 = $_FILES['them_anh2']['name'];
$anh2 = time() . ' ' . $anh2;
$anh2_tmp = $_FILES['them_anh2']['tmp_name'];

$anh3 = $_FILES['them_anh3']['name'];
$anh3 = time() . ' ' . $anh3;
$anh3_tmp = $_FILES['them_anh3']['tmp_name'];

require_once(__DIR__ . '/../config_data/config.php');

$themtintuc_sql = "INSERT INTO tbl_tintuc (anh1, tieude1, noidung1, anh2, tieude2, noidung2, anh3, tieude3, noidung3) VALUES ('$anh1', '$tieude1', '$noidung1', '$anh2', '$tieude2', '$noidung2', '$anh3', '$tieude3', '$noidung3')";
move_uploaded_file($anh1_tmp, 'upload/' . $anh1);
move_uploaded_file($anh2_tmp, 'upload/' . $anh2);
move_uploaded_file($anh3_tmp, 'upload/' . $anh3);

if (mysqli_query($conn, $themtintuc_sql)) {
    header('Location: ../../admin.php?tintuc=tintuc');
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
mysqli_close($conn);