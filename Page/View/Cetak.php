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
                                   
                                    
                                   
                                            <?php
											
												$user = $_SESSION['username'];												
												 																								 
                                                
											
																							
												 $query1 =" SELECT ps.id_pendaftaran, ps.id_peserta, ps.tgl_daftar, ps.bukti_byr, ps.status, p.nama, s.nama_seminar, s.tgl_pelaksana 
                                                 FROM pendaftaran_seminar as ps 
                                                 LEFT JOIN peserta as p ON p.no_registrasi = ps.id_peserta 
                                                 LEFT JOIN seminar as s ON s.id_seminar = ps.id_seminar
												 AND p.username= '$user' ";																								 
                                              //   $query1 = "SELECT * FROM pendaftaran_seminar where id_peserta = '$idpeserta'";
                                                 $data1  = $con->query($query1);
                                                 While ($row1 = mysqli_fetch_object($data1))
                                                {                                                 
													 $bayar = $row1->status;
													 $nama_sem = $row1->nama_seminar;
													 $name = $row1->nama;
													 $status = $row1->status;
												     
													if ($bayar === "false") 
													{
														echo "<button  rel='tooltip' class='btn btn-info' title='silahkan hubungi admin untuk verivikasi'>
                                                       <i class='fa fa-payment'></i> <?php echo '$nama_sem';?> belum di verivikasi
                                                      </button>"
									;
													}else {
                                                ?>
												<form action="Certificate.php" method="post">
                                            <h3> 
														Nama   : <?php echo "$name";?><br>
															   Acara  :<?php echo "$nama_sem";?>  <br>
													            Status : <?php echo "$status";?><br>
																
													</h3><br>
                                                        <input type="hidden" name="namacetak" value="<?php echo "$name";?>">
														<input type="hidden" name="status" value="<?php echo "$status";?>">
                                                        <button type="submit" rel="tooltip" class="btn btn-info"title="Cetak Sertifikat">
                                                       <i class="fa fa-print"></i>Cetak sertifikat
                                                      </button>
                                                        </form>  
							
                                                  </center>
													     
												
											<?php }
													
												
												
                                                }
                                                $con -> close();
                                                ?>
                                            </tbody>
                                        </table>
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