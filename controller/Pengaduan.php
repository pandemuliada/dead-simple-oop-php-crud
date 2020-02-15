<?php 
  // Disini kita menggabungkan class Pengaduan dengan class Database
  // Sehingga class Pengaduan bisa menggunakan property dan method yang ada di class Database
  // Contoh properti => connection   
  // Contoh method => connect(), dissconnect()   

  // Kenapa classnya bisa di extend / bergabung ?
  // Karena kita memanggilnya (di-include) di file init.php

  class Pengaduan extends Database
  {
    // Method untuk mendapatkan semua data pengaduan
    public function getAllPengaduan()
    {
      $sql = "SELECT * FROM pengaduan";

      // Karena class Pengaduan sudah digabung dengan class Database maka kita bisa melakukan ini
      // Pertama kita melakukan koneksi ke database, kemudian kita meng-query syntax sql, setelah itu kita mengabil semua datanya
      $res =  $this->connect()->query($sql)->fetchAll();
      
      // Kemudian kita me-return responnya, yaitu semua data pengaduan untuk dipakai di halaman index
      return $res;

      // Setelah itu kita disconnect dari database, agar aplikasi tidak terbebani oleh koneksi yang tidak dipakai
      $this->disconnect();
    }

    // Method ini untuk menambah pengaduan
    // Method ini menerima 2 parameter, yaitu
    // pertama  => menerima judul dari pengaduan
    // kedua    => menerima isi dari pengaduan
    public function tambahPengaduan($judul_pengaduan, $isi_pengaduan)
    {
      // Jangan lupa ada tanda petik satu ('') di valuenya, biasanya sering salah disitu
      $sql = "INSERT INTO pengaduan (judul_pengaduan, isi_pengaduan) VALUES ('$judul_pengaduan', '$isi_pengaduan')";
      
      // Sedikit berbeda dari sebelumnya, disini kita menggunakan fungsi prepare
      $res = $this->connect()->prepare($sql)->execute();

      // Hasilnya adalah true atau false
      // Jika berhasil ditambahkan maka hasilnya true, jika tidak maka false 
      return $res;

      $this->disconnect();
    }
    
    // Method ini untuk mengupdate pengaduan
    // Method ini menerima 3 parameter, yaitu
    // pertama  => menerima id dari pengaduan yang akan di update
    // kedua    => menerima judul dari pengaduan
    // ketiga   => menerima isi dari pengaduan
    public function updatePengaduan($id_pengaduan, $judul_pengaduan, $isi_pengaduan)
    {
      // Jangan lupa ada tanda petik satu ('') di valuenya, biasanya sering salah disitu
      // Karena id_pengaduan di database adalah integer, maka tidak isi tanda petik satu tidak masalah
      $sql = "UPDATE pengaduan 
        SET 
          judul_pengaduan = '$judul_pengaduan',
          isi_pengaduan = '$isi_pengaduan'
        WHERE 
          id_pengaduan = $id_pengaduan";
      
      $res = $this->connect()->prepare($sql)->execute();

      // Hasilnya adalah true atau false
      // Jika berhasil diupdate maka hasilnya true, jika tidak maka false 
      return $res;

      $this->disconnect();
    }


    public function deletePengaduan($id_pengaduan)
    {
      $sql = "DELETE FROM pengaduan WHERE id_pengaduan = $id_pengaduan";

      $res = $this->connect()->prepare($sql)->execute();

      // Hasilnya adalah true atau false
      // Jika berhasil dihapus maka hasilnya true, jika tidak maka false 
      return $res;

      $this->disconnect();
    }

    public function getOne($id_pengaduan)
    {
      $sql = "SELECT * FROM pengaduan WHERE id_pengaduan = $id_pengaduan";

      $res = $this->connect()->query($sql)->fetch(); // Fetch hasilnya hanya satu data
      
      return $res;

      $this->disconnect();
    }

  }
  