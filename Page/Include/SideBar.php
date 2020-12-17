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
							 $query = $con->query("SELECT status FROM peserta WHERE username = '$user'");
                             $row2 = mysqli_fetch_assoc($query);
							 echo   $_SESSION['sebagai'] == "Admin" ? "Admin" : $row2['status'];
                            ?>
                        </a>
                        
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="../View/dashboard.php">
                            <i class="material-icons">home</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php 
                    $level = $_SESSION['mylevel'];
                    if ($level === "Admin" ){
                    ?>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">reorder</i>
                            <p>Master Data
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../View/Seminar.php">
									<i class="material-icons">swap_vert</i>
									 <p>Data Seminar</p>
									</a>
                                </li>
                                <li>
                                    <a href="../View/DataPeserta.php">
									<i class="material-icons">person</i>
									 <p>Data Pesertar</p>
									</a>
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
                            <i class="material-icons">speaker_notes</i>
                            <p>pilih Seminar dan upload<br> bukti bayar</p>
                        </a>
                    </li>
                    <li>
                        <a href="../View/CetakV2.php">
                            <i class="material-icons">print</i>
                            <p>Cetak Sertifikat</p>
                        </a>
                    </li>
					<li>
                        <a href="../View/profile.php">
                            <i class="material-icons">settings</i>
                            <p>Setting Profile</p>
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