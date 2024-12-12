<?php
    session_start();
if (isset($_POST['dangky'])){
    $tenkhachhang=$_POST['hovaten'];
    $matkhau=md5($_POST['matkhau']);
    $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,matkhau) VALUE ('".$tenkhachhang."','".$matkhau."')");
    if ($sql_dangky){
        echo '< style="color:green">Bạn đã đăng ký thành công</p>';
        $_SESSION['dangky'] = $tenkhachhang;
        header('Location:index.php?quanly=giohang');
        // <td><a href="index.php?quanly=dangnhap">Đăng nhập nếu bạn có tài khoản</a></td>
    }
}
?>