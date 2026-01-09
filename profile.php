<?php
/**
 * Nama File: profile.php
 * Deskripsi: Menampilkan data profil user yang sedang login.
 */

// Pastikan user sudah login, jika tidak lempar ke halaman login
if (!isset($_SESSION['is_login'])) {
    header("Location: /sahrul1/user/login");
    exit();
}
?>

<div class="content-box">
    <h2>Profil Pengguna</h2>
    <hr>
    <table class="table-mewah">
        <tr>
            <td width="200"><strong>Nama Lengkap</strong></td>
            <td>: <?= htmlspecialchars($_SESSION['nama']); ?></td>
        </tr>
        <tr>
            <td><strong>Username</strong></td>
            <td>: <?= htmlspecialchars($_SESSION['username']); ?></td>
        </tr>
        <tr>
            <td><strong>Status Login</strong></td>
            <td>: <span style="color: green; font-weight: bold;">Aktif (Administrator)</span></td>
        </tr>
    </table>
    
    <div style="margin-top: 20px;">
        <a href="/sahrul1/artikel/index" class="btn-aksi btn-ubah" style="text-decoration: none; padding: 10px 20px;">Kembali ke Dashboard</a>
    </div>
</div>

<style>
    .content-box {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    
    .table-mewah {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .table-mewah td {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 10px;
    }
</style>