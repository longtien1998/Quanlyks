<?php include './layouts/header.php'; ?>

<?php
    if(!isset($_GET["action"])) $_GET["action"] = "home";
    
    switch ($_GET["action"]) {
        case 'home':
            include './pages/home.php';
            break;
        case 'phong':
            include './pages/phong.php';
            break;
        case 'viewphong':
            include './pages/viewphong.php';
            break;
        case 'phong':
            include './pages/phong.php';
            break;
        case 'phong':
            include './pages/phong.php';
            break;
        default:
            include './pages/home.php';
            break;
    }
?>

<?php include './layouts/footer.php' ?>