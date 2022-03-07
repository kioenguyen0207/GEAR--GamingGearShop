<?php
  require_once 'config/config.php';
?>
<?php
  $sql_loaihanghoa = "SELECT * FROM loaihanghoa";
  $query_loaihanghoa = mysqli_query($connect, $sql_loaihanghoa);

  $sql_autoIncrement = "SELECT `AUTO_INCREMENT`
                        FROM  INFORMATION_SCHEMA.TABLES
                        WHERE TABLE_SCHEMA = 'quanlydathang'
                        AND   TABLE_NAME   = 'hanghoa';";
  $query_autoIncrement = mysqli_query($connect, $sql_autoIncrement);
  $fetch_autoIncrement = mysqli_fetch_assoc($query_autoIncrement);
  $value_autoIncrement = $fetch_autoIncrement['AUTO_INCREMENT'];

  if(isset($_POST['add'])){
    $TenHH = $_POST["TenHH"];
    $QuyCach = $_POST["QuyCach"];
    $Gia = $_POST["Gia"];
    $SoLuongHang = $_POST["SoLuongHang"];
    $MaLoaiHang = $_POST["MaLoaiHang"];
    $TenHinh = $_FILES["TenHinh"]["name"];
    $TenHinh_temp = $_FILES["TenHinh"]["tmp_name"];
    
    $sql = "INSERT INTO hanghoa (TenHH, QuyCach, Gia, SoLuongHang, MaLoaiHang) VALUES ('$TenHH', '$QuyCach', $Gia, $SoLuongHang, $MaLoaiHang)";
    $query = mysqli_query($connect, $sql);
    $sql_hinhhanghoa = "INSERT INTO hinhhanghoa (TenHinh, MSHH) VALUES ('$TenHinh', $value_autoIncrement)";
    $query_hinhhanghoa = mysqli_query($connect, $sql_hinhhanghoa);
    move_uploaded_file($TenHinh_temp, '../KHACH_HANG/media/image/product-image/'.$TenHinh);
  }
?>
<form method="POST" action="" enctype="multipart/form-data">
  <div class="mt-3 mb-3">
    <label for="TenHH" class="form-label">Tên hàng hóa</label>
    <input name="TenHH" class="form-control" required>

    <label for="QuyCach" class="form-label">Quy cách</label>
    <input name="QuyCach" class="form-control" required>
    
    <label for="Gia" class="form-label">Giá</label>
    <input name="Gia" class="form-control" required>

    <label for="SoLuongHang" class="form-label">Số lượng hàng</label>
    <input name="SoLuongHang" class="form-control" required>

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
  <button type="submit" class="btn btn-success" name="add">Thêm</button>
</form>

