<?php
require '../Include/Connect/Connections.php';
if(isset($_POST['Submit'])){
   $id = base64_decode($_POST["sem_id"]);
   $date = date('Y-m-d', strtotime($_POST['tanggal']));
   $query ="DELETE FROM seminar where id_seminar ='$id'";
   $delete = mysqli_query($con,$query);
   if($delete){
           header("location:../View/Seminar.php");
       } else {
        //    echo $query." ". "<br>";
        //    echo 'Error : '.mysqli_error($con);
       }
} else {
//    echo "Kosong";
}
?>