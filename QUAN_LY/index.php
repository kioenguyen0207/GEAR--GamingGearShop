<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admincp</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['login_admin'])){
            header('location:login.php');
        }
    ?>
    <?php
        include("modules/navigation.php");
    ?>
    <?php
        if(isset($_GET['action'])){
            $temp = $_GET['action'];
        } else{
            $temp = '';
        }
        
        if($temp=='quanlydonhang'){
            include("modules/quanlydonhang/main.php");
        }elseif($temp=='quanlyhanghoa'){
            include("modules/quanlyhanghoa/main.php");
        }elseif($temp=='quanlykhachhang'){
            include("modules/quanlykhachhang/main.php");
        }elseif($temp=='quanlynhanvien'){
            include("modules/quanlynhanvien/main.php");
        }elseif($temp=='quanlyloaihanghoa'){
            include("modules/quanlyloaihanghoa/main.php");
        }else{
            include("modules/dashboard.php");
        }
    ?>
</body>
</html>