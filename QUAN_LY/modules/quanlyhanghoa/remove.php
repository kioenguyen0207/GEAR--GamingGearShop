<?php
    include("../../config/config.php");
    if(isset($_GET['delete'])){
        $MSHH = $_GET['delete'];
        $connect->query("DELETE FROM hinhhanghoa WHERE MSHH=$MSHH");
        $connect->query("DELETE FROM hanghoa WHERE MSHH=$MSHH");
        header("Location: ../../index.php?action=quanlyhanghoa");
    }
?>