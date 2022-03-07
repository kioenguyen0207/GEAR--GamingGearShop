<?php
    include("../../../QUAN_LY/config/config.php");
    $MSHH = $_GET['id'];
    $username = $_GET['user'];
    $connect->query("DELETE FROM cart WHERE MSHH=$MSHH AND username='$username'");
    header("Location: ../../index.php?action=checkout");
?>