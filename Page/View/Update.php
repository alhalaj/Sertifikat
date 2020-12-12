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
    $oldberkas = $_POST["old_berkas"];
    $status = $_POST["status"];
    $status = empty($status) ? "false":"true";

    $ekstensi_diperbolehkan	= array('png','jpg');
    $berkas = $_FILES['berkas']['name'];   
    $x = explode('.', $berkas);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['berkas']['size'];
    $file_tmp = $_FILES['berkas']['tmp_name'];
    $path = "../Include/Image/berkas/";
    if (!empty($berkas)){
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){		
            // echo $file_tmp;
                $query = "UPDATE pendaftaran_seminar SET `bukti_byr` = '$berkas', `status`= '$status' where id_pendaftaran ='$id' ";
                // echo 'Query : '.$con;
                // echo 'Error : '.mysqli_error($con);
                // echo $berkas;
                $update = mysqli_query($con,$query);
                if($update){
                    move_uploaded_file($file_tmp, '../Include/Image/berkas/'.$berkas);
                    if(file_exists($path.$oldberkas)){
                        unlink($path.$oldberkas);
                    }
                //     // return true;
                //     echo 'FILE BERHASIL DI UPLOAD';
                header("location:../View/Peserta.php");
                }else{
                    echo 'GAGAL MENGUPLOAD GAMBAR';
                }
            }else{
                echo 'UKURAN FILE TERLALU BESAR';
            }
        }else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            // header("location:../View/Peserta.php");
        }
    }else {
        // $berkas = empty($berkas) ? "buktibayar":$berkas;
        $query ="UPDATE pendaftaran_seminar SET `status`= '$status' where id_pendaftaran ='$id'";
    // echo $status;
        $update = mysqli_query($con,$query);
        if($update){
                header("location:../View/Peserta.php");
            } else {
                // echo 'Error : '.$insert->error." ".$query."<br>";
                // echo 'Error : '.mysqli_error($con);
            }
           /* if(!empty($berkas)){
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070){		
                // echo $file_tmp;
                    if($update){
                        move_uploaded_file($file_tmp, '../Include/Image/berkas/'.$berkas);
                        if(file_exists($path.$oldberkas)){
                            unlink($path.$oldberkas);
                        }else {

                        }
                    //     // return true;
                    //     echo 'FILE BERHASIL DI UPLOAD';
                    }else{
                        echo 'GAGAL MENGUPLOAD GAMBAR';
                    }
                }else{
                    echo 'UKURAN FILE TERLALU BESAR';
                }
            }else{
                header("location:../View/Peserta.php");
            }
        }else{
            header("location:../View/Peserta.php");
        }*/
      }
}
?>