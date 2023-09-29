<?php
$server = "localhost";  // Jika database berjalan pada server lokal
$username = "root";
$password = "";
$database = "db_biofarma";

// Buat koneksi
$connection = new mysqli($server, $username, $password, $database);

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}

// echo "Koneksi berhasil!";
?>
