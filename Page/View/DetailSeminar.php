<?php
require '../Include/lock.php';
require '../Include/Connect/Connections.php';
if($_SESSION['status']!="Active"){
    header ('location:../../login.php');
    exit(); 
 } else{
     $username = $_SESSION['username'];
     $query = $con->query("SELECT no_registrasi FROM peserta WHERE username = '$username'");
     
     While ($row = mysqli_fetch_object($query)) {
         $id_peserta = $row->no_registrasi;         
     }
?>
<form action="SeminarF.php" method="POST" role="form" enctype="multipart/form-data">
    <div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">face</i>
    </span>
    <div class="form-group label-floating">
        <label class="control-label">Nama Seminar</label>
        <input type="hidden" class="form-control" name="peserta" value ="<?php echo $id_peserta;?>">
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
        <button type="submit" name="Submitp" class="btn btn-primary">Simpan</button>
    </div>
    </form>
<?php
 }
?>