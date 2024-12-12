<div class="container-xxl" style="padding: 10px 70px;padding-bottom: 0px;padding-top: 100px;">
    <!-- <div class="col-12"> -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll" style="background-color: white;border-radius: 2px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll d-flex" style="--bs-scroll-height: 100px;">
                <li class="all-product-list-title">
                    <?php
                    switch ($tam) {
                        case 'tatcasanpham':
                            echo 'TẤT CẢ SẢN PHẨM';
                            break;
                        case 'giaycotunhien':
                            echo 'GIÀY CỎ TỰ NHIÊN';
                            break;
                        case 'giayconhantao':
                            echo 'GIÀY CỎ NHÂN TẠO';
                            break;
                        case 'giayfutsal':
                            echo 'GIÀY FUTSAL';
                            break;
                        case 'nike':
                            echo 'NIKE';
                            break;
                        case 'adidas':
                            echo 'ADIDAS';
                            break;
                        case 'puma':
                            echo 'PUMA';
                            break;
                        case 'quabongda':
                            echo 'QUẢ BÓNG ĐÁ';
                            break;
                        case 'balotuixach':
                            echo 'BALO TÚI XÁCH';
                            break;
                        case 'baoveongdong':
                            echo 'BẢO VỆ ỐNG ĐỒNG';
                            break;
                        case 'news':
                            echo 'TIN TỨC';
                            break;
                        default:
                            echo 'TẤT CẢ SẢN PHẨM';
                            break;
                    }
                    ?>
                </li>

            </ul>
            <li class="all-product-list-title">
                Sắp xếp theo:
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <select class="form-control select-filter" id="select-filter" style="font-size: 15px;">
                        <option>Mới nhất</option>
                        <option>Cũ nhất</option>
                        <option>Ký tự A-Z</option>
                        <option>Ký tự Z-A</option>
                        <option>Giá tăng dần</option>
                        <option>Giá giảm dần</option>
                    </select>
                </div>
            </li>
        </div>
    </nav>
    <!-- </div> -->
</div>