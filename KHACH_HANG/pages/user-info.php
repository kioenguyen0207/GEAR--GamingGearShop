<?php require_once '../QUAN_LY/config/config.php'?>
<?php
    $username = $_SESSION['login_guest'];
    $result = $connect->query("SELECT * FROM khachhang inner join diachikh on khachhang.MSKH=diachikh.MSKH WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    $MSKH = $row['MSKH'];
?>

<?php
    $username = $_SESSION['login_guest'];
    $result_order = $connect->query("SELECT * FROM dathang WHERE MSKH='$MSKH'");
?>

<div class="col-lg-8 mx-auto p-3 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
      <a href="index.php" class="text-dark text-decoration-none">
        <span class="fs-4">Quay về trang chủ</span>
      </a>
  </header>

  <main>
    <h1><?php echo $row['HoTenKH'];?></h1>
    <p class="fs-5 col-md-8 m-0"><strong>Company: </strong><?php echo $row['TenCongTy'];?></p>
    <p class="fs-5 col-md-8 m-0"><strong>Phone: </strong><?php echo $row['SoDienThoai'];?></p>
    <p class="fs-5 col-md-8 m-0"><strong>Fax: </strong><?php echo $row['SoFax'];?></p>
    <p class="fs-5 col-md-8 m-0"><strong>Address: </strong><?php echo $row['DiaChi'];?></p>
    <hr class="col-3 col-md-2 mb-5">

    <h1 class="pb-4"><strong>Đơn hàng của tôi</strong></h1>
    <?php while($row_order = mysqli_fetch_assoc($result_order)){?>
        <div class="row g-5">
          <div class="col-md-6">
            <h2>Order num #<?php echo $row_order['SoDonDH'];?></h2>
            <p>Trạng thái đơn hàng: <?php echo $row_order['TrangThaiDH'];?></p>
            <ul class="icon-list">
              <li>Ngày đặt hàng: <?php echo $row_order['NgayDH'];?></li>
              <li>Ngày giao hàng dự kiến: Đang cập nhật</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h2>Danh sách sản phẩm</h2>
            <ul class="icon-list">
              <?php
                $id = $row_order['SoDonDH'];
                $result_order_detail = $connect->query("SELECT * FROM chitietdathang inner join hanghoa on chitietdathang.MSHH = hanghoa.MSHH WHERE SoDonDH='$id'");
              ?>
              <?php $sum = 0; while($row_order_detail = mysqli_fetch_assoc($result_order_detail)){?>
              <li><?php echo $row_order_detail['TenHH'];?> x<?php echo $row_order_detail['SoLuong']; $sum = $sum+ $row_order_detail['SoLuong']*$row_order_detail['Gia']?></li>
              <?php }?>
              <li><p>Tổng: <strong><?php echo number_format($sum);?>đ</strong></p></li>
            </ul>
          </div>
        </div>
        <hr class="mb-3">
      <?php }?>
    </div>
  </main>
  <div class="mt-5 container-lg">
    <footer class="py-5">
      <div class="row">
        <div class="col-2">
          <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
            <h3 class="mb-0 main-logo">GEAR!</h3>
          </a>
          <p class="text-muted">© 2021</p>
        </div>

        <div class="col-2">
            <h5>Menu</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về đầu trang</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lịch sử phát triển</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về chúng tôi</a></li>
            </ul>
        </div>

        <div class="col-2">
            <h5>Menu</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về đầu trang</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lịch sử phát triển</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Về chúng tôi</a></li>
            </ul>
        </div>

        <div class="col-4 offset-1">
          <form>
            <h5>Đăng ký để nhận thông báo từ GEAR!</h5>
            <p>GEAR! cam kết không làm phiền bạn, chỉ mang đến thông tin khuyến mãi mà bạn mong chờ.</p>
            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>© 2021 GEAR!, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li><ion-icon class="card__icon ms-3" name="logo-facebook"></ion-icon></li>
          <li><ion-icon class="card__icon ms-3" name="logo-instagram"></ion-icon></li>
          <li><ion-icon class="card__icon ms-3" name="logo-twitter"></ion-icon></li>
          <li><ion-icon class="card__icon ms-3" name="logo-twitch"></ion-icon></li>
        </ul>
      </div>
    </footer>
  </div>
</div>