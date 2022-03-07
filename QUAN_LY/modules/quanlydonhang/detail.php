<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require_once '../../config/config.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = $connect->query("SELECT * FROM ((dathang inner join chitietdathang on dathang.SoDonDH = chitietdathang.SoDonDH) inner join hanghoa on chitietdathang.MSHH = hanghoa.MSHH) WHERE dathang.SoDonDH = '$id'");
        }
        $sum = 0;
        $status = 0;
        if(isset($_POST['confirm'])){
            $sql = "UPDATE dathang SET TrangThaiDH = 'Đã xác nhận' WHERE SoDonDH = '$id'";
            if(mysqli_query($connect,$sql)){
                echo "<script>alert('Thành công'); window.location='../../index.php?action=quanlydonhang'</script>";
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
        }
    ?>
    <div class="container-fluid mt-3">
        <h1>Mã đơn hàng: <?php echo $id?></h1>
        <table class="table table-secondary table-hover table-bordered">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Mã hàng hóa</th>
                    <th scope="col">Tên hàng hóa</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['MSHH'];?></td>
                    <td><?php echo $row['TenHH'];?></td>
                    <td><?php echo $row['SoLuong'];?></td>
                    <td><?php echo number_format($row['Gia']); $sum+=$row['Gia']*$row['SoLuong']; if($row['TrangThaiDH']!='pending'){$status = 1;}?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <h3>Tổng đơn hàng: <?php echo number_format($sum);?>đ</h3>
        <form method="POST">
            <button type= "submit" class="btn btn-success" name="confirm" <?php if($status==1){echo "disabled";} ?>>Tiếp nhận đơn hàng</button>
        </form>
    </div>
</body>
</html>
