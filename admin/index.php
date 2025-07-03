<?php
include "header.php";
?>

<div class="container-fluid page-body-wrapper">
  <!-- sidebar -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Halaman Awal</span>
        </a>
      </li>
      <!--  -->
      <li class="nav-item nav-category">Dashboard</li>
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/transaksi.php">
          <i class="menu-icon mdi mdi-clipboard-text"></i>
          <span class="menu-title">Transaksi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/pelanggan.php">
          <i class="menu-icon mdi mdi-account"></i>
          <span class="menu-title">Pelanggan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/karyawan.php">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Karyawan</span>
        </a>
      </li>
      <!--  -->
      <!-- FIXME -->
      <li class="nav-item nav-category">Sistem Pendukung Keputusan</li>
      <li class="nav-item">
        <a class="nav-link" href="alternatif.php">
          <i class="menu-icon mdi mdi-format-list-bulleted"></i>
          <span class="menu-title">Alternatif</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kriteria.php">
          <i class="menu-icon mdi mdi-playlist-plus"></i>
          <span class="menu-title">Kriteria</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="nilai.php">
          <i class="menu-icon mdi mdi-check-all"></i>
          <span class="menu-title">Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="metode.php">
          <i class="menu-icon mdi mdi-chart-bar"></i>
          <span class="menu-title">Metode</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hasil.php">
          <i class="menu-icon mdi mdi-crown"></i>
          <span class="menu-title">Hasil</span>
        </a>
      </li>
      <li class="nav-item mt-5">
        <a class="nav-link" href="logout.php">
          <i class="menu-icon mdi mdi-logout-variant"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
      <!-- FIXME -->

    </ul>
  </nav>
  <!-- end sidebar -->

  <!-- CONTENT -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="row flex-grow">
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded table-darkBGImg">
              <div class="card-body">
                <div class="col-lg-8">
                  <h3 class="text-white upgrade-info mb-0"> Selamat Datang, <span class="fw-bold">Admin</span></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-lg-12 d-flex flex-column">
          <div class="row flex-grow">
            <div class="col-md-4 col-lg-4 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title card-title-dash">Transaksi</h4>
                        <div class="add-items d-flex mb-0">
                          <a href="../dashboard/transaksi.php" class="btn btn-primary">+</a>
                        </div>
                      </div>
                      <div class="list-wrapper">
                        <ul class="todo-list todo-list-rounded">
                          <li class="d-block">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Penjualan Beras</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted"> 20 November 2024</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="d-block">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Penjualan Beras</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">26 November 2024</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Pembelian Beras</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">3 Desember 2024</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="border-bottom-0">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Pembelian Beras</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">5 Desember 2024</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- pelanggan -->
            <div class="col-md-4 col-lg-4 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title card-title-dash">Pelanggan</h4>
                        <div class="add-items d-flex mb-0">
                        <a href="../dashboard/pelanggan.php" class="btn btn-primary">+</a>
                        </div>
                      </div>
                      <div class="list-wrapper">
                        <ul class="todo-list todo-list-rounded">
                          <li class="d-block">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">Ibu Listi</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-tag text-muted me-1"></i>
                                    <p class="mb-0 text-muted">Cisoka, Balaraja</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="d-block">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">Bapak Amirudin</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-tag text-muted me-1"></i>
                                    <p class="mb-0 text-muted">Kp. Kepuh, Balaraja</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">Bapak Komar</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-tag text-muted me-1"></i>
                                    <p class="mb-0 text-muted">Cangkudu, Balaraja</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="border-bottom-0">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-bold">Bapak Saef</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-tag text-muted me-1"></i>
                                    <p class="mb-0 text-muted">Pasir Bolang, Tigaraksa</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end pelanggan -->
            <!-- pegawai -->
            <div class="col-md-4 col-lg-4 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title card-title-dash">Karyawan</h4>
                        <div class="add-items d-flex mb-0">
                          <a href="../dashboard/karyawan.php" class="btn btn-primary">+</a>
                        </div>
                      </div>
                      <div class="list-wrapper">
                        <ul class="todo-list todo-list-rounded">
                          <li class="d-block">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Sarmada</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-account text-muted me-1"></i>
                                    <div class="badge badge-opacity-success me-3">Aktif</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="d-block">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Ahmad Letto</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-account text-muted me-1"></i>
                                    <div class="badge badge-opacity-success me-3">Aktif</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Pian Andrian</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-account text-muted me-1"></i>
                                    <div class="badge badge-opacity-danger me-3">Tidak Aktif</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="border-bottom-0">
                            <div class="list align-items-center py-2">
                              <div class="wrapper w-100">
                                <p class="mb-2 fw-medium">Lintang Ramadhan</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center">
                                    <i class="mdi mdi-account text-muted me-1"></i>
                                    <div class="badge badge-opacity-danger me-3">Tidak Aktif</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end pegawai -->
          </div>
          <!--  -->
        </div>
      </div>
      <!--  -->

    </div>