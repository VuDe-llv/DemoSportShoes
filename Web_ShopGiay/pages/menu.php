<nav class="navbar navbar-bottom navbar-expand-sm navbar-dark bg-light fixed-top" style="margin-top: 27px;z-index: 50;">
    <div class="container-xxl container-xxl-bottom">
        <a class="navbar-brand-logo" href="javascript:void(0)">PV Sport</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse collapse-list-menu navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Giày bóng đá
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a href="index.php?giaybongda=tatcasanpham" class="dropdown-item">TẤT CẢ SẢN PHẨM</a>
                        </li>
                        <li>
                            <a href="index.php?giaybongda=giaycotunhien" class="dropdown-item">GIÀY CỎ TỰ NHIÊN</a>
                        </li>
                        <li>
                            <a href="index.php?giaybongda=giayconhantao" class="dropdown-item">GIÀY CỎ NHÂN TẠO</a>
                        </li>
                        <li>
                            <a href="index.php?giaybongda=giayfutsal" class="dropdown-item">GIÀY FUTSAL</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thương hiệu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a href="index.php?thuonghieu=nike" class="dropdown-item">NIKE</a>
                        </li>
                        <li>
                            <a href="index.php?thuonghieu=adidas" class="dropdown-item">ADIDAS</a>
                        </li>
                        <li>
                            <a href="index.php?thuonghieu=puma" class="dropdown-item">PUMA</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Phụ kiện
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a href="index.php?phukien=quabongda" class="dropdown-item">QUẢ BÓNG ĐÁ</a>
                        </li>
                        <li>
                            <a href="index.php?phukien=balotuixach" class="dropdown-item">BALO TÚI XÁCH</a>
                        </li>
                        <li>
                            <a href="index.php?phukien=baoveongdong" class="dropdown-item">BẢO VỆ ỐNG ĐỒNG</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="index.php?tintuc=news" class="nav-link active" aria-current="page">Tin Tức</a>
                </li>
            </ul>

            <form action="index.php?timkiem=timkiem" method="POST">
                <div class="form-group" style="display: flex;">
                    <input style="border-radius: 20px;" class="form-control me-3 bg-light" type="search" placeholder="Tìm kiếm..." aria-label="Tìm kiếm" name="tukhoa" require>
                    <i class="fa-solid fa-magnifying-glass" style="padding-top: 12px; margin-left: -45px; color: #999;"></i>
                </div>
            </form>


            <ul class="header-thongbao-giohang">
                <li class="header-thongbao-link">
                    <a class="navbar-brand-thongbao">
                        <i class="icon-thongbao fa-solid fa-bell"></i>
                    </a>
                    <div class="popup popup-thongbao">
                        <header class="popup-thongbao-header">
                            <h3>Thông báo mới nhận</h3>
                        </header>
                        <ul class="popup-thongbao-list">
                            <li class="popup-thongbao-item popup-thongbao-item--viewed">
                                <a href="#" class="popup-thongbao-link">
                                    <img src="https://img.freepik.com/premium-vector/comic-speech-bubble-with-expression-text-hello-vector-bright-dynamic-cartoon-illustration-retro-pop-art-style-isolated-blue-background-vector-illustration_662353-1004.jpg?w=2000" alt="" class="popup-thongbao-img">
                                    <div class="popup-thongbao-info">
                                        <span class="popup-thongbao-name">Chào mừng bạn đến với PV Sport !
                                        </span>
                                        <span class="popup-thongbao-descriotion">Chúng tôi tự hào mang đến những sản phẩm giày thời trang và chất lượng hàng đầu.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="popup-thongbao-item">
                                <a href="#" class="popup-thongbao-link">
                                    <img src="https://img.freepik.com/premium-vector/geometric-shape-sale-banner_13125-157.jpg" alt="" class="popup-thongbao-img">
                                    <div class="popup-thongbao-info">
                                        <span class="popup-thongbao-name">Ưu đãi hấp dẫn! Giảm giá lên đến 50% cho một số mẫu giày đặc biệt trong tuần này.</span>
                                        <span class="popup-thongbao-descriotion">Nhanh tay lên nào, thời của bạn tới rồi ! Sỡ hữu ngay đôi giày mà bạn yêu thích nào !</span>
                                    </div>
                                </a>
                            </li>
                            <li class="popup-thongbao-item">
                                <a href="#" class="popup-thongbao-link">
                                    <img src="https://thoitrangngaynay.com/upload/images/khuyen-mai-doi-bep-cu-lay-bep-moi.png" alt="" class="popup-thongbao-img">
                                    <div class="popup-thongbao-info">
                                        <span class="popup-thongbao-name">HOT! HOT ! Giày mới về !</span>
                                        <span class="popup-thongbao-descriotion">Khám phá bộ sưu tập mới nhất với các mẫu giày thời trang sáng tạo và độc đáo nào !</span>
                                    </div>
                                </a>
                            </li> -->
                        </ul>
                        <footer class="popup-thongbao-footer">
                            <a href="#" class="popup-thongbao-footer-btn">Xem tất cả</a>
                        </footer>
                    </div>
                </li>
                <li class="header-giohang-link">
                    <a href="index.php?giohang=giohang" class="navbar-brand-giohang">
                        <i class="icon-giohang fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>