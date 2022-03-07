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
    <link rel="stylesheet" href="../css/login/login.css">
</head>
<body class="text-center">
    <?php
        require_once '../../QUAN_LY/config/config.php';
        session_start();

        if(isset($_POST['btn_login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username;
            echo $password;
            $sql = "SELECT password FROM khachhang WHERE username='$username'";
            $query = mysqli_query($connect, $sql);
            $rows = mysqli_fetch_array($query);
            if($rows['password'] == $password){
                $_SESSION['login_guest']=$username;
                header('location: ../index.php');
            } else {
                header('location: login.php');
            }
        }
    ?>
    <main class="form-signin">
    <form action="" method="POST">
        <h1 class="brand-logo">GEAR!</h1>
        <h1 class="h3 mb-3 fw-normal">Mừng trở lại, bạn cũ!</h1>
        <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
        <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
        <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> <span class="text-white">Nhớ tôi</span>
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name ='btn_login'>Đăng nhập</button>
        <h5 class="color-white text-center text-muted mt-5 mb-0">Chưa phải là thành viên? <a href="register.php" class="fw-bold text-body"><u>Đăng ký</u></a></h5>
        <p class="mt-5 mb-3">&copy; Nguyen Dinh Quy - B1812372</p>
    </form>
    </main>
</body>
</html>