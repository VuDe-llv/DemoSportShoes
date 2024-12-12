<?php
$conn = mysqli_connect("localhost", "root", "", "web_shopgiay");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectFilter = document.getElementById('select-filter');
        selectFilter.addEventListener('change', function() {
            const selectedOption = selectFilter.value;
            sortProducts(selectedOption);
        });

        function sortProducts(sortOption) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'pages/phukien/qua-bong-da.php?sort=' + sortOption, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Thay thế nội dung của container với dữ liệu mới từ máy chủ
                    const container = document.querySelector('.container-xxl .row');
                    container.innerHTML = xhr.responseText;
                } else {
                    console.error('Lỗi khi thực hiện truy vấn AJAX');
                }
            };
            xhr.send();
        }
    });
</script>


<!-- <div class="container-xxl container-xxl-row"> -->
<!-- Phần code HTML khác ở đầu trang -->

<?php
// Thêm phần xử lý sắp xếp dữ liệu
if (isset($_GET['sort'])) {
    $sortOption = $_GET['sort'];

    switch ($sortOption) {
        case 'Cũ nhất':
            $orderBy = 'ORDER BY id_sanpham ASC';
            break;
        case 'Ký tự A-Z':
            $orderBy = 'ORDER BY tensp ASC';
            break;
        case 'Ký tự Z-A':
            $orderBy = 'ORDER BY tensp DESC';
            break;
        case 'Giá tăng dần':
            $orderBy = 'ORDER BY giasp ASC';
            break;
        case 'Giá giảm dần':
            $orderBy = 'ORDER BY giasp DESC';
            break;
        default:
            // Mặc định sắp xếp theo Mới nhất
            $orderBy = 'ORDER BY id_sanpham DESC';
            break;
    }

    $sql_pro = "SELECT * FROM tbl_sanpham WHERE loaisp IN ('Quả bóng đá') $orderBy";
} else {
    // Mặc định sắp xếp theo Mới nhất
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE loaisp IN ('Quả bóng đá') ORDER BY id_sanpham DESC";
}

// Thực hiện truy vấn SQL
$query_pro = mysqli_query($conn, $sql_pro);

// Kiểm tra và hiển thị dữ liệu
?>


<div class="container-xxl">
    <!-- <div class="col-12"> -->
    <div class="row product-row">
        <?php
        // Kiểm tra và hiển thị dữ liệu
        if ($query_pro) {
            while ($row = mysqli_fetch_assoc($query_pro)) {
        ?>
                <div class="col-md-3 mb-2">
                    <div class="product-item mt-3 d-flex flex-column">
                        <a href="chi-tiet-san-pham.php?id_sanpham=<?php echo $row['id_sanpham']; ?>" class="align-self-center">
                            <img class="card-img-top img-shoe img-fluid" src="admin/sanpham/upload/<?php echo $row['anhsp']; ?>" alt="<?php echo $row['tensp']; ?>">
                            <p class="card-title product-item__title m-2"><?php echo $row['tensp']; ?></p>
                        </a>
                        <p class="card-text product-item__price mt-auto text-end"><?php echo number_format($row['giasp'], 0, ',', '.'); ?> đ</p>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Lỗi truy vấn: " . mysqli_error($conn);
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
        ?>
    </div>
    <!-- </div> -->
</div>
<!-- </div> -->