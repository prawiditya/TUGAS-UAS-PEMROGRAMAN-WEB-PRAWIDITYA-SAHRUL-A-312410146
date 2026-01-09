<?php
/**
 * File: module/artikel/hapus.php
 */
$db = new Database();
// Memastikan ID ada dan mengamankannya (mencegah SQL Injection sederhana)
$id = isset($_GET['id']) ? $db->conn->real_escape_string($_GET['id']) : null;

if ($id) {
    $delete = $db->delete('users', "id='{$id}'");
    if ($delete) {
        // Alamat redirect diubah menjadi /sahrul1/ sesuai permintaan sebelumnya
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = '/sahrul1/artikel/index';
              </script>";
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    // Jika ID tidak ditemukan, kembalikan ke halaman utama
    echo "<script>
            window.location.href = '/sahrul1/artikel/index';
          </script>";
}
?>