<?php
session_start();
require 'Page/Include/Connect/Connections.php';
if (ISSET ($_POST['submit'])){
    $username = $_POST['email'];
    $pass = md5($_POST['password']);
    // $query = $con->query("SELECT * FROM users WHERE username = '$username' AND password = '$pass'");
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $username,$pass); 
    $stmt->execute();
    $result = $stmt->get_result(); 
//    print_r($result);
    // while ($row = $result->fetch_assoc()) {
    //     echo $row['username'];
    // }
        if(mysqli_num_rows($result)==0){
            $status = base64_encode('status');
            $url = base64_encode('failed');
            header("location:login_aksi.php?".$status."=".$url);
        } else {
            $row = mysqli_fetch_assoc($result);
            $level = $row['level'];
            // echo $level;
            if ($level === 'User'){
                $_SESSION['status']="Active";
                $_SESSION['aris']='TRUE';
                $_SESSION['nuha'] =$pass;
                $_SESSION['mylevel'] =$level;
                $_SESSION['username'] =$username;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 30);
            	// $_SESSION['sebagai'] =$sebagai;	
                header("location:Page/View/dashboard.php");
                // header("location:./test.php");
            } else {
                $_SESSION['aris']='TRUE';
                $_SESSION['status']="Active";
                $_SESSION['sebagai'] = 'Admin';
            	$_SESSION['username'] =$username;
                $_SESSION['mylevel'] =$level;
                header("location:Page/View/dashboard.php");
                // echo "Admin";
            }
        } 
    }
    mysql_close($query); 
	mysql_close($con);
?>