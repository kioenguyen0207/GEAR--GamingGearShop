<?php
  require_once '../../QUAN_LY/config/config.php';
?>
<?php
    $sql_autoIncrement = "SELECT `AUTO_INCREMENT`
                            FROM  INFORMATION_SCHEMA.TABLES
                            WHERE TABLE_SCHEMA = 'quanlydathang'
                            AND   TABLE_NAME   = 'khachhang';";
    $query_autoIncrement = mysqli_query($connect, $sql_autoIncrement);
    $fetch_autoIncrement = mysqli_fetch_assoc($query_autoIncrement);
    $value_autoIncrement = $fetch_autoIncrement['AUTO_INCREMENT'];
  if(isset($_POST['add'])){
    $HoTenKH = $_POST['HoTenKH'];
    $TenCongTy = $_POST['TenCongTy'];
    $DiaChi = $_POST['DiaChi'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $SoFax = $_POST['SoFax'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!$connect->query("INSERT INTO khachhang (HoTenKH, TenCongTy, SoDienThoai, SoFax, username, password) VALUES ('$HoTenKH', '$TenCongTy', '$SoDienThoai', '$SoFax', '$username', '$password')")){
      echo "Có lỗi xảy ra!";
    } else{
        echo "<script>window.location='login.php'</script>";
    }
    if(!$connect->query("INSERT INTO diachikh (DiaChi, MSKH) VALUES ('$DiaChi', $value_autoIncrement)")){
        echo "Có lỗi xảy ra!";
    } else{
        echo "<script>window.location='login.php'</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- Import CSS -->
    <link rel="stylesheet" href="../css/login/register.css">
</head>
<body class="text-center">
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5 lign-items-start">
                        <h2 class="d-inline text-center mb-5">Hành trình mới tại <h2 class="brand-logo">GEAR!</h2></h2>
                        <form class="text-start mt-5" method="POST" action="">
                            <div class="mt-3 mb-3">
                                <label for="HoTenKH" class="form-label">Họ và tên</label>
                                <input name="HoTenKH" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="TenCongTy" class="form-label">Công ty của bạn</label>
                                <input name="TenCongTy" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="SoDienThoai" class="form-label">Số điện thoại</label>
                                <input name="SoDienThoai" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="SoFax" class="form-label">Số Fax</label>
                                <input name="SoFax" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="DiaChi" class="form-label">Địa chỉ</label>
                                <input name="DiaChi" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input name="username" class="form-control" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-lg btn-success" name="add">Đăng ký</button>
                            </div>
                            <p class="text-center text-muted mt-5 mb-0">Đã là thành viên? <a href="login.php" class="fw-bold text-body"><u>Đăng nhập</u></a></p>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>