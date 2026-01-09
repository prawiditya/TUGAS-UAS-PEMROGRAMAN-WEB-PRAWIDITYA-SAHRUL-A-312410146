<?php
/**
 * Nama File: login.php
 */
if (isset($_POST['submit'])) {
    $database = new Database();
    $username = $database->conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $result = $database->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            header("Location: /sahrul1/artikel/index");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <h3>Selamat Datang</h3>
            <p>Silakan masuk ke akun Anda</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error-msg">
                <i class="fa-solid fa-circle-exclamation"></i> <?= $error; ?>
            </div>
        <?php endif; ?>
        
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-user field-icon"></i>
                    <input type="text" name="username" id="username" required placeholder="admin">
                </div>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock field-icon"></i>
                    <input type="password" name="password" id="password" required placeholder="••••••••">
                    <i class="fa-regular fa-eye toggle-icon" id="togglePassword"></i>
                </div>
            </div>

            <button type="submit" name="submit" class="btn-login">
                Masuk <i class="fa-solid fa-arrow-right"></i>
            </button>
            
            <div class="login-footer">
                Belum punya akun? <a href="/sahrul1/user/register">Daftar sekarang</a>
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
        
        // Toggle class ikon antara mata terbuka dan tertutup
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
        color: var(--text-main);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-box { 
        width: 100%;
        max-width: 400px; 
        padding: 40px; 
        background: var(--bg-card); 
        border-radius: 16px; 
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .login-header p {
        margin: 8px 0 0;
        font-size: 14px;
        color: var(--text-muted);
    }

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

    .input-group { margin-bottom: 20px; }
    
    .input-group label { 
        display: block; 
        margin-bottom: 6px; 
        font-size: 14px;
        font-weight: 500; 
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .field-icon {
        position: absolute;
        left: 14px;
        color: var(--text-muted);
        font-size: 14px;
        width: 16px; /* Memastikan lebar ikon konsisten */
        text-align: center;
    }

    .input-wrapper input { 
        width: 100%; 
        padding: 12px 14px 12px 42px; 
        border: 1px solid var(--border); 
        border-radius: 10px; 
        font-size: 15px;
        transition: all 0.2s ease-in-out;
        outline: none;
    }

    .input-wrapper input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }

    .toggle-icon {
        position: absolute;
        right: 14px;
        cursor: pointer;
        color: var(--text-muted);
        font-size: 16px;
        transition: color 0.2s;
    }

    .toggle-icon:hover {
        color: var(--primary);
    }

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
        transition: transform 0.1s, background 0.2s;
        margin-top: 10px;
    }
    
    .btn-login:active { transform: scale(0.98); }
    .btn-login:hover { background: var(--primary-hover); }

    .login-footer {
        text-align: center;
        margin-top: 24px;
        font-size: 14px;
        color: var(--text-muted);
    }

    .login-footer a {
        text-decoration: none; 
        color: var(--primary); 
        font-weight: 600;
    }
</style>