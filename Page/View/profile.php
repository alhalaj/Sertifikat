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
			 $level = $_SESSION['mylevel'];
             $user = $_SESSION['username'];
			 $sebagai = $_SESSION['sebagai'];
			 
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
		  <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Profile -
                                        <small class="category">Complete your profile</small>
                                    </h4>
									<?php
									$query = "SELECT a.*, b.*
												FROM users a, peserta b
												WHERE a.username = b.username AND a.username='$user'";
								//	$query = "SELECT * FROM peserta where username= '$user'";
                                                 $data  = $con->query($query);
                                                 While ($row = mysqli_fetch_object($data))
                                                {
									
									?>
                                    <form method="post"  action="updateprofile.php" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    
                                                    <input name="username" type="hidden" class="form-control" value="<?php echo $row->username ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    
                                                    <input name="password" type="hidden" class="form-control" value="<?php echo $row-> password ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">nama lengkap</label>
                                                    <input name="nama" type="text" class="form-control" value="<?php echo $row->nama ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">email</label>
                                                    <input name="email" type="text" class="form-control" value="<?php echo $row->email ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">alamat </label>
                                                    <input name="alamat" type="text" class="form-control" value="<?php echo $row-> alamat ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    
													<label class="control-label">Status Peserta</label>
													<select name="status" class="form-control" required autofocus>
													<option value="<?php echo $row->status ?>"  selected><?php echo $row->status ?></option>
                                        
													<option value="Pemakalah">Pemakalah</option>
													<option value="Non Pemakalah">Non Pemakalah</option>
                                        </select>
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Instansi </label>
                                                    <input name="instansi" type="text" class="form-control" value="<?php echo $row->instansi ?>">
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nomer Handphone </label>
                                                    <input name="hp" name="number" number="true" class="form-control" value="<?php echo $row->hp ?>">
                                                </div>
                                            </div>
                                           
                                        </div>                                        
                                        <button type="submit" name="submit" class="btn btn-rose pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
									<?php 
                                                }
                                                
                                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../../assets/img/faces/poto.jpg" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray"></h6>
									<?php
									$query2 = "SELECT a.*, b.*
												FROM users a, peserta b
												WHERE a.username = b.username AND a.username='$user'";
								//	$query = "SELECT * FROM peserta where username= '$user'";
                                                 $data  = $con->query($query2);
                                                 While ($row2 = mysqli_fetch_object($data))
                                                {
									
									?>
                                    <h4 class="card-title"><?php echo $row2->nama ?> </h4>
                                    <p class="description">
										<?php echo $row2->status ?><br>
                                        <?php echo $row2->email ?><br>
										<?php echo $row2->instansi ?>
                                    </p>
                                    <a href="#" class="btn btn-rose btn-round">Follow</a>
                                </div>
								<?php 
                                                }
                                                $con -> close();
                                                ?>
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