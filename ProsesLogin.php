<?php
session_start();
require 'Page/Include/Connect/Connections.php';
if (ISSET ($_POST['submit'])){
    $username = $_POST['email'];
    $pass = $_POST['password'];
    $query = $con->query("SELECT * FROM users WHERE username = '$username' AND password = '".md5($pass)."'");
    if(mysqli_num_rows($query)==0){
        $status = base64_encode('status');
        $url = base64_encode('failed');
        header("location:login_aksi.php?".$status."=".$url);
    } else {
        $row = mysqli_fetch_assoc($query);
        $level = $row['level'];
		$sebagai = $row['status'];
        if ($level === 'User'){
            $_SESSION['status']="Active";
            $_SESSION['nuha'] =$pass;
            $_SESSION['mylevel'] =$level;
            $_SESSION['username'] =$username;
			$_SESSION['sebagai'] =$sebagai;	
            header("location:Page/View/dashboard.php");
            // header("location:./test.php");
        } else {
            $_SESSION['status']="Active";
            $_SESSION['aris'] ='TRUE';
			$_SESSION['username'] =$username;
            $_SESSION['mylevel'] =$level;
            header("location:Page/View/dashboard.php");
            echo "Admin";
        }
    } 
	}
?>