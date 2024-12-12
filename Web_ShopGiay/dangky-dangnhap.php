<?php
session_start();

require_once(__DIR__ . '/admin/config_data/config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        $tenkhachhang = $_POST["tenkhachhang"];
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $matkhau = $_POST["matkhau"];


        // Kiểm tra mật khẩu
        if (strlen($matkhau) < 8 || strlen($matkhau) > 12) {
            echo '<script>alert("Mật khẩu phải có độ dài từ 8 đến 12 ký tự!"); window.location.href = "login-register.php";</script>';
            exit();
        }

        $matkhau = password_hash(mysqli_real_escape_string($conn, $matkhau), PASSWORD_DEFAULT);

        // Bên trong khối đăng ký
        $sql_insert_taikhoan = "INSERT INTO tbl_taikhoan (tenkhachhang, email, matkhau, role) VALUES ('$tenkhachhang', '$email', '$matkhau', 'user')";

        if ($conn->query($sql_insert_taikhoan) === TRUE) {
            $id_taikhoan = $conn->insert_id;

            $sql_insert_khachhang = "INSERT INTO tbl_khachhang (id_taikhoan, tenkhachhang, email) VALUES ($id_taikhoan, '$tenkhachhang', '$email')";

            if ($conn->query($sql_insert_khachhang) === TRUE) {
                $_SESSION['id_taikhoan'] = $id_taikhoan;
                $_SESSION['tenkhachhang'] = $tenkhachhang;
                $_SESSION['email'] = $email;

                echo '<script>alert("Đăng ký thành công!"); window.location.href = "login-register.php";</script>';
            } else {
                $sql_delete_taikhoan = "DELETE FROM tbl_taikhoan WHERE id_taikhoan = $id_taikhoan";
                $conn->query($sql_delete_taikhoan);
                echo '<script>alert("Lỗi khi thêm vào tbl_khachhang: ' . $conn->error . '"); window.location.href = "login-register.php";</script>';
            }
        } else {
            echo '<script>alert("Lỗi khi thêm vào tbl_taikhoan: ' . $conn->error . '"); window.location.href = "login-register.php";</script>';
        }
    } elseif (isset($_POST["login"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $matkhau = $_POST["matkhau"];

        $sql = "SELECT * FROM tbl_taikhoan WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($matkhau, $row["matkhau"])) {
                $_SESSION['id_taikhoan'] = $row['id_taikhoan'];
                $_SESSION['tenkhachhang'] = $row['tenkhachhang'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role']; // Thêm vai trò vào phiên làm việc

                // Chuyển hướng người dùng tùy thuộc vào vai trò
                if ($_SESSION['role'] === 'admin') {
                    echo '<script>window.location.href = "admin.php";</script>';
                    exit();
                } else {
                    echo '<script>window.location.href = "index.php";</script>';
                    exit();
                }
            } else {
                echo '<script>alert("Sai mật khẩu!"); window.location.href = "login-register.php";</script>';
            }
        } else {
            echo '<script>alert("Người dùng không tồn tại!"); window.location.href = "login-register.php";</script>';
        }
    }
}

$conn->close();
