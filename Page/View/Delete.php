<?php
require '../Include/Connect/Connections.php';
if(isset($_POST['Submit'])){
 //  $id = base64_decode($_POST["sem_id"]);
 $id = $_POST["sem_id"];
   //$date = date('Y-m-d', strtotime($_POST['tanggal']));
  // echo $_POST["sem_id"];
   $query ="DELETE FROM seminar where id_seminar ='$id'";
   $delete = mysqli_query($con,$query);
   if($delete){
	     echo "<script>alert('Seminar Berhasil didelete'); window.location.href='Seminar.php'</script>";
          // header("location:../View/Seminar.php");
       } else {
        //    echo $query." ". "<br>";
        //    echo 'Error : '.mysqli_error($con);
       }
} else {
    echo "Kosong";
}
?>