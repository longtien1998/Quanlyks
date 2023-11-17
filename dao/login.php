<?php 

include '../config/connect.php';
include '../thuvien/user.php';?>
<?php

session_start();
$message = "";

// Kiểm tra nút Đăng nhập đã được nhấn hay chưa
if (isset($_POST["dangnhap"])) {

    // Lấy thông tin người dùng từ form đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo $password;
    $result=userkhachhang($username);
    // Kiểm tra kết quả trả về
    if (mysqli_num_rows($result) > 0) {

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $row = mysqli_fetch_assoc($result);
        // Kiểm tra mật khẩu hợp lệ
        if ($row['matKhau'] === $password) {
            // Đăng nhập thành công và set user name vào biến session
            $_SESSION["user"] = "$username";
            header("Location: /index.php?action=home");
        } else {
            // sai mk
            
            $message = ' <h2 class="section-title px-5"><span class="px-2">Sai mật khẩu. Vui lòng thử lại</span></h2>';
        }
    } else {
        // Kiểm tra kết quả trả về
        if (usernhanvien($username) > 0) {

            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $row = mysqli_fetch_assoc($result);
            // Kiểm tra mật khẩu hợp lệ
            if ($row['password'] === $password) {
                // Đăng nhập thành công và set user name vào biến session
                $_SESSION["user"] = "$username";
                header("Location: ../index.php?action=index&controller=users");
            } else {
                // sai mk
                
                $message = ' <h2 class="section-title px-5" style="color: red;"><span class="px-2">Sai mật khẩu. Vui lòng thử lại</span></h2>';
            }
        } else {

            // Người dùng không tồn tại
            
            $message = ' <h2 class="section-title px-5" style="color: red;"><span class="px-2">Người dùng không tồn tại!</span></h2>';
        }
    }
}


// Đóng kết nối

mysqli_close($conn);

?>
<?php
// khởi tạo biên session

// session_start();
// kiểm tra xem sessionuser có tồn tại không ?
$user = '';
if (isset($_SESSION["user"])) {
    $query = "SELECT * FROM user WHERE tenKhachhHang='$username' ";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả trả về
    if (mysqli_num_rows($result) > 0) {

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user = '<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Welcome Admin' . $_SESSION["user"] . '<br> <a href="logout.php"  tite="Logout">Logout.</a> </div>';
    } else {
        $user = '<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Welcome ' . $_SESSION["user"] . '<br> <a href="logout.php"  tite="Logout">Logout.</a> </div>';
    }
} else $user = '<a href="Login.php" class="nav-item nav-link position-relative text-uppercase  mx-4 active">Login</a>';
?>