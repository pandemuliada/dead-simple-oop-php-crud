<?php 
  include_once "init.php";

  // Mengambil nilai dari parameter id_pengaduan di url (delete.php?id_pengaduan=1)
  $id_pengaduan = $_GET["id_pengaduan"];

  // Digunakan di form untuk menampilkan data dari database
  $pengaduan = $Pengaduan->getOne($id_pengaduan);
  

  // Dijalankan jika tag html dengan name="add" di klik
  // Dalam hal ini adalah button tambah
  if (isset($_POST["update"])) {
    $judul_pengaduan = $_POST["judul_pengaduan"];
    $isi_pengaduan = $_POST["isi_pengaduan"];
  
    $updated = $Pengaduan->updatePengaduan($id_pengaduan, $judul_pengaduan, $isi_pengaduan);


    // Method tambahPengaduan() menghasilkan nilai true atau false
    // nilai tersebut akan disimpan di variabel $updated
    // Kemudia di cek dengan cara dibawah
    if ($updated) {
      // Jika true
      echo "Pengaduan berhasil diupdate <a href='index.php'>Lihat hasil</a>";
    } else {
      // Jika false
      echo "Pengaduan gagal diupdate";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
</head>
<body>
  
  <!-- Jika action kosong script yang digunakan berarti mengacu pada file ini sendiri -->
  <form action="" method="post">
    <label for="">Judul Pengaduan</label>
    <br>
    <input type="text" name="judul_pengaduan" value="<?= $pengaduan->judul_pengaduan ?>">
    
    <br>

    <label for="">Isi Pengaduan</label>
    <br>
    <textarea name="isi_pengaduan"><?= $pengaduan->isi_pengaduan ?></textarea>
    <br>
    <button type="submit" name="update">Update</button>
  </form>


</body>
</html>