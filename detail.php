<?php 
  include_once "init.php";

  // Mengambil nilai dari parameter id_pengaduan di url (delete.php?id_pengaduan=1)
  $id_pengaduan = $_GET["id_pengaduan"];

  // Digunakan di halaman untuk menampilkan data dari database
  $pengaduan = $Pengaduan->getOne($id_pengaduan);
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Data</title>
</head>
<body>

  <h1><?= $pengaduan->judul_pengaduan ?></h1>
  <p>
    <?= $pengaduan->isi_pengaduan ?>
  </p>

  <a href="index.php">Kembali</a>
</body>
</html>