<?php
    include("../../config/config.php");
    if(isset($_GET['delete'])){
        $MaLoaiHang = $_GET['delete'];
        $connect->query("DELETE FROM loaihanghoa WHERE MaLoaiHang=$MaLoaiHang");
        header("Location: ../../index.php?action=quanlyloaihanghoa");
    }
?>