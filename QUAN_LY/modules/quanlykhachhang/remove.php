<?php
    include("../../config/config.php");
    if(isset($_GET['delete'])){
        $MSKH = $_GET['delete'];
        $connect->query("DELETE FROM diachikh WHERE MSKH=$MSKH");
        $connect->query("DELETE FROM khachhang WHERE MSKH=$MSKH");
        header("Location: ../../index.php?action=quanlykhachhang");
    }
?>