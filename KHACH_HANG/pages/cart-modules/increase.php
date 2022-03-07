<?php
    include("../../../QUAN_LY/config/config.php");
    $MSHH = $_GET['id'];
    $username = $_GET['user'];
    $connect->query("UPDATE cart SET quantity = quantity + 1 WHERE MSHH=$MSHH AND username='$username'");
    header("Location: ../../index.php?action=checkout");
?>