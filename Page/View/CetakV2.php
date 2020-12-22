<?php

error_reporting(0)

?>
<!doctype html>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<head>
    
    <?php 
		
        require '../Include/Header.php';
        require '../Include/Connect/Connections.php';
		require '../Include/lock.php';
        require '../Include/Header.php';
      
		 
       		
        if($_SESSION['status']!="Active"){
            header ('location:../../login.php');
            exit(); 
         } else{
		 
    
    ?>
    
</head>

<body>
    <div class="wrapper">
        <?php 
        require '../Include/SideBar.php';
        	$user = $_SESSION['username'];
        ?>        
        <div class="main-panel">
            <?php require '../Include/NavPanel.php';?>
            <div class="content">
            <div class="container-fluid">
                    <div class="row">
					
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary" data-background-color="purple">
                                    <i class="material-icons">print</i> 
												  Cetak Sertifikat 
			
                                    
                                </div>
                                <div class="card-content">
                                    <!--aris-->
                <div class="material-datatables">                                       
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
													<th>Nama Peserta</th>
                                                    <th>Nama seminar</th>
                                                    <th>Tanggal daftar</th>
													<th>Peserta</th>
                                                    <th>Status</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 $query = "SELECT p.username, p.status as bayar, p.nama, s.nama_seminar,ps.tgl_daftar,ps.status FROM pendaftaran_seminar as ps left join peserta as p ON p.no_registrasi = ps.id_peserta left join seminar as s ON s.id_seminar = ps.id_seminar where p.username = '$user'; ";
                                                 $data  = $con->query($query);
                                                 While ($row = mysqli_fetch_object($data))
                                                {
                                                    $tgl = $row->tgl_daftar;
													$seminar = $row->nama_seminar;
													$sebagai = $row->bayar;
													$name = $row->nama;
                                                ?>
                                                <tr>
                                                    <td><?php echo $name; ?></td>
													<td><?php echo $seminar; ?></td>
                                                    <td><?php echo $tgl; ?></td>
													<?php if ($seminar=== "Munasba 2020"){
														?>																				
													<td><?php echo $sebagai; ?></td>
													<?php } else {
														?>
														<td>Peserta</td>
													<?php	
													} ?>
                                                    <td><?php echo $row->status =="true" ? "LUNAS": "Belum Lunas"; ?></td>
                                                    <td class="text-right">
                                                        
														<?php 
														 $lunas = $row->status;
														if ($lunas === "true") {
															
														?>
														
                                                        <form action="Certificate.php" method="post">
                                                        <input type="hidden" name="namacetak" value="<?php echo "$name";?>">
														<input type="hidden" name="status" value="<?php echo "$sebagai";?>">
														<input type="hidden" name="seminar" value="<?php echo "$seminar";?>">												                                                       
														<button class="btn btn-xs btn-info hapus" data-toggle="tooltip" data-placement="bottom" title="Cetak Sertifikat" >
                                                <i class="fa fa-print">print</i>
                                            </button>
                                                        </form> 
														<?php } else {
															?>
														<button class="btn btn-xs btn-danger hapus" data-toggle="tooltip" data-placement="bottom" title="Cetak Sertifikat" disabled>
														<i class="fa fa-delete">belum</i>
														<?php } ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                $con -> close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                
                <!--aris-->
                                    
                                   
                                            
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
						
                    </div>
                    <!-- end row -->
				
                </div>
            </div>
            <?php include_once '../Include/Footer.php'; ?>
        </div>
    </div>
    <!-- <?php include_once '../Include/SideBarTools.php'; ?> -->
</body>
<!--   Core JS Files   -->
<?php require '../Include/Js.php'; ?>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<?php
// session_unset();
//  session_destroy();
		 }
?>
</html>