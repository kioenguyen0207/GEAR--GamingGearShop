<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop all</title>
    <!-- Import Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- import css -->
    <link rel="stylesheet" href="css/product/product.css">
</head>
<body>
  <?php
    require_once '../QUAN_LY/config/config.php';

    if(isset($_GET['action'])){
      $category = $_GET['action'];
      switch($category){
        case "product-mouse":
          $MaLoaiHang = 1;
          $query = "SELECT * FROM (hanghoa inner join hinhhanghoa on hanghoa.MSHH = hinhhanghoa.MSHH) WHERE MaLoaiHang = $MaLoaiHang";
          $query_loaihanghoa = "SELECT TenLoaiHang FROM loaihanghoa WHERE MaLoaiHang=$MaLoaiHang";
          break;
        case "product-keyboard":
          $MaLoaiHang = 2;
          $query = "SELECT * FROM (hanghoa inner join hinhhanghoa on hanghoa.MSHH = hinhhanghoa.MSHH) WHERE MaLoaiHang = $MaLoaiHang";
          $query_loaihanghoa = "SELECT TenLoaiHang FROM loaihanghoa WHERE MaLoaiHang=$MaLoaiHang";
          break;
        case "product-headset":
          $MaLoaiHang = 3;
          $query = "SELECT * FROM (hanghoa inner join hinhhanghoa on hanghoa.MSHH = hinhhanghoa.MSHH) WHERE MaLoaiHang = $MaLoaiHang";
          $query_loaihanghoa = "SELECT TenLoaiHang FROM loaihanghoa WHERE MaLoaiHang=$MaLoaiHang";
          break;
        default:
          $MaLoaiHang = -1;
          $query = "SELECT * FROM (hanghoa inner join hinhhanghoa on hanghoa.MSHH = hinhhanghoa.MSHH)";
          $query_loaihanghoa = "SELECT TenLoaiHang FROM loaihanghoa WHERE MaLoaiHang=$MaLoaiHang";
      }
      $result_loaihanghoa = mysqli_query($connect, $query_loaihanghoa);
      $result = mysqli_query($connect, $query);
      // $row = $result->fetch_array();
      $row_loaihanghoa = $result_loaihanghoa->fetch_array();
    }
  ?>
  <?php
    if(isset($_POST['add'])){
      $SoLuongHang = $_POST["SoLuongHang"];
      $MSHH = $_POST["MSHH"];
      $username = $_SESSION['login_guest'];
      $getAmountQuery = "SELECT * FROM cart WHERE MSHH=$MSHH AND username='$username'";
      $getAmountResult = mysqli_query($connect, $getAmountQuery);
      if (mysqli_num_rows($getAmountResult)>0 and $SoLuongHang>0) {
        $addQuery="UPDATE cart SET quantity = quantity + 1 WHERE MSHH=$MSHH AND username='$username'";
        $addResult = mysqli_query($connect, $addQuery);
      } else {
        if($SoLuongHang>0){
          $addQuery="INSERT INTO cart (username, MSHH, quantity) VALUES ('$username', $MSHH, 1)";
          $addResult = mysqli_query($connect, $addQuery);
        }
      } 
    }
  ?>
  <header>
    <div class="d-flex justify-content-between pb-3 mb-4 border-bottom">
      <a href="index.php" class="text-dark text-decoration-none">
        <span class="fs-4">Quay về trang chủ</span>
      </a>

      <ul class="nav nav-pills  justify-content-end">
        <li class="nav-item"><a href="index.php" class="nav-link text-dark" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="index.php?action=product-all" class="nav-link <?php if($category == "product-all"){echo "bg-dark active";} else {echo "text-dark";}?>">Tất cả</a></li>
        <li class="nav-item"><a href="index.php?action=product-mouse" class="nav-link <?php if($category == "product-mouse"){echo "bg-dark active";} else {echo "text-dark";}?>">Chuột</a></li>
        <li class="nav-item"><a href="index.php?action=product-keyboard" class="nav-link <?php if($category == "product-keyboard"){echo "bg-dark active";} else {echo "text-dark";}?>">Bàn phím</a></li>
        <li class="nav-item"><a href="index.php?action=product-headset" class="nav-link <?php if($category == "product-headset"){echo "bg-dark active";} else {echo "text-dark";}?>">Tai nghe</a></li>
        <li class="nav-item ms-2"><a href="index.php?action=checkout"><button type="button" class="btn btn-warning">Giỏ hàng</button></a></li>
      </ul>
    </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal"><?php if($MaLoaiHang>0){echo $row_loaihanghoa['TenLoaiHang'];} else{echo "Tất cả sản phẩm";} ?></h1>
      <p class="fs-5 text-muted">Tuyển chọn bởi GEAR! Khi tốc độ quyết định chiến thắng.</p>
    </div>
  </header>
  <!-- Product Grid -->
  <main class="main bd-grid product-grid">
    <?php while($row = mysqli_fetch_assoc($result)){?>
    <article class="card">
        <div class="card__img">
            <img src="media/image/product-image/<?php echo $row['TenHinh'];?>" alt="">
        </div>
        <div class="card__name">
            <p><?php echo $row['TenHH'];?></p>
        </div>
        <div class="card__precis">
            <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a>
            
            <div>
                <span class="card__preci card__preci--before"><?php if($row['SoLuongHang']>0){echo "Còn hàng";}else{echo "Hết hàng";}?></span>
                <span class="card__preci card__preci--now"><?php echo number_format($row['Gia']);?></span>
            </div>
            <form action="" method="POST">
              <input type="hidden" name="MSHH" class="form-control" value="<?php echo $row['MSHH'];?>">
              <input type="hidden" name="SoLuongHang" class="form-control" value="<?php echo $row['SoLuongHang'];?>">
              <a href="" class="card__icon"><button class="btn btn-primary-outline btn-lg p-0 mb-1" type="submit" name="add"><ion-icon name="cart-outline"></ion-icon></button></a>
            </form>
        </div>
    </article>
    <?php }?>
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
  <!-- ICONS -->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>