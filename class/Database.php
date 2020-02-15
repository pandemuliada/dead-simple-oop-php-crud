<?php

  class Database
  {
    // Property dari sebuah class
    // protected => properti dapat dipakai oleh class lain yang di-extend dengan class ini (Database)
    // private => properti hanya bisa dipakai di kelas ini
    // public => bisa dipakai oleh semua
    protected $connection = null;
    private $server = "localhost";
    private $user = "root";
    private $password = "root"; // Inget ganti ini sesuai passwordmu
    private $database = "simple_crud_oop";


    // Fungsi untuk connect dari database
    public function connect()
    {
      // Script "PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ" optional, bisa ditambahkan bisa tidak
      // Kenapa saya menggunakan ini ?
      // Agar nanti saya bisa melakukan hal seperti berikut
      /* 
        ==================================================
        $barang['nama_barang'] => i don't like it!
        
        $barang->nama_barang => yeah, i love it ~
        ==================================================
      */
       $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Berfungsi untuk menampilkan apa yang error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ];

      // Blok try-catch berfungsi sesuai namanya
      // Kita try (mencoba) untuk koneksi ke database, jika berhasil kita akan terkoneksi ke database
      // Jika gagal maka akan di-catch (tangkap) errornya
      try {
        // Untuk memanggil property dari sebuah class, kita memakai keyword "$this->nama_property"
        $this->connection = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password, $options);
        return $this->connection;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    // Fungsi untuk disconnect dari database
    public function disconnect()
    {
      $this->connection = null;
    }
  }
  