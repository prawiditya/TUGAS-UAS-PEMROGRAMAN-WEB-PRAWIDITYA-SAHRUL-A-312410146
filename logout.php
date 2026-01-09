<?php
/**
 * Nama File: logout.php
 * Deskripsi: Menghapus sesi dan keluar dari sistem.
 */

// Memulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menghapus semua variabel session
$_SESSION = array();

// Menghancurkan session
session_destroy();

// Redirect ke halaman login di folder sahrul1
header("Location: /sahrul1/user/login");
exit();
?>