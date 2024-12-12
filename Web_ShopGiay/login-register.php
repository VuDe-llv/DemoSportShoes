<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/script.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="dangky-dangnhap.php" method="post">
                <h1 style="color: #248BD6;">TẠO TÀI KHOẢN</h1>
                <span>Hoặc sử dụng email để đăng ký</span>
                <input type="text" name="tenkhachhang" placeholder="Họ và Tên" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="matkhau" placeholder="Mật khẩu" required>
                <button type="submit" name="register">Đăng Ký</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="dangky-dangnhap.php" method="post">
                <h1 style="color: #248BD6;">ĐĂNG NHẬP</h1>
                <span>Hoặc sử dụng mật khẩu email của bạn</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="matkhau" placeholder="Mật khẩu" required>
                <button type="submit" name="login">Đăng Nhập</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào mừng trở lại!</h1>
                    <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của WebSite bán giày của chúng tôi!</p>
                    <button class="hidden" id="login">Đăng Nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào mừng bạn!</h1>
                    <p> Đăng ký với thông tin cá nhân của bạn để sử dụng tất cả các tính năng của WebSite bán giày của chúng tôi!</p>
                    <button class="hidden" id="register">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="js/login-register.js"></script>

</html>