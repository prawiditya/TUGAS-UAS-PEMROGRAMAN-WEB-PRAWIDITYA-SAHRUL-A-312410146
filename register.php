<?php
/**
 * Nama File: register.php
 * Deskripsi: Halaman pendaftaran user baru dengan tampilan modern.
 */

$db = new Database();

if (isset($_POST['submit'])) {
    $username = $db->conn->real_escape_string($_POST['username']);
    $nama = $db->conn->real_escape_string($_POST['nama']);
    $email = $db->conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Cek apakah username sudah ada
    $cek_user = $db->get('users', "username = '{$username}'");
    
    if ($cek_user) {
        $error = "Username sudah digunakan!";
    } else {
        $data = [
            'username' => $username,
            'nama'     => $nama,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $simpan = $db->insert('users', $data);

        if ($simpan) {
            echo "<script>
                    alert('Pendaftaran berhasil! Silakan login.');
                    window.location.href = '/sahrul1/user/login';
                  </script>";
            exit();
        } else {
            $error = "Gagal mendaftar. Silakan coba lagi.";
        }
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <h3>Daftar Akun</h3>
            <p>Lengkapi data untuk mendaftar</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error-msg">
                <i class="fa-solid fa-circle-exclamation"></i> <?= $error; ?>
            </div>
        <?php endif; ?>
        
        <form action="" method="post">
            <div class="input-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-user field-icon"></i>
                    <input type="text" name="username" required placeholder="username_anda">
                </div>
            </div>

            <div class="input-group">
                <label>Nama Lengkap</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-id-card field-icon"></i>
                    <input type="text" name="nama" required placeholder="Nama Lengkap">
                </div>
            </div>

            <div class="input-group">
                <label>Email</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-envelope field-icon"></i>
                    <input type="email" name="email" required placeholder="email@contoh.com">
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock field-icon"></i>
                    <input type="password" name="password" id="password" required placeholder="••••••••">
                    <i class="fa-regular fa-eye toggle-icon" id="togglePassword"></i>
                </div>
            </div>

            <button type="submit" name="submit" class="btn-login">
                Daftar Sekarang <i class="fa-solid fa-user-plus"></i>
            </button>
            
            <div class="login-footer">
                Sudah punya akun? <a href="/sahrul1/user/login">Login di sini</a>
            </div>
        </form>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>

<style>
    :root {
        --primary: #3b82f6;
        --primary-hover: #2563eb;
        --text-main: #1f2937;
        --text-muted: #6b7280;
        --bg-body: #f3f4f6;
        --bg-card: #ffffff;
        --border: #e5e7eb;
    }

    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-body);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px 0;
    }

    .login-box { 
        width: 100%;
        max-width: 400px; 
        padding: 40px; 
        background: var(--bg-card); 
        border-radius: 16px; 
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    }

    .login-header { text-align: center; margin-bottom: 25px; }
    .login-header h3 { margin: 0; font-size: 24px; font-weight: 600; }
    .login-header p { margin: 8px 0 0; font-size: 14px; color: var(--text-muted); }

    .error-msg {
        background-color: #fef2f2;
        color: #dc2626;
        padding: 12px;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #fee2e2;
    }

    .input-group { margin-bottom: 15px; }
    .input-group label { display: block; margin-bottom: 6px; font-size: 14px; font-weight: 500; }

    .input-wrapper { position: relative; display: flex; align-items: center; }

    .field-icon {
        position: absolute;
        left: 14px;
        color: var(--text-muted);
        font-size: 14px;
        width: 16px;
        text-align: center;
    }

    .input-wrapper input { 
        width: 100%; 
        padding: 11px 14px 11px 42px; 
        border: 1px solid var(--border); 
        border-radius: 10px; 
        font-size: 14px;
        outline: none;
        transition: all 0.2s;
    }

    .input-wrapper input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }

    .toggle-icon { position: absolute; right: 14px; cursor: pointer; color: var(--text-muted); font-size: 14px; }

    .btn-login { 
        width: 100%; 
        padding: 12px; 
        background: var(--primary); 
        color: white; 
        border: none; 
        border-radius: 10px; 
        cursor: pointer; 
        font-weight: 600;
        font-size: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
    }
    
    .btn-login:hover { background: var(--primary-hover); }

    .login-footer { text-align: center; margin-top: 20px; font-size: 14px; color: var(--text-muted); }
    .login-footer a { text-decoration: none; color: var(--primary); font-weight: 600; }
</style>