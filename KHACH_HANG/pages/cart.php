<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEAR! - Check out</title>
    <link rel="stylesheet" href="css/cart/cart.css">
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Cart php -->
    <?php
      require_once '../QUAN_LY/config/config.php';
      $sum_cart = 0;
      $username = $_SESSION['login_guest'];
      $sql_cart = "SELECT * FROM hanghoa inner join cart on hanghoa.MSHH = cart.MSHH WHERE username = '$username'";
      $result_cart = mysqli_query($connect, $sql_cart);
      $result_cart1 = mysqli_query($connect, $sql_cart);
    ?>
    <!-- User's info php -->
    <?php
      $sql_info = "SELECT * FROM khachhang inner join diachikh on khachhang.MSKH = diachikh.MSKH WHERE username = '$username'";
      $result_info = mysqli_query($connect, $sql_info);
      $row_info = mysqli_fetch_assoc($result_info);
      $MSKH = $row_info['MSKH'];
    ?>
    <!-- Checkout php -->
    <?php
      $sql_autoIncrement = "SELECT `AUTO_INCREMENT`
      FROM  INFORMATION_SCHEMA.TABLES
      WHERE TABLE_SCHEMA = 'quanlydathang'
      AND   TABLE_NAME   = 'dathang';";
      $query_autoIncrement = mysqli_query($connect, $sql_autoIncrement);
      $fetch_autoIncrement = mysqli_fetch_assoc($query_autoIncrement);
      $value_autoIncrement = $fetch_autoIncrement['AUTO_INCREMENT'];
      if(isset($_POST['checkout'])){
        $sql_checkout = "INSERT INTO dathang (MSKH, MSNV, NgayDH, NgayGH, TrangThaiDH) VALUES ('$MSKH', null, CURRENT_TIMESTAMP, null, 'pending')";
        $result_checkout = mysqli_query($connect, $sql_checkout); 
        while($row_checkout = mysqli_fetch_assoc($result_cart1)){
          $MSHH = $row_checkout['MSHH'];
          $SoLuong = $row_checkout['quantity'];
          $Gia = $row_checkout['Gia'];
          $sql_checkout_detail = "INSERT INTO chitietdathang (SoDonDH, MSHH, SoLuong, GiaDatHang, GiamGia) VALUES ($value_autoIncrement, $MSHH, $SoLuong, ($SoLuong*$Gia), 0)";
          $result_checkout_detail = mysqli_query($connect, $sql_checkout_detail); 
        }
        $sql_clear_cart = "DELETE FROM cart where username='$username'";
        $result_clearcart = mysqli_query($connect, $sql_clear_cart); 
        echo "<script>window.location='index.php?action=checkout-success'</script>";
      }
    ?>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
          <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">Quay về trang chủ</span>
          </a>
        </header>
    
        <div class="p-5 mb-4 rounded-3 payment-greeting">
          <div class="container-fluid py-5 payment-greeting-text">
            <h1 class="display-5 fw-bold">Thanh toán</h1>
            <p class="col-md-8 fs-4">Hi vọng bạn đã có một trải nghiệm mua hàng tuyệt vời tại GEAR!</p>
          </div>
        </div>
        <main>
            <div class="row g-5">
              <!-- Cart -->
              <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-primary">Giỏ hàng</span>
                </h4>
                <ul class="list-group mb-3">

                  <?php while($row = mysqli_fetch_assoc($result_cart)){?>
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0"><?php echo $row['TenHH'];?></h6>
                      <small class="text-muted">
                        <a class="change text-decoration-none" href="pages/cart-modules/<?php if($row['quantity']>1) {echo "decrease";}else{echo "delete";}?>.php?id=<?php echo $row['MSHH']?>&user=<?php echo $username?>">-</a>
                        <?php echo $row['quantity'];?>
                        <a class="change text-decoration-none" href="pages/cart-modules/increase.php?id=<?php echo $row['MSHH']?>&user=<?php if($row['quantity']<$row['SoLuongHang']){echo $username;}?>">+</a>
                      </small>
                    </div>
                    <span class="text-muted">
                      <?php echo number_format($row['Gia']*$row['quantity']); $sum_cart+=$row['Gia']*$row['quantity']?>
                      <a class="text-decoration-none text-red-500" href="pages/cart-modules/delete.php?id=<?php echo $row['MSHH']?>&user=<?php echo $username?>">x</a>
                    </span>
                  </li>
                  <?php }?>
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Tổng</span>
                    <strong><?php echo number_format($sum_cart)?>đ</strong>
                  </li>

                </ul>
        
                <form class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <button type="submit" class="btn btn-secondary" disabled>Redeem</button>
                  </div>
                </form>
              </div>
              <!-- Information -->
              <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing address</h4>
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="HoTenKH" class="form-label">Họ tên</label>
                      <input type="text" class="form-control" name="HoTenKH" value="<?php echo $row_info['HoTenKH'];?>" required="">
                    </div>
    
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" class="form-control" name="username" value="<?php echo $username?>" disabled>
                      </div>
                    </div>
        
                    <div class="col-12">
                      <label for="address" class="form-label">Địa chỉ</label>
                      <input type="text" class="form-control" name="DiaChi" required value="<?php echo $row_info['DiaChi'];?>">
                    </div>
        
                    <div class="col-12">
                      <label for="address2" class="form-label">Số điện thoại</label>
                      <input type="text" class="form-control" name="SoDienThoai" value = "<?php echo $row_info['SoDienThoai'];?>">
                    </div>

                    <div class="col-12">
                      <label for="address2" class="form-label">Số Fax</label>
                      <input type="text" class="form-control" name="SoFax" value = "<?php echo $row_info['SoFax'];?>">
                    </div>

                    <div class="col-12">
                      <label for="address2" class="form-label">Tên công ty</label>
                      <input type="text" class="form-control" name="TenCongTy" value = "<?php echo $row_info['TenCongTy'];?>">
                    </div>

                  <hr class="my-4">
                  <button class="w-100 btn btn-primary btn-lg" name="checkout" data-bs-toggle="tooltip" data-bs-placement="right" type="submit" title="Xác nhận thanh toán!">Continue to checkout</button>
                </form>
              </div>
            </div>
          </main>
    
        <div class="row align-items-md-stretch mt-5">
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Quyền riêng tư</h2>
              <p>Chúng tôi luôn tôn trọng quyền riêng tư của khách hàng. Vì chúng ta ai cũng cần được bảo mật thông tin!</p>
              <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Chính sách riêng tư của GEAR!</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Giao hàng</h2>
              <p>GEAR! là đối tác của các công ty vận chuyển lớn hàng đầu Việt Nam. Chúng tôi luôn khắt khe trong việc đóng gói sản phẩm đến bạn một cách chuyên nghiệp nhất. Vì sản phẩm xứng đáng được nâng niu đến tay bạn!</p>
              <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Chính sách giao hàng của GEAR!</button>
            </div>
          </div>
        </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nguyễn Đình Quý - B1812372</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Tại Apple, chúng tôi tin tưởng mạnh mẽ vào các quyền riêng tư cơ bản và việc áp dụng đồng nhất các quyền cơ bản đó cho dù bạn đang sống ở đâu trên thế giới. Đó là lý do chúng tôi coi mọi dữ liệu liên quan đến một cá nhân đã xác định hoặc có thể xác định danh tính, hoặc dữ liệu mà Apple đã liên kết hoặc có thể liên kết với cá nhân ấy, là “dữ liệu cá nhân”, bất kể người đó sống ở đâu. Điều này có nghĩa là cả dữ liệu trực tiếp xác định danh tính của bạn – chẳng hạn như tên bạn – và dữ liệu không trực tiếp xác định danh tính của bạn nhưng có thể dùng theo cách hợp lý để xác định danh tính của bạn – chẳng hạn như số sê-ri của thiết bị – đều là dữ liệu cá nhân. Với các mục đích của Chính sách quyền riêng tư này, số liệu tổng hợp được coi là dữ liệu phi cá nhân.<br><br>
                  Chính sách quyền riêng tư này đề cập đến cách Apple hoặc một công ty liên kết của Apple (gọi chung là “Apple”) xử lý dữ liệu cá nhân, cho dù bạn tương tác với chúng tôi trên trang web, thông qua các ứng dụng của Apple (chẳng hạn như Apple Music hoặc Wallet) hay bằng hình thức trực tiếp (bao gồm qua điện thoại hoặc khi bạn đến các cửa hàng bán lẻ của chúng tôi). Apple cũng có thể liên kết tới các bên thứ ba khi cung cấp dịch vụ hoặc cho phép tải về các ứng dụng của bên thứ ba trên App Store. Chính sách quyền riêng tư của Apple không áp dụng cho cách các bên thứ ba định nghĩa về dữ liệu cá nhân hoặc cách họ sử dụng dữ liệu đó. Chúng tôi khuyến khích bạn đọc chính sách quyền riêng tư của họ và hiểu rõ các quyền riêng tư dành cho mình trước khi tương tác với họ. 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="button" class="btn btn-primary">Tôi đã đọc và hiểu rõ</button>
                </div>
              </div>
            </div>
          </div>
    
        <footer class="pt-3 mt-4 text-muted border-top">
          © 2021
        </footer>
      </div>
</body>
</html>