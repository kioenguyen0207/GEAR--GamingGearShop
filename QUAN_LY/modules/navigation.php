<?php
    if(isset($_GET['logout']) && $_GET['logout']=='logoutclient'){
        unset($_SESSION['login_admin']);
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- Import CSS -->
    <link rel="stylesheet" href="css/navigation.css">
</head>
<body>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <form class="container-fluid d-flex justify-content-evenly">
                <a href="index.php?action=quanlykhachhang"><button type="button" class="btn btn-warning btn-block">Quản lý Khách hàng</button></a>
                <a href="index.php?action=quanlynhanvien"><button type="button" class="btn btn-warning btn-block">Quản lý Nhân viên</button></a>
                <a href="index.php?action=quanlyhanghoa"><button type="button" class="btn btn-warning btn-block">Quản lý Hàng hóa</button></a>
                <a href="index.php?action=quanlyloaihanghoa"><button type="button" class="btn btn-warning btn-block">Quản lý Loại hàng hóa</button></a>
                <a href="index.php?action=quanlydonhang"><button type="button" class="btn btn-warning btn-block">Quản lý Đơn hàng</button></a>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mx-auto" href="index.php?action=dashboard"><span class="main-logo">GEAR!</span><span class="secondary-logo">admin</span></a>
            <a href="./index.php?logout=logoutclient"><button type="button" class="btn btn-danger">Đăng xuất</button></a>
        </div>
    </nav>
</body>
</html>