<?php
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : "";
    
    $data = [
        'nama'          => $_POST['nama'],
        'email'         => $_POST['email'],
        'password'      => password_hash($_POST['pass'], PASSWORD_DEFAULT),
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama'         => $_POST['agama'],
        'hobi'          => $hobi,
        'alamat'        => $_POST['alamat'],
    ];

    // Simpan ke tabel users
    if ($db->insert('users', $data)) {
        echo "<script>alert('Berhasil!'); window.location='/sahrul1/artikel/index';</script>";
    } else {
        echo "Gagal menyimpan data.";
    }
}
?>

<div class="box">
    <h3>Tambah User Baru</h3>
    <form action="" method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="pass" required>

        <label>Jenis Kelamin</label>
        <input type="radio" name="jenis_kelamin" value="L" checked> Laki-laki
        <input type="radio" name="jenis_kelamin" value="P"> Perempuan

        <label style="display:block; margin-top:10px;">Agama</label>
        <select name="agama">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
        </select>

        <label style="display:block; margin-top:10px;">Hobi</label>
        <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
        <input type="checkbox" name="hobi[]" value="Coding"> Coding

        <label style="display:block; margin-top:10px;">Alamat</label>
        <textarea name="alamat" rows="3"></textarea>

        <div style="margin-top:20px; display: flex; gap: 10px;">
    <button type="submit" class="btn-biru">Simpan</button>
    <a href="/sahrul1/artikel/index" class="btn-batal">Batal</a>
</div>
    </form>
</div>

<style>
    .box { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    label { font-weight: bold; display: block; margin-top: 10px; }
    input[type="text"], input[type="email"], input[type="password"], select, textarea {
        width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;
    }
    /* Tombol Simpan */
    .btn-biru { 
        background: #3498db; 
        color: #fff; 
        border: none; 
        padding: 10px 20px; 
        border-radius: 5px; 
        cursor: pointer; 
        font-weight: bold;
    }
    .btn-biru:hover { background: #2980b9; }

    /* Tombol Batal */
    .btn-batal { 
        background: #e74c3c; 
        color: #fff; 
        text-decoration: none; 
        padding: 10px 20px; 
        border-radius: 5px; 
        display: inline-block;
        font-weight: bold;
    }
    .btn-batal:hover { background: #c0392b; }
</style>