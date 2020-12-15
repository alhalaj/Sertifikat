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
                                                 $query = "SELECT * FROM peserta where username = '$user'";
                                                 $data  = $con->query($query);
                                                 While ($row = mysqli_fetch_object($data))
                                                {
                                                    $name = $row->nama; 
													$status = $row->status;
													
													
                                                ?>
                                            
							<center>
                                                      <form action="Certificate.php" method="post">
													    <h3>   Nama   : <?php echo "$name";?><br>
											   
													Status : <?php echo "$status";?>
													</h3><br>
                                                        <input type="hidden" name="namacetak" value="<?php echo "$name";?>">
                                                        <button type="submit" rel="tooltip" class="btn btn-info"title="Cetak Sertifikat">
                                                       <i class="fa fa-print"></i>Cetak sertifikat
                                                      </button>
                                                        </form>  
							
                                                  </center>
                                                <?php 
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