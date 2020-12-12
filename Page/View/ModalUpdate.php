<?php
require '../Include/Connect/Connections.php';
if(isset($_POST["sem_id"]))  
{
    $id = base64_decode($_POST["sem_id"]);
    // echo $id;
    $query ="SELECT * FROM seminar where id_seminar ='$id'";
    $data  = $con->query($query);
    // echo 'Error : '.mysqli_error($con);
    While ($row = mysqli_fetch_object($data))
    {
        ?>
<form action="Update.php" method="POST" role="form">
<div class="input-group">
	<span class="input-group-addon">
		<i class="material-icons">face</i>
	</span>
	<div class="form-group label-floating">
		<label class="control-label">Nama Seminar</label>
		<input type="text" class="form-control" name ="seminar" value ="<?php echo $row->nama_seminar; ?>" autocomplete="off">
		<input type="hidden" class="form-control" name ="sem_id" value ="<?php echo base64_encode($row->id_seminar); ?>" autocomplete="off">
		</div>
	</div>
	<div class="input-group">
		<span class="input-group-addon">
			<i class="material-icons">date_range</i>
		</span>
		<div class="form-group label-floating">
			<label class="control-label">Tanggal Seminar</label>
			<input type="text" class="form-control datepicker"  name="tanggal" value ="<?php echo $row->tgl_pelaksana; ?>" autocomplete="off"/>
			</div>
		</div>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="material-icons">lock_outline</i>
			</span>
			<div class="form-group label-floating">
				<label class="control-label">Keterangan</label>
				<input type="text" class="form-control" name ="keterangan" value ="<?php echo $row->keterangan; ?>" autocomplete="off">
				</div>
			</div>
		</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	<button type="submit" name="Submit" class="btn btn-primary">Simpan</button>
</div>
</form>
<?php 
    }

} else if (isset($_POST["pes"])){	
	$id = base64_decode($_POST["pes"]);
    $query ="SELECT bukti_byr, status,id_pendaftaran FROM pendaftaran_seminar where id_pendaftaran ='$id'";
	$data  = $con->query($query);
	// echo $query;
    //echo 'Error : '.mysqli_error($con);
    While ($row = mysqli_fetch_object($data)){
		$status = $row->status;
?>
<form action="Update.php" method="POST" role="form" enctype="multipart/form-data" >
<table>
        <tr>
            <td><h4 class="title" style="text-align:left; font-weight: bold;  ">Bukti Pembayaran </h4></td>
			<td><h4 class="title" style="text-align:center; font-weight: bold; ">:</td>
            <td style="color:blue;text-align:center;">
			<?php
			if(file_exists("../Include/Image/berkas/".$row->bukti_byr)){
				echo '<img style="width: 100%;
  height: auto;" src="../Include/Image/berkas/'.$row->bukti_byr.'">';
  echo '<input type ="hidden" name="old_berkas" value ="'.$row->bukti_byr.'"/>';
  echo '<div class="form-group label-floating">
  <label class="control-label">Upload Bukti Bayar</label>
  <div class="fileinput fileinput-new text-center" data-provides="fileinput">                                               
		  <span class="btn btn-round btn-rose btn-file">
			  <span class="fileinput-new">Bukti Bayar</span>
			  <span class="fileinput-exists">Change</span>
			  <input type="file" name="berkas" />
		  </span>
		  <br />
		  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
	  </div>
  </div>
  </div>
</div>';
			}else{
				echo '<h4 class="title" style="color:blue;text-align:left; font-weight: bold; ">File Bukti pembayaran tidak ada !</h4>';
				echo '<div class="form-group label-floating">
  <div class="fileinput fileinput-new text-center" data-provides="fileinput">                                               
		  <span class="btn btn-round btn-rose btn-file">
			  <span class="fileinput-new">Bukti Bayar</span>
			  <span class="fileinput-exists">Change</span>
			  <input type="file" name="berkas" />
		  </span>
		  <br />
		  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
	  </div>
  </div>
  </div>
</div>';
			}
			?></td>
        </tr>
        <tr>
            <td><h4 class="title" style="text-align:left; font-weight: bold;">Aktif </h4></td>
			<td><h4 class="title" style="text-align:center; font-weight: bold;">:</td>
            <td style="color:blue;text-align:center;"><input type='checkbox' class='form-control' name ='status' value ='true' <?php echo $status === 'false' ? 'none':'checked';?>>
<input type="hidden" class="form-control" name ="pes" value ="<?php echo base64_encode($row->id_pendaftaran); ?>" autocomplete="off"></td>
        </tr>
    </table>
<div class="input-group">
	<!-- <div class="form-group label-floating"> -->
	
		
	</div>
<!-- </div> -->
<div class="input-group">
	<!-- <div class="form-group label-floating"> -->

</div>
<!-- </div> -->


<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	<button type="submit" name="Submit1" class="btn btn-primary">Simpan</button>
</div>
</form>
<?php
	}
} else {

}
?>