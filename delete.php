<?php
  include_once "init.php";

  // Mengambil nilai dari parameter id_pengaduan di url (delete.php?id_pengaduan=1)
  $id_pengaduan = $_GET["id_pengaduan"];

  $deleted = $Pengaduan->deletePengaduan($id_pengaduan);

  // Method deletePengaduan menghasilkan value true atau false
  // Kita bisa mengeceknya dengan cara berikut

  if ($deleted) {
    // Jika hasilnya true
    echo "Berhasil dihapus <a href='index.php'>Kembali</a>";
  } else {
    // Jika hasilnya false
    echo "Gagal dihapus";
  }


?>