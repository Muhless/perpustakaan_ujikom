<!-- sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item nav-category">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_path; ?>/pages/index.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Halaman Awal</span>
            </a>
        </li>
        <!-- <li class="nav-item">
      <a class="nav-link" href="<?php echo $base_path; ?>/pages/karyawan.php">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Karyawan</span>
      </a>
    </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_path; ?>/pages/anggota.php">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Anggota</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_path; ?>/pages/buku.php">
                <i class="menu-icon mdi mdi-book-open-variant"></i>
                <span class="menu-title">Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_path; ?>/pages/peminjaman.php">
                <i class="menu-icon mdi mdi-book-arrow-right"></i>
                <span class="menu-title">Peminjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_path; ?>/pages/pengembalian.php">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Pengembalian</span>
            </a>
        </li>

        <li class="nav-item mt-5">
            <a class="nav-link" href="<?php echo $base_path; ?>/logout.php">
                <i class="menu-icon mdi mdi-logout-variant"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>