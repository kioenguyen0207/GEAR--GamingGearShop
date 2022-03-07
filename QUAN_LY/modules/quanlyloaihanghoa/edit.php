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
        if(isset($_GET['MaLoaiHang'])){
            $id = $_GET['MaLoaiHang'];
            $query = "SELECT * FROM loaihanghoa WHERE MaLoaiHang = $id";
            $result = mysqli_query($connect, $query);
            $row = $result->fetch_array();
            $MaLoaiHang = $row['MaLoaiHang'];
            $TenLoaiHang = $row['TenLoaiHang'];
        }
        if(isset($_POST['MaLoaiHang'])){
            $newTenLoaiHang = $_POST['TenLoaiHang'];
            $sql = "UPDATE loaihanghoa SET TenLoaiHang = '$newTenLoaiHang' WHERE MaLoaiHang=$MaLoaiHang";
            if(mysqli_query($connect,$sql)){
                echo "<script>alert('Thành công'); window.location='../../index.php?action=quanlyloaihanghoa'</script>";
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
        }
    ?>
    <div class="container-fluid">
        <form method="POST" action="">
            <fieldset disabled>
            <div class="mt-3 mb-3">
                <label for="MaLoaiHang" class="form-label">Mã loại hàng</label>
                <input name="MaLoaiHang" class="form-control" value="<?php echo $MaLoaiHang;?>">
            </div>
            </fieldset>
            <div class="mt-3 mb-3">
                <label for="TenLoaiHang" class="form-label">Tên loại hàng</label>
                <input name="TenLoaiHang" class="form-control" value="<?php echo $TenLoaiHang;?>" required>
            </div>
            <button type= "submit" class="btn btn-success" name="MaLoaiHang">Lưu thay đổi</button>
        </form>
    </div>
</body>
</html>
