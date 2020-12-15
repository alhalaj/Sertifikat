<?php
require '../Include/lock.php';
require '../Include/Connect/Connections.php';
if($_SESSION['status']!="Active"){
    header ('location:../../login.php');
    exit(); 
    } else{
         $user = $_SESSION['username'];

        // $query ="SELECT * FROM users WHERE level ="
?>
<div class="sidebar" data-active-color="green" data-background-color="black" data-image="../../assets/img/logo.jpg">           
            
            
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="../../assets/img/faces/avatar.png" />
                    </div>
                    <div class="info">
                        <a >
                            <?php
                             $query = $con->query("SELECT nama FROM peserta WHERE username = '$user'");
                             $row = mysqli_fetch_assoc($query);
                             echo "Sdr/i ".$row['nama'];
                            ?>
                        </a>
                        <a >
                            <?php
                             //echo  $_SESSION['mylevel']=="User" ? "Peserta":$_SESSION['mylevel'];
							 echo   $_SESSION['sebagai'] =="Admin" ? "Admin":$_SESSION['sebagai'];
                            ?>
                        </a>
                        
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="../View/dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php 
                    $level = $_SESSION['mylevel'];
                    if ($level === "Admin" ){
                    ?>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p>Master Data
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../View/Seminar.php">Data Seminar</a>
                                </li>
                                <li>
                                    <a href="../pages/timeline.html">Data User</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                    }
                 }
                    ?>
                    <li>
                        <a href="../View/Peserta.php">
                            <i class="material-icons">image</i>
                            <p>Pendaftaran Seminar</p>
                        </a>
                    </li>
                    <li>
                        <a href="../View/Cetak.php">
                            <i class="material-icons">image</i>
                            <p>Cetak Sertifikat</p>
                        </a>
                    </li>
                    <li>
                        <a href="../../logout.php">
                            <i class="material-icons">power_settings_new</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>