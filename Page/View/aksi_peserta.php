<?php
require '../Include/Connect/Connections.php';

if (isset($_GET['id'])) {
   $id = $_GET['id'];

  // perintah hapus data berdasarkan id yang dikirimkan
  $q = $con->query("DELETE FROM pendaftaran_seminar WHERE id_pendaftaran = '$id'");

  // cek perintah
  if ($q) {
    // pesan apabila hapus berhasil
    echo "<script>alert('Data berhasil dihapus'); window.location.href='Peserta.php'</script>";
  } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data berhasil dihapus'); window.location.href='Peserta.php'</script>";
  }
} else {
  // jika mencoba akses langsung ke file ini akan diredirect ke halaman index
  header('Location:Peserta.php'); 
}