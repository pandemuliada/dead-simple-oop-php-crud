<?php

  // File ini ini berisi semua class yang akan dipakai
  // class Database dipanggil duluan 
  // Karena class selanjutnya meng-extend class Database agar method dan propertinya bisa digunakan di class selanjutnya (Pengaduan)
  include_once "class/Database.php";
  include_once "controller/Pengaduan.php";

  // Anggap saja class itu sebuah gambar
  // Kita tidak bisa menjalankan mobil jika hanya ada gambarnya (menjalankan mobil adalah method), jadi kita perlu membuat object berdasarkan gambar tersebut agar bisa menggunakan method yang ada
  // Membuat object dari sebuah class disebut "instansiasi" dalam OOP

  // Cata instansiasi
  // variabel - variabel ini akan menyimpan object dari class yang di instansiasi
  $DB = new Database();
  $Pengaduan = new Pengaduan();

  // Karena sudah di buatkan object maka sekarang kita bisa memanggil method method dari object tersebut dengan cara berikut
  // $DB->connect(), $DB->disconnect()
  // $Pengaduan->getAllPengaduan()
  // $Pengaduan->tambahPengaduan("Judul Pengaduan", "Isi Pengaduan")
  // $Pengaduan->updatePengaduan(1, "Judul Pengaduan Update", "Isi Pengaduan Update")
  // $Pengaduan->deletePengaduan(1)

  // Selanjutnya kita hanya perlu memanggil file "init.php" ini di halaman-halaman yang bersangkutan

  // Cek halaman index.php!