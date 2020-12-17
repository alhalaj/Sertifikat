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
        <?php require '../Include/SideBar.php'; ?>        
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
                                   <div class="material-datatables">                                       
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nama Seminar</th>
                                                    <th>Tanggal Seminar</th>
                                                    <th>Status</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $query1 ="SELECT s.nama_seminar, s.tgl_pelaksana, ps.status, ps.id_pendaftaran FROM pendaftaran_seminar as ps 
                                                left join seminar as s ON s.id_seminar = ps.id_seminar 
                                                left join peserta as p ON p.no_registrasi = ps.id_peserta 
                                                where p.username = '$user'";
                                                $data1  = $con->query($query1);
                                                While ($row1 = mysqli_fetch_object($data1))
                                                {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1->nama_seminar; ?></td>
                                                    <td><?php echo $row1->id_pendaftaran; ?></td>
													<?php $id= $row1->id_pendaftaran; ?>
                                                    <td><?php echo $row1->status== 'false' ? "Belum Diaktifasi":"Aktif"; ?></td>
                                                    <td class="text-right">
                                                       
                                                  
													<a href="aksi_peserta.php?id=<?= $id ?>" 
													onclick="return confirm('Anda yakin akan menghapus data ini?')">
													<button type="button" class="btn btn-xs btn-danger hapus">
													  <i class="material-icons">close</i>
													</button></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                   
                                    </div>
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