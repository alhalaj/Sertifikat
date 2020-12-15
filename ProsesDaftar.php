<?php
require 'Page/Include/Connect/Connections.php';

if (isset($_POST['submit'])){ 
    $username =  strtolower(preg_replace('/\s+/', '', $_POST['username']));
    $password = $_POST['password'];
    $email =  $_POST['email'];
    if (!empty($username) && !empty($password) && !empty($email)) {        
            $query = "SELECT COUNT(username) as user FROM users WHERE username = '$username'";            
            echo $query;
            $search = $con->query($query);
            While ($row = mysqli_fetch_object($search)) {
                $user = $row->user;
            }
            if( $user === "0") {
                $nama =  $_POST['fullname'];
                $tempat_lahir = $_POST['tempatLahir'];
             //   $tgl_lahir =  date('Y-m-d', strtotime($_POST['tglLahir']));
                $jnis_kelamin =  $_POST['gender'];
            //    $propinsi =  $_POST['wilayah'];
             //   $alamat =  $_POST['alamat'];
            //    $instansi =  $_POST['afiliasi'];
             //   $skill =  $_POST['keahlian'];
            //    $hp =  $_POST['telepon'];
                // $foto =  $_POST['foto'];
                $date = date('Y-m-d', strtotime($_POST['tanggal']));
                $note = $_POST['keterangan'];

            //    $ekstensi_diperbolehkan	= array('png','jpg');
            //    $foto = $_FILES['foto']['name'];
                // $today = date("Y-m-d");
            //    $x = explode('.', $foto);
            //    $ekstensi = strtolower(end($x));
            //    $ukuran	= $_FILES['foto']['size'];
            //    $file_tmp = $_FILES['foto']['tmp_name'];
            //    $path = 'Page/Include/Image/foto/';
             //    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
              //      if($ukuran < 1044070){
                            $query ="INSERT INTO users (`username`,`password`,`email`) VALUES ('$username','$password','$email');";
                          $query .="INSERT INTO peserta (`username`,`nama`,`tempat_lahir`,`tgl_lahir`,`jnis_kelamin`,`propinsi`,`alamat`,`instansi`,`skill`,`hp`,`foto`) VALUES
                            ('$username','$nama','','','$jnis_kelamin','','','','','','')";
                            // echo $query;
                            $insert = mysqli_multi_query($con,$query);
                            if($insert){
                                    move_uploaded_file($file_tmp, $path.$foto);
                                    $status = base64_encode('status');
                                    $url = base64_encode('success');
                                    header("location:login_aksi.php?".$status."=".$url);
               //               } else {
                                    // echo 'Error : '.$insert->error." ".$query;
                                    // echo 'Error : '.mysqli_error($con);
               //                 }
                //        }else{
                ////            echo 'UKURAN FILE TERLALU BESAR';
                //        }        
           //     }else{
            //        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            //    }
            } else {
                $status = base64_encode('status');
                $url = base64_encode('failed');
                header("location:daftar.php?".$status."=".$url);
            }    
    } else {
        $status = base64_encode('status');
        $url = base64_encode('notsuccess');
        header("location:daftar.php?".$status."=".$url);
    }
}
}
$con->dba_close();
?>
