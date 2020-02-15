<?php 
  include_once "init.php";

  // Dijalankan jika tag html dengan name="add" di klik
  // Dalam hal ini adalah button tambah
  if (isset($_POST["add"])) {
    $judul_pengaduan = $_POST["judul_pengaduan"];
    $isi_pengaduan = $_POST["isi_pengaduan"];
  
    $added = $Pengaduan->tambahPengaduan($judul_pengaduan, $isi_pengaduan);


    // Method tambahPengaduan() menghasilkan nilai true atau false
    // nilai tersebut akan disimpan di variabel $added
    // Kemudia di cek dengan cara dibawah
    if ($added) {
      // Jika true
      echo "Pengaduan berhasil ditambahkan <a href='index.php'>Lihat hasil</a>";
    } else {
      // Jika false
      echo "Pengaduan gagal ditambahkan";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>
<body>
  
  <!-- Jika action kosong script yang digunakan berarti mengacu pada file ini sendiri -->
  <form action="" method="post">
    <label for="">Judul Pengaduan</label>
    <br>
    <input type="text" name="judul_pengaduan">
    
    <br>

    <label for="">Isi Pengaduan</label>
    <br>
    <textarea name="isi_pengaduan"></textarea>
    <br>
    <button type="submit" name="add">Tambah</button>
  </form>


</body>
</html>