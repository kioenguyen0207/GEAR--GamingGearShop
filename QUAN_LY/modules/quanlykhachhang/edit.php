<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require_once '../../config/config.php';
        if(isset($_GET['MSNV'])){
            $id = $_GET['MSNV'];
            $query = "SELECT * FROM nhanvien WHERE MSNV = $id";
            $result = mysqli_query($connect, $query);
            $row = $result->fetch_array();
            $MSNV = $row['MSNV'];
            $HoTenNV = $row['HoTenNV'];
            $ChucVu = $row['ChucVu'];
            $DiaChi = $row['DiaChi'];
            $SoDienThoai = $row['SoDienThoai'];
            $username = $row['username'];
            $password = $row['password'];
        }
        if(isset($_POST['edit'])){
            $newHoTenNV = $_POST['HoTenNV'];
            $newChucVu = $_POST['ChucVu'];
            $newDiaChi = $_POST['DiaChi'];
            $newSoDienThoai = $_POST['SoDienThoai'];
            $newpassword = $_POST['password'];

            $sql = "UPDATE nhanvien SET HoTenNV = '$newHoTenNV', ChucVu = '$newChucVu', DiaChi = '$newDiaChi', SoDienThoai = '$newSoDienThoai', password = '$newpassword' WHERE MSNV=$MSNV";
            if(mysqli_query($connect,$sql)){
                echo "<script>alert('Thành công'); window.location='../../index.php?action=quanlynhanvien'</script>";
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
        }
    ?>
    <div class="container-fluid">
        <form method="POST" action="">
            <fieldset disabled>
            <div class="mt-3 mb-3">
                <label for="MSNV" class="form-label">Mã nhân viên</label>
                <input name="MSNV" class="form-control" value="<?php echo $MSNV;?>">
            </div>
            </fieldset>
            <div class="mt-3 mb-3">
                <label for="HoTenNV" class="form-label">Họ tên nhân viên</label>
                <input name="HoTenNV" class="form-control" value="<?php echo $HoTenNV;?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="ChucVu" class="form-label">Chức vụ</label>
                <input name="ChucVu" class="form-control" value="<?php echo $ChucVu;?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="DiaChi" class="form-label">Địa Chỉ</label>
                <input name="DiaChi" class="form-control" value="<?php echo $DiaChi;?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="SoDienThoai" class="form-label">Số điện thoại</label>
                <input name="SoDienThoai" class="form-control" value="<?php echo $SoDienThoai;?>">
            </div>
            <fieldset disabled>
            <div class="mt-3 mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" class="form-control" value="<?php echo $username;?>">
            </div>
            </fieldset>
            <div class="mt-3 mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" class="form-control" value="<?php echo $password;?>">
            </div>
            <button type= "submit" class="btn btn-success" name="edit">Lưu thay đổi</button>
        </form>
    </div>
</body>
</html>
