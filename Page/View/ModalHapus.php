<?php
require '../Include/Connect/Connections.php';
if(isset($_POST["sem_id"]))  {
$id = base64_decode($_POST["sem_id"]);
// echo $id;
$query = "SELECT * FROM seminar WHERE id_seminar ='$id'";
$result = mysqli_query($con,$query);
// echo 'Error : '.mysqli_error($con);
        while ($row = mysqli_fetch_array($result)){
        ?>
        <form action="Delete.php" method="POST" role="form">
        <p style="font-weight: bold; font-weight: 900;"> Apakah Anda Yakin Menghapus <?php echo $row["nama_seminar"]; ?>  ? </p>
                <!-- <input type="text" class="form-control" name ="seminar" value ="" autocomplete="off" disabled \> -->
                <input type="text" class="form-control" name ="sem_id" value ="<?php echo $row["id_seminar"]; ?>" autocomplete="off">
       
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="Submit" class="btn btn-primary">Hapus</button>
        </div>
        </form>
        <?php

        }
} 
?>