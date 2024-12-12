<div id="demo" class="carousel slide" data-bs-ride="carousel" style="padding-top: 90px;margin-left: -60px;margin-right: -60px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/image1.jpg" alt="Image 1" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img src="images/image2.jpg" alt="Image 2" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img src="images/image3.jpg" alt="Image 3" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img src="images/image4.jpg" alt="Image 4" class="d-block" style="width:100%">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container-xxl">
    <div class="index-title text-center" style="padding: 10px 0;">SẢN PHẨM HOT</div>
    <div class="row">
        <?php
        $sql_pro = "SELECT * FROM tbl_sanpham";
        $query_pro = mysqli_query($conn, $sql_pro);

        $count = 0;
        if ($query_pro) {
            while ($row = mysqli_fetch_assoc($query_pro)) {
                if ($count < 4) {
        ?>
                    <div class="col-md-3 mb-2">
                        <div class="product-item mt-3 d-flex flex-column">
                            <a href="chi-tiet-san-pham.php?id_sanpham=<?php echo $row['id_sanpham']; ?>" class="align-self-end">
                                <img class="card-img-top img-shoe img-fluid" src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>">
                                <p class="card-title product-item__title m-2"><?php echo $row['tensp']; ?></p>
                            </a>
                            <p class="card-text product-item__price mt-auto text-end"><?php echo number_format($row['giasp'], 0, ',', '.'); ?> đ</p>
                        </div>
                    </div>
        <?php
                    $count++;
                } else {
                    break;
                }
            }
        } else {
            echo "Lỗi truy vấn: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
    </div>
</div>

<div class="container-xxl p-0">
    <div class="index-title text-center" style="padding-bottom: 30px;padding-top: 10px;">CÓ PHẢI BẠN ĐANG TÌM ?</div>
    <div class="row">
        <div class="col-3">
            <div class="product-item-sphot mx-3">
                <a href="index.php?giaybongda=giayconhantao">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="313" height="313" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_1.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_1.jpg?v=474" alt="GIÀY CỎ NHÂN TẠO (ĐẾ TF)">
                    <p class="product-TC-item__title">GIÀY CỎ NHÂN TẠO (ĐẾ TF)</p>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="product-item-sphot mx-3">
                <a href="index.php?giaybongda=giaycotunhien">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="313" height="313" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_2.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_2.jpg?v=474" alt="GIÀY CỎ TỰ NHIÊN (ĐẾ FG, AG, SG)">
                    <p class="product-TC-item__title">GIÀY CỎ TỰ NHIÊN(ĐẾ FG, AG, SG)</p>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="product-item-sphot mx-3">
                <a href="index.php?giaybongda=giayfutsal">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="313" height="313" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_3.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_3.jpg?v=474" alt="GIÀY FUTSAL (ĐẾ IC)">
                    <p class="product-TC-item__title">GIÀY FUTSAL (ĐẾ IC)</p>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="product-item-sphot mx-3">
                <a href="#">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="313" height="313" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_4.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_4.jpg?v=474" alt="GIÀY ĐÁ BÓNG GIÁ RẺ">
                    <p class="product-TC-item__title">GIÀY BÓNG ĐÁ GIÁ RẺ</p>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" style="padding-top: 20px;">
            <div class="product-item-sphot mx-3">
                <a href="index.php?phukien=quabongda">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="423" height="148" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_7.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_7.jpg?v=474" alt="QUẢ BÓNG ĐÁ">
                    <p class="product-TC-item__title">QUẢ BÓNG ĐÁ</p>
                </a>
            </div>
        </div>
        <div class="col-md-4" style="padding-top: 20px;">
            <div class="product-item-sphot mx-3">
                <a href="index.php?phukien=balotuixach">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="423" height="148" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_6.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_6.jpg?v=474" alt="ÁO BÓNG ĐÁ CHÍNH HÃNG">
                    <p class="product-TC-item__title">BALO TÚI XÁCH</p>
                </a>
            </div>
        </div>
        <div class="col-md-4" style="padding-top: 20px;">
            <div class="product-item-sphot mx-3">
                <a href="index.php?phukien=baoveongdong">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="423" height="148" src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_9.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/index_banner_9.jpg?v=474" alt="BẢO VỆ ỐNG ĐỒNG">
                    <p class="product-TC-item__title">BẢO VỆ ỐNG ĐỒNG</p>
                </a>
            </div>
        </div>
    </div>

    <div class="index-title text-center" style="padding-bottom: 30px;">THƯƠNG HIỆU</div>
    <div class="row">
        <div class="col-md-4">
            <div class="product-item-sphot mx-3">
                <a href="index.php?thuonghieu=nike">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="423" height="148" src="//theme.hstatic.net/1000061481/1001035882/14/brand_banner_1.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/brand_banner_1.jpg?v=474" alt="GIÀY ĐÁ BANH NIKE">
                    <p class="product-TC-item__title">GIÀY ĐÁ BANH NIKE</p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-item-sphot mx-3">
                <a href="index.php?thuonghieu=adidas">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="423" height="148" src="//theme.hstatic.net/1000061481/1001035882/14/brand_banner_2.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/brand_banner_2.jpg?v=474" alt="GIÀY ĐÁ BANH ADIDAS">
                    <p class="product-TC-item__title">GIÀY ĐÁ BANH ADIDAS</p>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-item-sphot mx-3">
                <a href="index.php?thuonghieu=puma">
                    <img class="dt-width-100 ls-is-cached lazyloaded" width="423" height="148" src="//theme.hstatic.net/1000061481/1001035882/14/brand_banner_3.jpg?v=474" data-src="//theme.hstatic.net/1000061481/1001035882/14/brand_banner_3.jpg?v=474" alt="GIÀY ĐÁ BANH PUMA">
                    <p class="product-TC-item__title">GIÀY ĐÁ BANH PUMA</p>
                </a>
            </div>
        </div>
    </div>
</div>