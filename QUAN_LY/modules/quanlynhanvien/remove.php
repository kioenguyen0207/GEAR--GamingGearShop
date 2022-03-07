<?php
    include("../../config/config.php");
    if(isset($_GET['delete'])){
        $MSNV = $_GET['delete'];
        $connect->query("DELETE FROM nhanvien WHERE MSNV=$MSNV");
        header("Location: ../../index.php?action=quanlynhanvien");
    }
?>