<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
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
    $newsId = $_GET['id_tintuc'];
    $sql_pro = "SELECT * FROM tbl_tintuc WHERE id_tintuc = $newsId";
    $query_pro = mysqli_query($conn, $sql_pro);

    if ($query_pro && $row = mysqli_fetch_assoc($query_pro)) {
    ?>
        <div class="container" style="padding-top: 90px;">
            <div class="row" style="padding-top: 10px">
                <div class="tieude" style="height: 40px; text-align: center; background-color: white; border-radius: 2px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); margin-bottom: 10px;">
                    <h5 style="padding-top: 10px;"><?php echo $row['tieude1']; ?></h5>
                </div>
                <div class="col-3" style="padding-left: 30px; text-align: end;">
                    <img src="admin/tintuc/upload/<?php echo $row['anh1']; ?>" alt="" style="width: 180px; height: 220px; object-fit: cover;">
                </div>
                <div class="col-9" style="padding-right: 30px;">
                    <span><?php echo $row['noidung1']; ?></span>
                </div>
                <div class="col-12" style="padding: 20px 60px 0;">
                    <h5 style="margin-bottom: 0;"><?php echo $row['tieude2']; ?></h5>
                </div>
                <div class="col-12" style="text-align: center;">
                    <img src="admin/tintuc/upload/<?php echo $row['anh2']; ?>" alt="" style="width: 800px; height: 450px; object-fit: cover;">
                </div>
                <div class="col-12" style="padding: 0 60px;">
                    <span><?php echo $row['noidung2']; ?></span>
                </div>
                <div class="col-12" style="padding: 10px 60px 0;">
                    <h5><?php echo $row['tieude3']; ?></h5>
                </div>
                <div class="col-8" style="padding-left: 60px;">
                    <span><?php echo $row['noidung3']; ?></span>
                </div>
                <div class="col-4" style="padding-right: 30px; text-align: start;">
                    <img src="admin/tintuc/upload/<?php echo $row['anh3']; ?>" alt="" style="width: 300px; height: 230px; object-fit: cover;">
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "Không tìm thấy trang tin tức.";
    }
    ?>

    <?php
    include("pages/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>