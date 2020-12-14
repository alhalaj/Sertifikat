<!doctype html>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<head>
    <?php 
        require '../Include/lock.php';
        require '../Include/Header.php';
        require '../Include/Connect/Connections.php';
        if($_SESSION['status']!="Active"){
            header ('location:../../login.php');
            exit(); 
         } else{
             $level = $_SESSION['mylevel'];
             $user = $_SESSION['username'];
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
                        <?php
                        if($level === "Admin"){
                        ?>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">
                                    <button class="btn btn-primary btn-xs btn-twitter add_data"  
                                    data-toggle="modal" data-target="#data_Modal0">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            Peserta Seminar
                                    </h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">                                       
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Registrasi</th>
                                                    <th>Nama Peserta</th>
                                                    <th>Seminar</th>
                                                    <th>Tanggal Seminar</th>
                                                    <th>Tanggal daftar</th>
                                                    <th>Status</th>
                                                    <!-- <th>Bukti Upload</th> -->
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 $query = "SELECT ps.id_pendaftaran, ps.id_peserta, ps.tgl_daftar, ps.bukti_byr, ps.status, p.nama, s.nama_seminar, s.tgl_pelaksana 
                                                 FROM pendaftaran_seminar as ps 
                                                 LEFT JOIN peserta as p ON p.no_registrasi = ps.id_peserta 
                                                 LEFT JOIN seminar as s ON s.id_seminar = ps.id_seminar";
                                                 $data  = $con->query($query);
                                                 While ($row = mysqli_fetch_object($data))
                                                {
                                                    $name = $row->nama;
                                                    $status = $row->status;                                                   
                                                ?>
                                                <tr>
                                                    <td><?php echo $row->id_peserta; ?></td>
                                                    <td><?php echo $name; ?></td>
                                                    <td><?php echo $row->nama_seminar; ?></td>
                                                    <td><?php echo $row->tgl_pelaksana; ?></td>
                                                    <td><?php echo $row->tgl_daftar; ?></td>
                                                    <td><?php echo $status === 'false' ? "Belum Aktif" : "Aktif"; ?></td>
                                                    <td class="text-right">
                                                        <input type="button" name="edit" value="Edit" id="<?php echo base64_encode($row->id_pendaftaran); ?>" data-toggle="modal" data-target="#data_Modal" class="btn btn-info btn-xs edit_data" />
                                                    <input type="button" name = "delete" value ="Delete" id="<?php echo base64_encode($row->id_pendaftaran); ?>" data-toggle="modal" data-target="#data_Modal1" class="btn btn-xs btn-danger hapus"/>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                            <?php
                            }else{
                                ?>
                             <div class="card">
                                <div class="card-header card-header-primary" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                    <button type="button" class="btn btn-success btn-xs add_data_seminar" data-toggle="modal" data-target="#data_ModalUser">
                                        Ikut Seminar
                                    </button>
                                </div>
                                <div class="card-content">
                                    
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
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
                                                $query1 ="SELECT s.nama_seminar, s.tgl_pelaksana, ps.status FROM pendaftaran_seminar as ps 
                                                left join seminar as s ON s.id_seminar = ps.id_seminar 
                                                left join peserta as p ON p.no_registrasi = ps.id_peserta 
                                                where p.username = '$user'";
                                                $data1  = $con->query($query1);
                                                While ($row1 = mysqli_fetch_object($data1))
                                                {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1->nama_seminar; ?></td>
                                                    <td><?php echo $row1->tgl_pelaksana; ?></td>
                                                    <td><?php echo $row1->status== 'false' ? "Belum Diaktifasi":"Sudah Diaktifasi"; ?></td>
                                                    <td class="text-right">
                                                        <input type="button" name="edit" value="Edit" id="<?php echo base64_encode($row->id_pendaftaran); ?>" data-toggle="modal" data-target="#data_Modal" class="btn btn-info btn-xs edit_data" />
                                                    <input type="button" name = "delete" value ="Delete" id="<?php echo base64_encode($row->id_pendaftaran); ?>" data-toggle="modal" data-target="#data_Modal1" class="btn btn-xs btn-danger hapus"/>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                         <?php
                            }
                            ?>
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
    <?php
        if($level === "Admin"){
    ?>
    <!-- Modal Upadate -->
<div class="modal fade" id="data_Modal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Peserta</h5>
        </div>
        <div class="modal-body">
            <div class="card-content">
            <form action="SeminarF.php" method="POST" role="form" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">face</i>
                    </span>
                    <div class="form-group">
                        <label class="control-label">Nama Peserta</label>
                        <select name = "peserta" class="form-control dropdown-toggle" title ="Nama Peserta" id="exampleFormControlSelect1" require="true" autocomplete="off">
                            <option > Nama Peserta</option>
                            <?php
                            $query1 ="SELECT no_registrasi, nama FROM peserta";
                            $data1  = $con->query($query1);
                              While ($row1 = mysqli_fetch_object($data1))
                              {
                                  echo '<option value="'.$row1->no_registrasi.'">'.$row1->nama.' </option>';
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">face</i>
                    </span>
                    <div class="form-group label-floating">
                        <label class="control-label">Nama Seminar</label>
                        <select name ="seminar" class="form-control dropdown-toggle" title ="Nama Seminar" id="exampleFormControlSelect1" require="true" autocomplete="off">
                            <option > Nama Seminar</option>
                            <?php
                            $query1 ="SELECT id_seminar, nama_seminar FROM seminar";
                            $data1  = $con->query($query1);
                              While ($row1 = mysqli_fetch_object($data1))
                              {
                                  echo '<option value="'.$row1->id_seminar.'">'.$row1->nama_seminar.' </option>';
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                        <i class="material-icons">face</i>
                    </span>
                    <div class="form-group label-floating">
                        <label class="control-label">Upload Bukti Bayar</label>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">                                               
                                <span class="btn btn-round btn-rose btn-file">
                                    <span class="fileinput-new">Bukti Bayar</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="berkas" required="true" />
                                </span>
                                <br />
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="Submit1" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
    <div id="data_Modal" class="modal fade"> 
        <div class="modal-dialog">  
        <div class="modal-content">  
        <div class="modal-header d-block">  
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
            <h4 class="modal-title">Aktifasi Peserta</h4>  
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
            <h4 class="modal-title">Hapus Peserta</h4>  
        </div>  
        <div class="modal-body">
        <div id="detail1"></div>  
        </div>
    </div>  
    </div>  
</div> 

<?php
        } else{?>
            <div id="data_ModalUser" class="modal fade"> 
                <div class="modal-dialog">  
                <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Ikut Seminar</h4>  
                </div>  
                <div class="modal-body">
                <div id="detailseminar"></div>  
                </div>
                </div>  
                </div>  
            </div> 
<?php
        }    
    }
?> 
</body>
<!--   Core JS Files   -->
<?php require '../Include/Js.php'; ?>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<?php
if($level === "Admin"){
?>
<script>    
      $(document).on('click', '.edit_data', function(){  
           var sem_id = $(this).attr("id");
           $.ajax({  
                url:"ModalUpdate.php",  
                method:"POST",  
                data:{pes:sem_id},
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
 </script>
 <?php
} else { ?>
<script>
$(document).on('click', '.add_data_seminar', function(){  
           var sem_id = $(this).attr("id");
           $.ajax({  
                url:"DetailSeminar.php",  
                method:"POST", 
                data:{sem_id:sem_id},
                // dataType:"json",
                success:function(response){
                    $("#detailseminar").html(response);
                }  
           });  
      });    
</script>
<?php
}
 ?>
</html>
<?php
$con -> close();
?>
