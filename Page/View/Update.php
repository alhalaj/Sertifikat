<?php
require '../Include/Connect/Connections.php';
 if(isset($_POST['Submit'])){
    $id = base64_decode($_POST["sem_id"]);
    $name = $_POST['seminar'];
    $date = date('Y-m-d', strtotime($_POST['tanggal']));
    $note = $_POST['keterangan'];
    $query ="UPDATE seminar SET `nama_seminar`= '$name',`tgl_pelaksana` = '$date',`keterangan` ='$note' where id_seminar ='$id'";
    $update = mysqli_query($con,$query);
    if($update){
            header("location:../View/Seminar.php");
        } else {
            // echo 'Error : '.$insert->error." ".$query;
            // echo 'Error : '.mysqli_error($con);
        }
} else if(isset($_POST['Submit1'])){
    $id = base64_decode($_POST["pes"]);
    $berkas = $_POST["berkas"];
    $status = $_POST["status"];
    $status = empty($status) ? "false":"true";
    $query ="UPDATE pendaftaran_seminar SET `status`= '$status' where id_pendaftaran ='$id'";
    // echo $status;
    $update = mysqli_query($con,$query);
    if($update){
            header("location:../View/Peserta.php");
        } else {
            // echo 'Error : '.$insert->error." ".$query."<br>";
            // echo 'Error : '.mysqli_error($con);
        }
}
?>