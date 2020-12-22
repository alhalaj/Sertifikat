<?php
// error_reporting(0)
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
require '../Include/lock.php';
    if(!isset($_SESSION['username'])){
        // echo "SILAHKAN LOGIN";
        header ('location:../../index.php');
    } else {
        require '../Include/Header.php';
        require '../Include/Connect/Connections.php';
		$total = "select count(*) as JUM from peserta ";
		$mhs = mysqli_query($con,$total);
		$totalp = mysqli_fetch_array($mhs,MYSQLI_ASSOC);
		$sql = "select count(*) as JUM2 from seminar ";
		$seminar = mysqli_query($con,$sql);
        $totals = mysqli_fetch_array($seminar,MYSQLI_ASSOC);
        if($_SESSION['status']!="Active"){
            header ('location:../../login.php');
            exit(); 
         } else{
    $level = $_SESSION['mylevel'];
    $user = $_SESSION['username'];
    ?>
</head>

<body class="">
  <div class="wrapper ">
    <?php require '../Include/SideBar.php'; ?>  
    <div class="main-panel">
     <?php require '../Include/NavPanel.php';?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
		  <?php
            if($level === "Admin"){
            ?>
		  <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="card-content">
                    <p class="category">Peserta Seminar</p>
                    <h3 class="card-title"><?php echo $totalp['JUM'];?></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                </div>
            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Jumlah Seminar</p>
                                    <h3 class="card-title"><?php echo $totals['JUM2'];?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Last 24 Hours
                                    </div>
                                </div>
                            </div>
                        </div>
						 <?php
                            }else{
                         ?>
						 <div class="header text-center">
                        <h3 class="title">ALur Proses <?php echo $user;?></h3>
							</div>
						 <ul class="timeline">
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge danger">
                                                <i class="material-icons">fingerprint</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-danger">login</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>gunakan username dan password yang dipilih untuk login ke sistem.</p>
                                                </div>
                                                <h6>
                                                    <i class="ti-time"></i> 
                                                </h6>
                                            </div>
                                        </li>
										<li>
                                            <div class="timeline-badge success">
                                                <i class="material-icons">payment</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-success">pilih seminar dan uplod bukti bayar</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>untuk seminar Multaqa Nasional ke 3 silahkan transfer sebesar RP 15.000,-
													ke No rek mandiri: 1660001371186 a.n. Fazlur Rachman
                                                </div>
                                            </div>
                                        </li>
										<li class="timeline-inverted">
                                            <div class="timeline-badge info">
                                                <i class="material-icons">print</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-info">Cetak sertifikat</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>setelah status sudah diaktivasi / verifikasi klik menu cetak sertifikat kemudian klik cetak 
													sertifikat akan muncul halaman baru yang menampilkan sertifikat kemudian downlod sertifikat tersebut</p>
                                                </div>
                                                
                                            </div>
                                        </li>
										<li>
                                            <div class="timeline-badge warning">
                                                <i class="material-icons">face</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-warning">Selesai</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Terima Kasih </p>
                                                </div>
                                            </div>
                                        </li>
										
                                    </ul>
										
										
										
								<?php
                            }
                            ?>
          </div>
          
          
        </div>
      </div>
       <?php include_once '../Include/Footer.php'; ?>
    </div>
  </div>
  <?php require '../Include/Js.php'; ?>
</body>
<?php
// session_unset();
//  session_destroy();
    }
}
?>
</html>