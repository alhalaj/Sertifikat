<?php
require 'Page/Include/Connect/Connections.php';
$username = $_POST['username'];
$query ="INSERT INTO test (`id`,`nama`) VALUES ('0123','$username')";
// echo $query;
$insert = mysqli_query($con,$query);
echo 'Error : '.mysqli_error($con);
// if($insert){
//         $status = base64_encode('status');
//         $url = base64_encode('success');
//         header("location:login_aksi.php?".$status."=".$url);
// }
?>