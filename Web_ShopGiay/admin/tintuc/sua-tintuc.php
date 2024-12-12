<?php
$tieude1 = isset($_POST['sua_tieude1']) ? $_POST['sua_tieude1'] : '';
$tieude2 = isset($_POST['sua_tieude2']) ? $_POST['sua_tieude2'] : '';
$tieude3 = isset($_POST['sua_tieude3']) ? $_POST['sua_tieude3'] : '';
$noidung1 = isset($_POST['sua_noidung1']) ? htmlspecialchars($_POST['sua_noidung1']) : '';
$noidung2 = isset($_POST['sua_noidung2']) ? htmlspecialchars($_POST['sua_noidung2']) : '';
$noidung3 = isset($_POST['sua_noidung3']) ?  htmlspecialchars($_POST['sua_noidung3']) : '';

$anh1 = $_FILES['sua_anh1']['name'];
$anh1_tmp = $_FILES['sua_anh1']['tmp_name'];

$anh2 = $_FILES['sua_anh2']['name'];
$anh2_tmp = $_FILES['sua_anh2']['tmp_name'];

$anh3 = $_FILES['sua_anh3']['name'];
$anh3_tmp = $_FILES['sua_anh3']['tmp_name'];

$newsId = $_POST['nid'];
require_once(__DIR__ . '/../config_data/config.php');

$dulieucu_sql = "SELECT * FROM tbl_tintuc WHERE id_tintuc = $newsId";
$result = mysqli_query($conn, $dulieucu_sql);

if ($result) {
    $dulieucu = mysqli_fetch_assoc($result);

    $anh1_moi = !empty($anh1) ? time() . ' ' . $anh1 : $dulieucu['anh1'];
    $anh2_moi = !empty($anh2) ? time() . ' ' . $anh2 : $dulieucu['anh2'];
    $anh3_moi = !empty($anh3) ? time() . ' ' . $anh3 : $dulieucu['anh3'];

    move_uploaded_file($anh1_tmp, 'upload/' . $anh1_moi);
    move_uploaded_file($anh2_tmp, 'upload/' . $anh2_moi);
    move_uploaded_file($anh3_tmp, 'upload/' . $anh3_moi);

    $updatesp_sql = "UPDATE tbl_tintuc SET anh1='$anh1_moi', tieude1='$tieude1', noidung1='$noidung1', anh2='$anh2_moi', tieude2='$tieude2', noidung2='$noidung2', anh3='$anh3_moi', tieude3='$tieude3', noidung3='$noidung3' WHERE id_tintuc = $newsId";

    mysqli_query($conn, $updatesp_sql);
    mysqli_close($conn);
    header('Location: ../../admin.php?tintuc=tintuc');
} else {
    echo "Error: " . mysqli_error($conn);
}
