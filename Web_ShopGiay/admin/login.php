<?php
// session_start();
// include("config_data/config.php");
if (isset($_POST["username"])) {
    $taikhoan = $_POST["username"];
    $matkhau = md5($_POST["password"]);
    $sql = "SELECT*FROM tbl_admin WHERE username = '" . $taikhoan . "' AND password = '" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        header("Location:index.php?quanly=giohang");
    } else {
        echo '<p style="color:red">Tên đăng nhập hoặc mật khẩu sai, vui lòng nhập lại.</p>';
    }
}
?>

<script type="text/javascript" src="<https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
