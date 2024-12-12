<div class="container-xxl" style="padding: 10px 60px;padding-top: 0px;">
    <?php
    if (isset($_GET['giaybongda'])) {
        $tam = $_GET['giaybongda'];
    } elseif (isset($_GET['thuonghieu'])) {
        $tam = $_GET['thuonghieu'];
    } elseif (isset($_GET['phukien'])) {
        $tam = $_GET['phukien'];
    } elseif (isset($_GET['tintuc'])) {
        $tam = $_GET['tintuc'];
    } elseif (isset($_GET['giohang'])) {
        $tam = $_GET['giohang'];
    } elseif (isset($_GET['timkiem'])) {
        $tam = $_GET['timkiem'];
    } elseif (isset($_GET['khach'])) {
        $tam = $_GET['khach'];
    } else {
        $tam = '';
    }

    if ($tam == 'tatcasanpham') {
        include("giaybongda/tat-ca-san-pham.php");
    } elseif ($tam == 'giaycotunhien') {
        include("giaybongda/giay-co-tu-nhien.php");
    } elseif ($tam == 'giayconhantao') {
        include("giaybongda/giay-co-nhan-tao.php");
    } elseif ($tam == 'giayfutsal') {
        include("giaybongda/giay-futsal.php");
    } elseif ($tam == 'nike') {
        include("thuonghieu/nike.php");
    } elseif ($tam == 'adidas') {
        include("thuonghieu/adidas.php");
    } elseif ($tam == 'puma') {
        include("thuonghieu/puma.php");
    } elseif ($tam == 'quabongda') {
        include("phukien/qua-bong-da.php");
    } elseif ($tam == 'balotuixach') {
        include("phukien/balo-tui-xach.php");
    } elseif ($tam == 'baoveongdong') {
        include("phukien/bao-ve-ong-dong.php");
    } elseif ($tam == 'news') {
        include("tintuc/tin-tuc.php");
    } elseif ($tam == 'giohang') {
        include("giohang/gio-hang.php");
    } elseif ($tam == 'timkiem') {
        include("timkiem/tim-kiem.php");
    } elseif ($tam == 'donmua') {
        include("khach/don-mua.php");
    } elseif ($tam == 'taikhoan') {
        include("khach/tai-khoan.php");
    } else {
        include("main/index.php");
    }
    

    ?>
</div>