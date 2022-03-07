<?php
  require_once 'config/config.php';
?>
<?php
  if(isset($_POST['add'])){
    $tenloaihang = $_POST["tenloaihang"];
    if(!$connect->query("INSERT INTO loaihanghoa (TenLoaiHang) VALUES (N'$tenloaihang')")){
      echo "Có lỗi xảy ra!";
    }
  }
?>
<form method="POST" action="">
  <div class="mt-3 mb-3">
    <label for="tenloaihang" class="form-label">Tên loại hàng</label>
    <input name="tenloaihang" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success" name="add">Thêm</button>
</form>

