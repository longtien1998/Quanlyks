<?php
include "../config/connect.php";
include "../dao/pdo.php";
include "../dao/userDAO.php";

include '../admin/layouts/header.php' ?>
<?php
if (!isset($_GET["action"])) $_GET["action"] = "index";
if (!isset($_GET["controller"])) $_GET["controller"] = "dashboard";
switch ($_GET["controller"]) {
    case 'user-admin':
        switch ($_GET["action"]) {
            case 'index':
                include './pages/users-admin/index.php';
                break;
            case 'new-admin':
                // $message = "";
                // if (isset($_POST['dangky']) && $_POST['dangky']) {
                //     // LẤY THÔNG TIN TỪ FORM
                //     // $fullname = $_POST["fullname"];
                //     $username = $_POST["username"];
                //     // $password = $_POST["password"];
                //     // $email = $_POST["email"];
                //     // $phone = $_POST["phone"];

                //     // kiểm tra người dùng đã tồn tại hay chưa
                //     $result =  getUserByName($username);
                //     if ($result > 0) {
                //         $message = ' <h2 class="section-title fc-basic-view px-5"><span class="px-2">tài khoản đã đăng kí</span></h2>'.$result;
                //     } else {
                //         // thêm tài khoản vào cơ sở dữ liệu
                //         $conn = connect_pdo();
                //         $stmt = $conn->prepare('INSERT INTO users (name, email, age) values (?, ?, ?)');
                //         $data = array($fullname, $username,$phone, $password, $email);

                //         //Phương thức execute() dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự
                //         $stmt->execute($data);
                //         if ($stmt->execute($data) == TRUE) {
                //             $message = '<h2 class="section-title fc-basic-view px-5" style="color: green;"><span class="px-2">Đăng ký thành công</span></h2> <br> Quay lại đăng nhập <a href="Login.php"> tại đây</a>';
                //         } else {
                //             $message = ' <h2 class="section-title fc-basic-view px-5" style="color: red;"><span class="px-2">Đăng ký thất bại</span></h2>';
                //         }
                //     }
                // }

                include './pages/users-admin/new.php';
                break;

            default:
                include './pages/users/index.php';
                break;
        }
        break;
    case 'products':
        include './pages/products/index.php';
        break;

    default:
        include 'pages/dashboads.php';
        break;
}
?>
<?php include './layouts/footer.php' ?>