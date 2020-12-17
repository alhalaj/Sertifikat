<?php 
        
        require '../Include/Connect/Connections.php';
		
		if (isset($_POST['submit'])){ 
    	echo	$username =  strtolower(preg_replace('/\s+/', '', $_POST['username']));
		echo	$password = $_POST['password'];
		echo	$email =  $_POST['email'];
		echo	$nama =  $_POST['nama'];
		echo	$status =  $_POST['status'];
		echo	$instansi =  $_POST['instansi'];
		echo	$alamat =  $_POST['alamat'];
		echo	$hp =  $_POST['hp'];
		
     //	$query ="UPDATE `users` SET `email` = '$email', status='$status' WHERE `users`.`username` = '$username'";
		
        $query .="UPDATE `peserta` SET `nama` = '$nama', `alamat` = '$alamat', `instansi` = '$instansi',
		`status` = '$status', `hp` = '$hp' WHERE `peserta`.`username` = '$username'";
                            // echo $query;
                            $insert = mysqli_multi_query($con,$query);
							if($insert){
                                   echo "<script>alert('profile berhasil diubah'); 
											window.location.href='profile.php'</script>";
                                   
                             } else {
                                   
                                    echo 'Error : '.mysqli_error($con);
                             }
		
		}
		
?>