<?php 

include '../config/connect.php';
include '../thuvien/user.php';

?>

<?php

session_start();

// Kiểm tra nút Đăng nhập đã được nhấn hay chưa
if (isset($_POST["dangnhap"])) {

    // Lấy thông tin người dùng từ form đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo $password;
    $result=useradmin($username);
    // Kiểm tra kết quả trả về
    if (mysqli_num_rows($result) > 0) {

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $row = mysqli_fetch_assoc($result);
        // Kiểm tra mật khẩu hợp lệ
        if ($row['password'] === $password) {
            // Đăng nhập thành công và set user name vào biến session
            $_SESSION["user"] = "$username";
            header("Location: /index.php?action=home");
        } else {
            // sai mk
            
             echo ' <script> alert("Sai mật khẩu. Vui lòng thử lại"); </script>';
        }
    } else {
        // Kiểm tra kết quả trả về
        $result1 =usernhanvien($username);
        if ( mysqli_num_rows($result1)> 0) {

            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $row = mysqli_fetch_assoc($result1);
            // Kiểm tra mật khẩu hợp lệ
            if ($row['password'] === $password) {
                // Đăng nhập thành công và set user name vào biến session
                $_SESSION["user"] = "$username";
                header("Location: ../index.php?action=index&controller=users");
            } else {
                // sai mk
                
                $message = ' <script> alert("Sai mật khẩu. Vui lòng thử lại"); </script>';
            }
        } else {

            // Người dùng không tồn tại
            
            $message = ' <script> alert("Người dùng không tồn tại!"); </script>';
        }
    }
}


// Đóng kết nối
$_SESSION["message"] = "$message";
// mysqli_close($conn);

?>
