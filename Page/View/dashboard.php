<?php

error_reporting(0)

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
        require '../Include/lock.php';
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
                                    <h3 class="card-title"><?php echo $totalp['JUM'];?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Last 24 Hours
                                    </div>
                                </div>
                            </div>
                        </div>
            
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
?>
</html>