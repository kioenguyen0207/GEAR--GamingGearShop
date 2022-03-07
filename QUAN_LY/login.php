<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- Import CSS -->
    <link rel="stylesheet" href="../KHACH_HANG/css/login/login.css">
</head>
<body class="text-center">
    <?php
        require_once 'config/config.php';
        session_start();
        if(isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username;
            echo $password;
            $sql = "SELECT password FROM nhanvien WHERE username='$username'";
            $query = mysqli_query($connect, $sql);
            $rows = mysqli_fetch_array($query);
    
            if($rows['password'] == $password){
                $_SESSION['login_admin']=$username;
                header('location: index.php');
            } else {
                header('location: login.php');
            }
        }
    ?>
    <main class="form-signin">
    <form action="" method="POST">
        <h1 class="brand-logo">GEAR!</h1>
        <h1 class="h3 mb-3 fw-normal">for admin</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="username" placeholder = "Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder = "Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> <span class="text-white">Nhớ tôi</span>
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="btn_login" type="submit">Đăng nhập</button>
        <p class="mt-5 mb-3">&copy; Nguyen Dinh Quy - B1812372</p>
    </form>
    </main>
</body>
</html>