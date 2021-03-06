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
            <span class="fs-4">Quay v??? trang ch???</span>
          </a>
        </header>
    
        <div class="p-5 mb-4 rounded-3 payment-greeting">
          <div class="container-fluid py-5 payment-greeting-text">
            <h1 class="display-5 fw-bold">Thanh to??n</h1>
            <p class="col-md-8 fs-4">Hi v???ng b???n ???? c?? m???t tr???i nghi???m mua h??ng tuy???t v???i t???i GEAR!</p>
          </div>
        </div>
        <main>
            <div class="row g-5">
              <!-- Cart -->
              <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-primary">Gi??? h??ng</span>
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
                    <span>T???ng</span>
                    <strong><?php echo number_format($sum_cart)?>??</strong>
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
                      <label for="HoTenKH" class="form-label">H??? t??n</label>
                      <input type="text" class="form-control" name="HoTenKH" value="<?php echo $row_info['HoTenKH'];?>" required="">
                    </div>
    
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" class="form-control" name="username" value="<?php echo $username?>" disabled>
                      </div>
                    </div>
        
                    <div class="col-12">
                      <label for="address" class="form-label">?????a ch???</label>
                      <input type="text" class="form-control" name="DiaChi" required value="<?php echo $row_info['DiaChi'];?>">
                    </div>
        
                    <div class="col-12">
                      <label for="address2" class="form-label">S??? ??i???n tho???i</label>
                      <input type="text" class="form-control" name="SoDienThoai" value = "<?php echo $row_info['SoDienThoai'];?>">
                    </div>

                    <div class="col-12">
                      <label for="address2" class="form-label">S??? Fax</label>
                      <input type="text" class="form-control" name="SoFax" value = "<?php echo $row_info['SoFax'];?>">
                    </div>

                    <div class="col-12">
                      <label for="address2" class="form-label">T??n c??ng ty</label>
                      <input type="text" class="form-control" name="TenCongTy" value = "<?php echo $row_info['TenCongTy'];?>">
                    </div>

                  <hr class="my-4">
                  <button class="w-100 btn btn-primary btn-lg" name="checkout" data-bs-toggle="tooltip" data-bs-placement="right" type="submit" title="X??c nh???n thanh to??n!">Continue to checkout</button>
                </form>
              </div>
            </div>
          </main>
    
        <div class="row align-items-md-stretch mt-5">
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Quy???n ri??ng t??</h2>
              <p>Ch??ng t??i lu??n t??n tr???ng quy???n ri??ng t?? c???a kh??ch h??ng. V?? ch??ng ta ai c??ng c???n ???????c b???o m???t th??ng tin!</p>
              <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Ch??nh s??ch ri??ng t?? c???a GEAR!</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Giao h??ng</h2>
              <p>GEAR! l?? ?????i t??c c???a c??c c??ng ty v???n chuy???n l???n h??ng ?????u Vi???t Nam. Ch??ng t??i lu??n kh???t khe trong vi???c ????ng g??i s???n ph???m ?????n b???n m???t c??ch chuy??n nghi???p nh???t. V?? s???n ph???m x???ng ????ng ???????c n??ng niu ?????n tay b???n!</p>
              <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Ch??nh s??ch giao h??ng c???a GEAR!</button>
            </div>
          </div>
        </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nguy???n ????nh Qu?? - B1812372</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  T???i Apple, ch??ng t??i tin t?????ng m???nh m??? v??o c??c quy???n ri??ng t?? c?? b???n v?? vi???c ??p d???ng ?????ng nh???t c??c quy???n c?? b???n ???? cho d?? b???n ??ang s???ng ??? ????u tr??n th??? gi???i. ???? l?? l?? do ch??ng t??i coi m???i d??? li???u li??n quan ?????n m???t c?? nh??n ???? x??c ?????nh ho???c c?? th??? x??c ?????nh danh t??nh, ho???c d??? li???u m?? Apple ???? li??n k???t ho???c c?? th??? li??n k???t v???i c?? nh??n ???y, l?? ???d??? li???u c?? nh??n???, b???t k??? ng?????i ???? s???ng ??? ????u. ??i???u n??y c?? ngh??a l?? c??? d??? li???u tr???c ti???p x??c ?????nh danh t??nh c???a b???n ??? ch???ng h???n nh?? t??n b???n ??? v?? d??? li???u kh??ng tr???c ti???p x??c ?????nh danh t??nh c???a b???n nh??ng c?? th??? d??ng theo c??ch h???p l?? ????? x??c ?????nh danh t??nh c???a b???n ??? ch???ng h???n nh?? s??? s??-ri c???a thi???t b??? ??? ?????u l?? d??? li???u c?? nh??n. V???i c??c m???c ????ch c???a Ch??nh s??ch quy???n ri??ng t?? n??y, s??? li???u t???ng h???p ???????c coi l?? d??? li???u phi c?? nh??n.<br><br>
                  Ch??nh s??ch quy???n ri??ng t?? n??y ????? c???p ?????n c??ch Apple ho???c m???t c??ng ty li??n k???t c???a Apple (g???i chung l?? ???Apple???) x??? l?? d??? li???u c?? nh??n, cho d?? b???n t????ng t??c v???i ch??ng t??i tr??n trang web, th??ng qua c??c ???ng d???ng c???a Apple (ch???ng h???n nh?? Apple Music ho???c Wallet) hay b???ng h??nh th???c tr???c ti???p (bao g???m qua ??i???n tho???i ho???c khi b???n ?????n c??c c???a h??ng b??n l??? c???a ch??ng t??i). Apple c??ng c?? th??? li??n k???t t???i c??c b??n th??? ba khi cung c???p d???ch v??? ho???c cho ph??p t???i v??? c??c ???ng d???ng c???a b??n th??? ba tr??n App Store. Ch??nh s??ch quy???n ri??ng t?? c???a Apple kh??ng ??p d???ng cho c??ch c??c b??n th??? ba ?????nh ngh??a v??? d??? li???u c?? nh??n ho???c c??ch h??? s??? d???ng d??? li???u ????. Ch??ng t??i khuy???n kh??ch b???n ?????c ch??nh s??ch quy???n ri??ng t?? c???a h??? v?? hi???u r?? c??c quy???n ri??ng t?? d??nh cho m??nh tr?????c khi t????ng t??c v???i h???. 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????ng</button>
                  <button type="button" class="btn btn-primary">T??i ???? ?????c v?? hi???u r??</button>
                </div>
              </div>
            </div>
          </div>
    
        <footer class="pt-3 mt-4 text-muted border-top">
          ?? 2021
        </footer>
      </div>
</body>
</html>