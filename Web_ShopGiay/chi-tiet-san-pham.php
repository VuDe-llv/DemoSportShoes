<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("admin/config_data/config.php");

    if (isset($_GET['id_sanpham'])) {
        $productId = $_GET['id_sanpham'];
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $productId";
        $query_pro = mysqli_query($conn, $sql_pro);

        if ($query_pro && $row = mysqli_fetch_assoc($query_pro)) {
    ?>
            <title><?php echo $row['tensp']; ?></title>
    <?php
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    } else {
        echo "Không có ID sản phẩm được chọn.";
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/chi-tiet.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>

    <?php
    include("admin/config_data/config.php");
    include("pages/header.php");
    include("pages/menu.php");
    ?>
    <?php
    if (isset($_GET['id_sanpham'])) {
        $productId = $_GET['id_sanpham'];
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $productId";
        $query_pro = mysqli_query($conn, $sql_pro);

        if ($query_pro && $row = mysqli_fetch_assoc($query_pro)) {
    ?>
            <div class="container-xxl pt-5" style="z-index: 1;">
                <div class="flex-box">
                    <div class="left">
                        <div class="big-img">
                            <img src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>">
                        </div>
                        <div class="images">
                            <div class="small-img">
                                <img src="admin/sanpham/upload/<?php echo $row['anhsp1']; ?>" alt="Ảnh 1" onclick="showImg(this.src)">
                            </div>
                            <div class="small-img">
                                <img src="admin/sanpham/upload/<?php echo $row['anhsp2']; ?>" alt="Ảnh 2" onclick="showImg(this.src)">
                            </div>
                            <div class="small-img">
                                <img src="admin/sanpham/upload/<?php echo $row['anhsp3']; ?>" alt="Ảnh 3" onclick="showImg(this.src)">
                            </div>
                            <div class="small-img">
                                <img src="admin/sanpham/upload/<?php echo $row['anhsp4']; ?>" alt="Ảnh 4" onclick="showImg(this.src)">
                            </div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="pname"><?php echo $row['tensp']; ?></div>
                        <div class="nhacungcap">
                            <p>Nhà cung cấp : </p>
                            <p class="ten-nhacc"><?php echo $row['hangsp']; ?></p>
                        </div>
                        <div class="ratings">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="price"><?php echo number_format($row['giasp'], 0, ',', '.'); ?> đ</div>

                        <form action="them-gio-hang.php?id_sanpham=<?php echo $productId; ?>" method="post">
                            <div class="size">
                                <p class="p-size" style="padding-right: 10px;width: 55px;">Size :</p>
                                <select class="form-select" id="sizesp" name="sizesp" style="width: 80px;">
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                </select>
                            </div>
                            <div class="quantity">
                                <p style="margin-top: 5px;">Số lượng :</p>
                                <input class="form-control" type="number" min="1" max="10" value="1" name="soluong" style="width: 80px;">
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="cart-btn">Thêm vào giỏ hàng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-sm navbar-dark navbar-chitiet">
                <div class="container container-chitiet">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#section1" style="font-weight: 500;">Mô tả sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section2" style="font-weight: 500;">Thông số kỹ thuật</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="section1" class="container" style="padding:20px 100px;">
                <h4 style="padding-bottom:10px;">MÔ TẢ SẢN PHẨM</h4>
                <p class="center-text" style="text-align: justify;">
                    <?php echo nl2br($row['motasp']); ?>
                </p>
                <div class="container-xxl container-xxl-row">
                    <div class="row row-column-4-ct">
                        <div class="col-sm-3 col-sm-3-ct">
                            <div class="product-item-sphot mx-3">
                                <img class="dt-width-100 ls-is-cached lazyloaded" width="200" height="200" src="admin/sanpham/upload/<?php echo $row['anhsp1']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-3-ct">
                            <div class="product-item-sphot mx-3">
                                <img class="dt-width-100 ls-is-cached lazyloaded" width="200" height="200" src="admin/sanpham/upload/<?php echo $row['anhsp2']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-3-ct">
                            <div class="product-item-sphot mx-3">
                                <img class="dt-width-100 ls-is-cached lazyloaded" width="200" height="200" src="admin/sanpham/upload/<?php echo $row['anhsp3']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-3-ct">
                            <div class="product-item-sphot mx-3">
                                <img class="dt-width-100 ls-is-cached lazyloaded" width="200" height="200" src="admin/sanpham/upload/<?php echo $row['anhsp4']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="section2" class="container" style="padding:20px 100px;">
                <h4 style="padding-bottom:10px;">THÔNG SỐ KỸ THUẬT</h4>
                <p><?php echo nl2br($row['thongsosp']); ?></p>
            </div>

    <?php
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    } else {
        echo "Không có ID sản phẩm được chọn.";
    }
    ?>

    <?php
    include("pages/footer.php");
    ?>

    <script>
        let bigImg = document.querySelector('.big-img img');

        function showImg(pic) {
            bigImg.src = pic;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>