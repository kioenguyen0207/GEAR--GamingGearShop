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
        <h1 class="helvetica-font">Quản lý loại hàng hóa</h1>
        <p>(Tính năng được em tạo ra để thêm loại hàng hóa lúc đầu, thay đổi thông tin loại hàng hóa có thể ảnh hưởng đến hoạt động của web, trang này mang tính tham khảo)</p>
    </div>
    <div class="container-fluid add-wrapper">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Thêm loại hàng hóa
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
            $result = $connect->query("SELECT * FROM loaihanghoa");

        ?>
        <table class="table table-secondary table-hover table-bordered">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Mã loại hàng</th>
                    <th scope="col">Tên loại hàng</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['MaLoaiHang'];?></td>
                    <td><?php echo $row['TenLoaiHang'];?></td>
                    <td>
                        <a class="text-decoration-none" href="modules/quanlyloaihanghoa/remove.php?delete=<?php echo $row['MaLoaiHang'] ?>"><button type="button" class="btn btn-sm btn-danger">Xóa</button></a>
                        <a class="text-decoration-none" href="modules/quanlyloaihanghoa/edit.php?MaLoaiHang=<?php echo $row['MaLoaiHang'] ?>"><button type="button" class="btn btn-sm btn-warning">Sửa</button></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <?php $connect->close();?>
    </div>
</body>
</html>