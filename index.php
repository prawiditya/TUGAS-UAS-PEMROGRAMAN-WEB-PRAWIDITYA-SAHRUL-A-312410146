<?php
/**
 * File: module/artikel/index.php
 */
$db = new Database();
$sql = "SELECT * FROM users ORDER BY id DESC"; 
$result = $db->query($sql);
?>

<div class="content-header">
    <div class="header-info">
        <h3><i class="fa-solid fa-users" style="color: #3b82f6;"></i> Daftar User</h3>
        <p>Kelola data pengguna sistem di bawah ini.</p>
    </div>
    <a href="/sahrul1/artikel/tambah" class="btn-tambah-user">
        <i class="fa-solid fa-user-plus"></i> Tambah User
    </a>
</div>

<div class="table-container">
    <table class="table-mewah">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Agama</th>
                <th>Hobi</th>
                <th>Alamat</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><span class="badge-id">#<?= $row['id'] ?></span></td>
                        <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
                        <td><?= htmlspecialchars($row['email'] ?? '-') ?></td>
                        <td>
                            <?php if(($row['jenis_kelamin'] ?? '') == 'L'): ?>
                                <span class="gender-tag male"><i class="fa-solid fa-mars"></i> L</span>
                            <?php else: ?>
                                <span class="gender-tag female"><i class="fa-solid fa-venus"></i> P</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $row['agama'] ?? '-' ?></td>
                        <td><small><?= $row['hobi'] ?? '-' ?></small></td>
                        <td><?= htmlspecialchars($row['alamat'] ?? '-') ?></td>
                        <td>
                            <div class="action-group">
                                <a href="/sahrul1/artikel/ubah?id=<?= $row['id'] ?>" class="btn-aksi btn-ubah">
                                    <i class="fa-solid fa-pen-to-square"></i> Ubah
                                </a>
                                <a href="/sahrul1/artikel/hapus?id=<?= $row['id'] ?>" 
                                   class="btn-aksi btn-hapus" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus <?= addslashes($row['nama']) ?>?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="empty-state">
                        <i class="fa-solid fa-folder-open"></i>
                        <p>Belum ada data tersedia.</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    /* Header Styling */
    .content-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .header-info h3 { margin: 0; font-size: 22px; color: #1e293b; display: flex; align-items: center; gap: 10px; }
    .header-info p { margin: 5px 0 0; color: #64748b; font-size: 14px; }
    
    .btn-tambah-user { 
        background: #3b82f6; color: white; text-decoration: none; padding: 10px 18px; 
        border-radius: 10px; font-weight: 600; font-size: 14px; transition: 0.3s;
        display: flex; align-items: center; gap: 8px;
    }
    .btn-tambah-user:hover { background: #2563eb; transform: translateY(-2px); }

    /* Table Styling */
    .table-container {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        overflow: hidden;
        border: 1px solid #f1f5f9;
    }

    .table-mewah { width: 100%; border-collapse: collapse; }
    .table-mewah thead { background-color: #f8fafc; border-bottom: 2px solid #f1f5f9; }
    .table-mewah th { padding: 15px; text-align: left; color: #64748b; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; }
    .table-mewah td { padding: 15px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; color: #334155; font-size: 14px; }

    /* Badge & Tag */
    .badge-id { background: #f1f5f9; padding: 4px 8px; border-radius: 6px; font-family: monospace; color: #64748b; font-weight: bold; }
    .gender-tag { padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 700; }
    .male { background: #eff6ff; color: #3b82f6; }
    .female { background: #fdf2f8; color: #db2777; }

    /* Buttons inside Table */
    .action-group { display: flex; gap: 8px; }
    .btn-aksi {
        padding: 7px 12px;
        text-decoration: none;
        font-size: 12px;
        border-radius: 8px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .btn-ubah { background-color: #eff6ff; color: #3b82f6; }
    .btn-ubah:hover { background-color: #3b82f6; color: white; }

    .btn-hapus { background-color: #fef2f2; color: #ef4444; }
    .btn-hapus:hover { background-color: #ef4444; color: white; }

    .empty-state { text-align: center; padding: 50px !important; color: #94a3b8; }
    .empty-state i { font-size: 40px; margin-bottom: 10px; display: block; }
</style>