<!DOCTYPE html>
<html lang="en">

<head>
    <title>PV Sport</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>
<?php
    include("admin/config_data/config.php");
    include("pages/header.php");
    include("pages/menu.php");

    $tam = isset($_GET['giaybongda']) ? $_GET['giaybongda'] :
           (isset($_GET['thuonghieu']) ? $_GET['thuonghieu'] :
           (isset($_GET['phukien']) ? $_GET['phukien'] :
           (isset($_GET['tintuc']) ? $_GET['tintuc'] :
           (isset($_GET['giohang']) ? $_GET['giohang'] :
           (isset($_GET['timkiem']) ? $_GET['timkiem'] : '')))));

    $includeSorting = false;

    if (in_array($tam, ['tatcasanpham', 'giaycotunhien', 'giayconhantao', 'giayfutsal', 'nike', 'adidas', 'puma', 'quabongda', 'balotuixach', 'baoveongdong'])) {
        include("pages/sapxep.php");
        $includeSorting = true;
    }

    include("pages/main.php");
    include("pages/footer.php");
    ?>

    <script src="js/script.js"></script>

    <?php
    echo "<script>var includeSorting = " . json_encode($includeSorting) . ";</script>";
    ?>

</body>

</html>