<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="helvetica-font">Quản lý hàng hóa</h1>
    </div>
    <div class="container-fluid add-wrapper">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Thêm hàng hóa
        </a>
        <div class="collapse" id="collapseExample">
            <?php
                include("add.php");
            ?>
        </div>
    </div>
    <!-- DATA -->
    <div class="container-fluid mt-3">
        <?php require_once 'config/config.php'?>
        <?php
            $result = $connect->query("SELECT * FROM ((hanghoa inner join loaihanghoa on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang)
                                                            inner join hinhhanghoa on hanghoa.MSHH = hinhhanghoa.MSHH)");
        ?>
        <table class="table table-secondary table-hover table-bordered">
            <thead class="table-info">
                <tr>
                    <th scope="col">Mã số hàng hóa</th>
                    <th scope="col">Tên hàng hóa</th>
                    <th scope="col">Quy cách</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng hàng</th>
                    <th scope="col">Loại hàng</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['MSHH'];?></td>
                    <td><?php echo $row['TenHH'];?></td>
                    <td><?php echo $row['QuyCach'];?></td>
                    <td><?php echo $row['Gia'];?></td>
                    <td><?php echo $row['SoLuongHang'];?></td>
                    <td><?php echo $row['TenLoaiHang'];?></td>
                    <td>
                        <img class="product-image" src="../KHACH_HANG/media/image/product-image/<?php echo $row['TenHinh'];?>" alt="">
                    </td>
                    <td>
                        <a class="text-decoration-none" href="modules/quanlyhanghoa/remove.php?delete=<?php echo $row['MSHH'] ?>"><button type="button" class="btn btn-sm btn-danger">Xóa</button></a>
                        <a class="text-decoration-none" href="modules/quanlyhanghoa/edit.php?MSHH=<?php echo $row['MSHH'] ?>"><button type="button" class="btn btn-sm btn-warning">Sửa</button></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <?php $connect->close();?>
    </div>
</body>
</html>