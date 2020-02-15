<?php 
  include_once "init.php";


  $semua_pengaduan = $Pengaduan->getAllPengaduan(); // variabel $Pengaduan sudah dibuat di file "init.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Pengaduan</title>
</head>
<body>
  
  <a href="add.php">Tambah Data</a>

  <ul>
    <?php foreach ($semua_pengaduan as $pengaduan) : ?>
      <li>
        <div>
          <h3><?= $pengaduan->judul_pengaduan ?></h3>
          <p><?= $pengaduan->isi_pengaduan ?></p>
          <a href="detail.php?id_pengaduan=<?= $pengaduan->id_pengaduan ?>">Detail Data</a>
          <br>
          <a href="edit.php?id_pengaduan=<?= $pengaduan->id_pengaduan ?>">Ubah Data</a>
          <br>
          <a href="delete.php?id_pengaduan=<?= $pengaduan->id_pengaduan ?>">Hapus Data</a>
        </div>
      </li>
    <?php endforeach ?>
  </ul>

</body>
</html>