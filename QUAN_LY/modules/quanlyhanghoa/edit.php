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
        $sql_loaihanghoa = "SELECT * FROM loaihanghoa";
        $query_loaihanghoa = mysqli_query($connect, $sql_loaihanghoa);
        if(isset($_GET['MSHH'])){
            $MSHH = $_GET['MSHH'];
            $query = "SELECT * FROM hanghoa WHERE MSHH = $MSHH";
            $result = mysqli_query($connect, $query);
            $row = $result->fetch_array();
            $TenHH = $row['TenHH'];
            $QuyCach = $row['QuyCach'];
            $Gia = $row['Gia'];
            $SoLuongHang = $row['SoLuongHang'];
            $MaLoaiHang = $row['MaLoaiHang'];
        }
        if(isset($_POST['MaLoaiHang'])){
            $newTenHH = $_POST['TenHH'];
            $newQuyCach = $_POST['QuyCach'];
            $newGia = $_POST['Gia'];
            $newSoLuongHang = $_POST['SoLuongHang'];
            $newMaLoaiHang = $_POST['MaLoaiHang'];
            $newTenHinh = $_FILES["TenHinh"]["name"];
            $newTenHinh_temp = $_FILES["TenHinh"]["tmp_name"];


            $sql = "UPDATE hanghoa SET TenHH = '$newTenHH', QuyCach = '$newQuyCach', Gia = $newGia, SoLuongHang = $newSoLuongHang, MaLoaiHang = $newMaLoaiHang WHERE MSHH=$MSHH";
            $sql_hinhhanghoa = "UPDATE hinhhanghoa SET TenHinh = '$newTenHinh' WHERE MSHH=$MSHH";
            move_uploaded_file($newTenHinh_temp, '../../../KHACH_HANG/media/image/product-image/'.$newTenHinh);
            if(mysqli_query($connect,$sql)){
                if(mysqli_query($connect, $sql_hinhhanghoa)){
                    echo "<script>alert('Thành công'); window.location='../../index.php?action=quanlyhanghoa'</script>";
                }else{
                    echo "<script>alert('Thất bại');</script>";
                }
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
        }
    ?>
    <div class="container-fluid">
        <form method="POST" action="" enctype="multipart/form-data">
            <fieldset disabled>
            <div class="mt-3 mb-3">
                <label for="MaLoaiHang" class="form-label">Mã số hàng hóa</label>
                <input name="MaLoaiHang" class="form-control" value="<?php echo $MSHH;?>" required>
            </div>
            </fieldset>
            <div class="mt-3 mb-3">
                <label for="TenHH" class="form-label">Tên hàng hóa</label>
                <input name="TenHH" class="form-control" value="<?php echo $TenHH;?>" required>

                <label for="QuyCach" class="form-label">Quy cách</label>
                <input name="QuyCach" class="form-control" value="<?php echo $QuyCach;?>" required>
                
                <label for="Gia" class="form-label">Giá</label>
                <input name="Gia" class="form-control" value="<?php echo $Gia;?>" required>

                <label for="SoLuongHang" class="form-label">Số lượng hàng</label>
                <input name="SoLuongHang" class="form-control" value="<?php echo $SoLuongHang;?>" required>

                <label for="MaLoaiHang" class="form-label">Loại hàng</label>
                <select class="form-control" name="MaLoaiHang" id="">
                <option selected>Chọn loại hàng</option>
                <?php
                    while($row_loaihanghoa = mysqli_fetch_assoc($query_loaihanghoa)){?>
                        <option value = "<?php echo $row_loaihanghoa['MaLoaiHang']?>"><?php echo $row_loaihanghoa['MaLoaiHang']?> - <?php echo $row_loaihanghoa['TenLoaiHang']?></option>
                    <?php }
                ?>
                </select>

                <label for="TenHinh" class="form-label">Hình ảnh</label>
                <input type="file" name="TenHinh" id="TenHinh" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success" name="add">Sửa</button>
        </form>
    </div>
</body>
</html>
