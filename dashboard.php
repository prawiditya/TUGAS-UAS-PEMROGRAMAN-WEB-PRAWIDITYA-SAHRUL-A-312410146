<?php
/**
 * File: module/artikel/dashboard.php
 * Deskripsi: Dashboard dengan sapaan nama user yang login.
 */

// Pastikan session sudah dimulai di file index utama, 
// Kita ambil nama dari session yang biasanya diset saat login
$nama_user = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Administrator';

$db = new Database();

// Cek keberadaan tabel untuk statistik
$total_artikel = 0;
$check_artikel = $db->conn->query("SHOW TABLES LIKE 'artikel'");
if ($check_artikel && $check_artikel->num_rows > 0) {
    $res_artikel = $db->query("SELECT COUNT(*) as total FROM artikel");
    $total_artikel = ($res_artikel) ? $res_artikel->fetch_assoc()['total'] : 0;
}

$total_user = 0;
$check_user = $db->conn->query("SHOW TABLES LIKE 'users'");
if ($check_user && $check_user->num_rows > 0) {
    $res_user = $db->query("SELECT COUNT(*) as total FROM users");
    $total_user = ($res_user) ? $res_user->fetch_assoc()['total'] : 0;
}
?>

<div class="dashboard-wrapper">
    <div class="welcome-banner">
        <div class="welcome-content">
            <div class="text-greet">
                <h1>Selamat Datang, <span class="user-name"><?= htmlspecialchars($nama_user) ?></span>! 👋</h1>
                <p>Senang melihat Anda kembali. Berikut adalah ringkasan performa sistem hari ini.</p>
            </div>
            <div class="welcome-img">
                <i class="fa-solid fa-laptop-code"></i>
            </div>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon bg-light-blue">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div class="stat-data">
                <span class="stat-label">Total Artikel</span>
                <h3 class="stat-value"><?= $total_artikel ?></h3>
            </div>
            <div class="stat-footer">
                <?php if ($check_artikel && $check_artikel->num_rows > 0): ?>
                    <a href="/sahrul1/artikel/index">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                <?php else: ?>
                    <span class="text-error"><i class="fa-solid fa-triangle-exclamation"></i> Tabel belum dibuat</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-light-green">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-data">
                <span class="stat-label">Total Pengguna</span>
                <h3 class="stat-value"><?= $total_user ?></h3>
            </div>
            <div class="stat-footer">
                <a href="/sahrul1/artikel/index">Kelola User <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-light-orange">
                <i class="fa-solid fa-server"></i>
            </div>
            <div class="stat-data">
                <span class="stat-label">Status Koneksi</span>
                <h3 class="stat-value connected">Connected</h3>
            </div>
            <div class="stat-footer">
                <span>DB: sahrul1 | PHP <?= phpversion(); ?></span>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-wrapper { padding: 5px; animation: fadeIn 0.5s ease-in-out; }
    
    /* Style Banner Selamat Datang */
    .welcome-banner {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        color: white;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }

    .welcome-content { display: flex; justify-content: space-between; align-items: center; position: relative; z-index: 1; }
    .text-greet h1 { font-size: 28px; margin: 0; font-weight: 700; }
    .user-name { color: #3b82f6; text-transform: capitalize; }
    .text-greet p { margin: 10px 0 0; opacity: 0.8; font-size: 15px; }
    .welcome-img { font-size: 60px; opacity: 0.2; transform: rotate(-15deg); }

    /* Grid Layout */
    .stats-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); 
        gap: 20px; 
    }

    .stat-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 25px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }

    .stat-card:hover { transform: translateY(-8px); box-shadow: 0 15px 30px -10px rgba(0,0,0,0.1); }

    .stat-icon {
        width: 50px; height: 50px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; margin-bottom: 20px;
    }

    .bg-light-blue { background: #eff6ff; color: #3b82f6; }
    .bg-light-green { background: #f0fdf4; color: #10b981; }
    .bg-light-orange { background: #fff7ed; color: #f59e0b; }

    .stat-label { font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.8px; }
    .stat-value { margin: 10px 0; font-size: 34px; color: #1e293b; font-weight: 800; }
    .stat-value.connected { font-size: 22px; color: #10b981; }

    .stat-footer {
        margin-top: 15px; padding-top: 15px;
        border-top: 1px solid #f8fafc;
        font-size: 13px; color: #94a3b8;
    }

    .stat-footer a { text-decoration: none; color: #3b82f6; font-weight: 700; display: flex; align-items: center; gap: 8px; transition: 0.2s; }
    .stat-footer a:hover { gap: 12px; }
    .text-error { color: #ef4444; font-weight: 500; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>