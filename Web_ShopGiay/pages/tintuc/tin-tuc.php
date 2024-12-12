<div class="container-xxl" style="padding-top: 98px;">
    <nav class="navbar navbar-expand-lg navbar-light" style="height: 50px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll" style="background-color: white;border-radius: 2px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll d-flex" style="--bs-scroll-height: 100px;">
                <li class="all-product-list-title" style="padding: 8px 0;">
                    TIN TỨC
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-xxl">
        <div class="row m-0">
            <?php
            // Thực hiện truy vấn SQL
            $sql_pro = "SELECT * FROM tbl_tintuc ORDER BY id_tintuc DESC";
            $query_pro = mysqli_query($conn, $sql_pro);

            // Kiểm tra và hiển thị dữ liệu
            if ($query_pro) {
                while ($row = mysqli_fetch_assoc($query_pro)) {
            ?>
                    <div class="col-3 mt-0 p-2">
                        <a href="chi-tiet-tin-tuc.php?id_tintuc=<?php echo $row['id_tintuc']; ?>">
                            <div class="image">
                                <img src="admin/tintuc/upload/<?php echo $row['anh1']; ?>" alt="" style="width: 290px; height: 290px; object-fit: cover;">
                                <div class="overlay">
                                    <h2><?php echo $row['tieude1']; ?></h2>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "Lỗi truy vấn: " . mysqli_error($conn);
            }

            // Đóng kết nối sau khi sử dụng
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>