<?php
require '../Include/Connect/Connections.php';

    if(isset($_POST['Submit'])){
        $name = $_POST['seminar'];
        $date = date('Y-m-d', strtotime($_POST['tanggal']));
        $note = $_POST['keterangan'];
        $query ="INSERT INTO seminar (`nama_seminar`,`tgl_pelaksana`,`keterangan`) VALUES ('$name','$date','$note')";
        // echo $query;
        $insert = mysqli_query($con,$query);
        if($insert){
                header("location:../View/Seminar.php");
            } else {
                // echo 'Error : '.$insert->error." ".$query;
                // echo 'Error : '.mysqli_error($con);
            }
    } else if (isset($_POST['Submit1'])){
        $ekstensi_diperbolehkan	= array('png','jpg');
        $id_peserta = $_POST['peserta'];
        $id_seminar = $_POST['seminar'];
        $berkas = $_FILES['berkas']['name'];
        $today = date("Y-m-d");
        $x = explode('.', $berkas);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['berkas']['size'];
        $file_tmp = $_FILES['berkas']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){			
                $query = "INSERT INTO pendaftaran_seminar (`id_seminar`,`id_peserta`,`bukti_byr`,`tgl_daftar`)VALUES('$id_seminar','$id_peserta','$berkas','$today')";
                $insert = mysqli_query($con,$query);
                if($insert){
                    move_uploaded_file($file_tmp, '../Include/Image/berkas/'.$berkas);
                    return true;
                    echo 'FILE BERHASIL DI UPLOAD';
                }else{
                    echo 'GAGAL MENGUPLOAD GAMBAR';
                }
            }else{
                echo 'UKURAN FILE TERLALU BESAR';
            }
        }else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        }
        // echo $id_peserta ." ".$id_seminar . " ".$id_berkas;
    }
?>