<aside>
    <div class="sidebar-box">
        <h4 class="sidebar-title">Main Menu</h4>
        <ul class="sidebar-menu">
            <li>
                <a href="/sahrul1/artikel/dashboard" class="menu-item">
                    <i class="fa-solid fa-chart-line icon"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="/sahrul1/artikel/index" class="menu-item">
                    <i class="fa-regular fa-folder-open icon"></i>
                    <span class="text">Daftar User</span>
                </a>
            </li>
            <li>
                <a href="/sahrul1/artikel/tambah" class="menu-item">
                    <i class="fa-solid fa-circle-plus icon"></i>
                    <span class="text">Tambah User</span>
                </a>
            </li>

            <li class="menu-divider"></li>

            <li>
                <a href="/sahrul1/user/profile" class="menu-item">
                    <i class="fa-regular fa-user icon"></i>
                    <span class="text">Profil Saya</span>
                </a>
            </li>
            <li>
                <a href="/sahrul1/user/logout" class="menu-item logout-item" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fa-solid fa-right-from-bracket icon"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-info">
        <p><i class="fa-solid fa-shield-halved"></i> <strong>Status:</strong> Administrator</p>
        <p><i class="fa-solid fa-flask"></i> <strong>Lab:</strong> Pemrograman Web</p>
    </div>
</aside>

<style>
    .sidebar-box {
        background: #ffffff;
        border-radius: 15px;
        padding: 10px;
    }

    .sidebar-title {
        font-size: 11px;
        text-transform: uppercase;
        color: #94a3b8;
        letter-spacing: 1.5px;
        margin: 10px 0 15px 10px;
        font-weight: 700;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        text-decoration: none;
        color: #475569; /* Warna abu-abu gelap yang elegan */
        font-weight: 500;
        transition: all 0.2s ease;
        border-radius: 10px;
        margin-bottom: 4px;
    }

    /* Hover effect: Memberikan warna biru lembut hanya pada ikon dan teks, bukan background solid */
    .menu-item:hover {
        background: #f1f5f9;
        color: #3b82f6;
    }

    .menu-item .icon {
        width: 30px;
        font-size: 18px;
        color: #64748b; /* Warna ikon default */
        transition: color 0.2s ease;
    }

    .menu-item:hover .icon {
        color: #3b82f6;
    }

    .menu-divider {
        height: 1px;
        background: #f1f5f9;
        margin: 15px 10px;
    }

    .logout-item:hover {
        background: #fff1f2 !important;
        color: #e11d48 !important;
    }

    .logout-item:hover .icon {
        color: #e11d48 !important;
    }

    .sidebar-info {
        margin-top: 20px;
        padding: 18px;
        background: #1e293b;
        color: white;
        border-radius: 15px;
        font-size: 12px;
    }

    .sidebar-info p {
        margin: 8px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>