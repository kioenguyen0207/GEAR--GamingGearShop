<?php
  $cf_servername = "localhost";
  $cf_username = "root";
  $cf_password = "";
  $cf_database = "quanlydathang";
  $connect = mysqli_connect($cf_servername, $cf_username, $cf_password, $cf_database);

  // Check connection
  if(!$connect){
    echo("Fail to connect");
  }
?> 

