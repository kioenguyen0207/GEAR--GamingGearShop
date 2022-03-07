<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEAR!</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- Import CSS(s) -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/product-slider.css">
    <link rel="stylesheet" href="css/nav-card.css">
    <link rel="stylesheet" href="css/product-category.css">
    <link rel="stylesheet" href="css/about.css">
    <!-- Import font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Import icon -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['login_guest'])){
            header('location: pages/login.php');
        }
    ?>
    <?php
        if(isset($_GET['action'])){
            $temp = $_GET['action'];
        } else{
            $temp = '';
        }
        if($temp=='product-mouse'){
            include("pages/product.php");
        }elseif($temp=='product-keyboard'){
            include("pages/product.php");
        }elseif($temp=='product-headset'){
            include("pages/product.php");
        }elseif($temp=='product-all'){
            include("pages/product.php");
        }elseif($temp=='checkout'){
            include("pages/cart.php");
        }elseif($temp=='checkout-success'){
            include("pages/checkout-success.php");
        }elseif($temp=='user-info'){
            include("pages/user-info.php");
        }else{
            include("pages/home.php");
        }
    ?>
</body>
</html>