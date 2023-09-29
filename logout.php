<?php
session_start();

// Sisipkan koneksi.php
require 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Perbarui field last_logout pada database
    $currentDateTime = date('Y-m-d H:i:s');
    $updateQuery = "UPDATE users SET last_logout = '$currentDateTime' WHERE id = $userId";
    if ($connection->query($updateQuery) === TRUE) {
        // Berhasil memperbarui last_logout

        // Hapus sesi (logout)
        session_destroy();
        
        // Redirect ke halaman login atau halaman lain sesuai kebutuhan
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $updateQuery . "<br>" . $connection->error;
    }
} else {
    // Pengguna belum login, alihkan ke halaman login
    header("Location: login.php");
    exit;
}

// Tutup koneksi
$connection->close();
?>
