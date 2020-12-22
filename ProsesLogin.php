<?php
session_start();
require 'Page/Include/Connect/Connections.php';
if (ISSET ($_POST['submit'])){
    $username = $_POST['email'];
    $pass = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $username,$pass); 
    $stmt->execute();
    $result = $stmt->get_result(); 
        if(mysqli_num_rows($result)==0){
            $status = base64_encode('status');
            $url = base64_encode('failed');
            header("location:login_aksi.php?".$status."=".$url);
        } else {
            $row = mysqli_fetch_assoc($result);
            $level = $row['level'];
            if ($level === 'User'){
                $_SESSION['status']="Active";
                $_SESSION['aris']='TRUE';
                $_SESSION['nuha'] =$pass;
                $_SESSION['mylevel'] =$level;
                $_SESSION['username'] =$username;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 30);
                header("location:Page/View/dashboard.php");
            } else {
                $_SESSION['aris']='TRUE';
                $_SESSION['status']="Active";
                $_SESSION['sebagai'] = 'Admin';
            	$_SESSION['username'] =$username;
                $_SESSION['mylevel'] =$level;
                header("location:Page/View/dashboard.php");
            }
        } 
    }
    mysql_close($query); 
    mysql_close($con);
?>
