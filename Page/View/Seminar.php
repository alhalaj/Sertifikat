<!doctype html>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<head>
    <?php 
        require '../Include/Header.php';
        require '../Include/Connect/Connections.php';
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
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"> <button class="btn btn-primary btn-xs btn-twitter"  
                                    data-toggle="modal" data-target="#exampleModalLong">
                                                <i class="fa fa-plus"></i>
                                            </button> Data Seminar
                                    </h4>
                                    <div class="toolbar">
                                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">                                       
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nama Seminar</th>
                                                    <th>Tanggal Seminar</th>
                                                    <th>Keterangan</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 $query = "SELECT * FROM seminar";
                                                 $data  = $con->query($query);
                                                 While ($row = mysqli_fetch_object($data))
                                                {
                                                    $date = date('d F Y', strtotime($row->tgl_pelaksana))
                                                ?>
                                                <tr>
                                                    <td><?php echo $row->nama_seminar; ?></td>
                                                    <td><?php echo  $date;?></td>
                                                    <td><?php echo $row->keterangan; ?></td>
                                                    <td class="text-right">
                                                    <input type="button" name="edit" value="Edit" id="<?php echo base64_encode($row->id_seminar); ?>" data-toggle="modal" data-target="#data_Modal" class="btn btn-info btn-xs edit_data" />
                                                    <input type="button" name ="delete" value ="Delete" id="<?php echo base64_encode($row->id_seminar); ?>" data-toggle="modal" data-target="#data_Modal1" class="btn btn-xs btn-danger hapus"/>
                                                    </td>
                                                </tr>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Seminar</h5>
			</div>
			<div class="modal-body">
				<div class="card-content">
                <form action="SeminarF.php" method="POST" role="form">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">face</i>
						</span>
						<div class="form-group label-floating">
							<label class="control-label">Nama Seminar</label>
							<input type="text" class="form-control" name ="seminar" autocomplete="off">
							</div>
						</div>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">date_range</i>
							</span>
							<div class="form-group label-floating">
								<label class="control-label">Tanggal Seminar</label>
								  <input type="text" class="form-control datetimepicker" value="21/06/2018"/  name="tanggal" autocomplete="off"/>
							<!--	<input type="date" class="form-control datepicker"  name="tanggal" autocomplete="off"/> -->
								</div>
							</div>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<div class="form-group label-floating">
									<label class="control-label">Keterangan</label>
									<input type="text" class="form-control" name ="keterangan" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" name="Submit" class="btn btn-primary">Simpan</button>
						</div>
                        </form>
					</div>
				</div>

                <div id="data_Modal" class="modal fade"> 
                <div class="modal-dialog">  
                <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Ubah Data Seminar</h4>  
                </div>  
                <div class="modal-body">
                <div id="detail"></div>  
                </div>
           </div>  
      </div>  
 </div> 
 <div id="data_Modal1" class="modal fade"> 
                <div class="modal-dialog">  
                <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Hapus Data Seminar</h4>  
                </div>  
                <div class="modal-body">
                <div id="detail1"></div>  
                </div>
           </div>  
      </div>  
 </div>  

</div>
</body>
<!--   Core JS Files   -->
<?php require '../Include/Js.php'; ?>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<!-- <script type="text/javascript">
    function send1() {
       var c = $("#id").val();
       alert(c);
    };
</script> -->
<script>  
 $(document).ready(function(){   
      $(document).on('click', '.edit_data', function(){  
           var sem_id = $(this).attr("id");
           $.ajax({  
                url:"ModalUpdate.php",  
                method:"POST",  
                data:{sem_id:sem_id},
                success:function(response){
                    $("#detail").html(response);
                }  
           });  
      });  
      $(document).on('click', '.hapus', function(){  
           var sem_id = $(this).attr("id");
           $.ajax({  
                url:"ModalHapus.php",  
                method:"POST", 
                data:{sem_id:sem_id},
                // dataType:"json",
                success:function(response){
                    $("#detail1").html(response);
                }  
           });  
      });  
 });

$('.datetimepicker').datetimepicker({
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    }
}); 
 </script>
</html>