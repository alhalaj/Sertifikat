<?php
require_once 'Config.php';
if($con){
    mysqli_select_db($con, $database);
   }else if(mysqli_connect_error()){ // mengecek apakah koneksi database error
       echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
   }
?>