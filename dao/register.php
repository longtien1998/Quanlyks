<?php
    include './config/connect.php';

    // xử lý yêu cầu đăng kí khi đẩy form
    $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // LẤY THÔNG TIN TỪ FORM
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        // kiểm tra người dùng đã tồn tại hay chưa
        $check_query = "SELECT *FROM user WHERE tenKhachHAng = '$username'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            $message = ' <h2 class="section-title px-5"><span class="px-2">tài khoản đã đăng kí</span></h2>';
        } else {
            // thêm tài khoản vào cơ sở dữ liệu
            $insert_query = "INSERT INTO user_client (fullname,username,phone, password, email) VALUES ('$fullname', '$username','$phone', '$password', '$email')";
            if ($conn->query($insert_query) == TRUE) {
                $message = '<h2 class="section-title px-5" style="color: green;"><span class="px-2">Đăng ký thành công</span></h2> <br> Quay lại đăng nhập <a href="Login.php"> tại đây</a>';
            } else {
                $message = ' <h2 class="section-title px-5" style="color: red;"><span class="px-2">Đăng ký thất bại</span></h2>';
            }
        }
    }

    // đóng kết nối
    $conn->close();
?>