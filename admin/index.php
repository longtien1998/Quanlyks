<?php include './layouts/header.php' ?>
<?php 
if(!isset($_GET["action"])) $_GET["action"] = "index";
if(!isset($_GET["controller"])) $_GET["controller"] = "dashboard";
switch ($_GET["controller"]) {
    case 'users':
        switch ($_GET["action"]) {
            case 'index':
                include './pages/users/index.php';
                break;
            case 'new':
                include './pages/users/new.php';
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