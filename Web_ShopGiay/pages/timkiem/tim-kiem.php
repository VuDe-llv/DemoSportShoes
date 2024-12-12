<div class="container-xxl">
    <!-- <div class="col-12"> -->
        <div class="row product-row" id="product-container">

            <?php
            // include("admin/config_data/config.php");
            $conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

            // Kiểm tra kết nối
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }


            if (isset($_POST['tukhoa'])) {
                $tukhoa = $_POST['tukhoa'];
            } else {
                $tukhoa = '';
            }

            $sql_pro = "SELECT * FROM tbl_sanpham WHERE tensp LIKE '%" . $tukhoa . "%'";
            $query_pro = mysqli_query($conn, $sql_pro);
            ?>

        
                <?php
                while ($row = mysqli_fetch_assoc($query_pro)) {
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
                }

                // Đóng kết nối CSDL
                mysqli_close($conn);
                ?>
        </div>
    <!-- </div> -->
</div>