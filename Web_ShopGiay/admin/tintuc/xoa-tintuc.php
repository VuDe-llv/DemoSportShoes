<?php
$newsId = $_GET['nid'];
require_once(__DIR__ . '/../config_data/config.php');

$anhtintuc_sql = "SELECT anh1, anh2, anh3 FROM tbl_tintuc WHERE id_tintuc = $newsId";
$result = mysqli_query($conn, $anhtintuc_sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $anh1 = $row['anh1'];
    $anh2 = $row['anh2'];
    $anh3 = $row['anh3'];

    $anh1_tmp = __DIR__ . '/upload/' . $anh1;
    $anh2_tmp = __DIR__ . '/upload/' . $anh2;
    $anh3_tmp = __DIR__ . '/upload/' . $anh3;

    if (file_exists($anh1_tmp)) {
        unlink($anh1_tmp);
    }
    if (file_exists($anh2_tmp)) {
        unlink($anh2_tmp);
    }
    if (file_exists($anh3_tmp)) {
        unlink($anh3_tmp);
    }

    $xoatintuc_sql = "DELETE FROM tbl_tintuc WHERE id_tintuc = $newsId";
    mysqli_query($conn, $xoatintuc_sql);

    header('Location: ../../admin.php?tintuc=tintuc');
} else {
    echo "Lỗi: Không tìm thấy thông tin tin tức";
}
mysqli_close($conn);
