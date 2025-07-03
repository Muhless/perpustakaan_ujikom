<?php
include 'header.php';
?>

<!-- TODO: DROPDOWN -->
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:../../partials/_sidebar.html -->
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
      <li class="nav-item">
        <a class="nav-link mt-5" href="logout.php">
          <i class="menu-icon mdi mdi-logout-variant"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- content -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Metode</h2>
              <div class="row">
                <!-- TODO -->
                <div class="container">
                  <div class="panel panel-container">
                    <div class="bootstrap-table">
                      <!-- nilai keputusan -->
                      <h4 class="mt-3">Nilai Keputusan</h4>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Alternatif</th>
                              <?php
                              $tabel = "SELECT * FROM tbl_kriteria";
                              $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                              while ($b = mysqli_fetch_array($query)) {
                                echo "<th class='text-center'>$b[nama_kriteria]</th>";
                              }
                              ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                            $no = 1;
                            while ($a = mysqli_fetch_array($data)) {
                            ?>
                              <tr>
                                <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];

                                echo "
                            <td class='text-center'>$nomor</td>
                            <td class='text-center'>$nama</td>
                            ";

                                $query1 = mysqli_query($koneksi, "SELECT a.nama_subkriteria as sub FROM tbl_subkriteria a, tbl_nilai b 
                            WHERE b.id_alternatif='" . $kode . "' AND a.id_subkriteria=b.id_subkriteria ORDER BY b.id_kriteria");

                                while ($result = mysqli_fetch_array($query1)) {
                                  echo "<td class='text-center'>$result[sub]</td>";
                                }
                                ?>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <!--  -->

                      <!--  -->
                      <h4 class="mt-5">Konversi Nilai Keputusan</h4>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Alternatif</th>
                              <?php
                              $tabel = "SELECT * FROM tbl_kriteria";
                              $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                              while ($b = mysqli_fetch_array($query)) {
                                echo "<th class='text-center'>$b[nama_kriteria]</th>";
                              }
                              ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                            $no = 1;
                            while ($a = mysqli_fetch_array($data)) {
                            ?>
                              <tr>
                                <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];

                                echo "
                            <td class='text-center'>$nomor</td>
                            <td class='text-center'>$nama</td>
                            ";

                                $query1 = mysqli_query($koneksi, "SELECT a.nilai_subkriteria as sub FROM tbl_subkriteria a, tbl_nilai b 
                            WHERE b.id_alternatif='" . $kode . "' AND a.id_subkriteria=b.id_subkriteria ORDER BY b.id_kriteria");

                                while ($result = mysqli_fetch_array($query1)) {
                                  echo "<td class='text-center'>$result[sub]</td>";
                                }
                                ?>
                              </tr>
                            <?php } ?>
                          </tbody>
                          <!--  -->
                          <tr>
                            <td colspan="2">Benefit/Cost</td>
                            <?php
                            $tabel = "SELECT tipe_kriteria FROM tbl_kriteria";
                            $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                            while ($b = mysqli_fetch_array($query)) {
                              echo "<td class='text-center'><b>$b[tipe_kriteria]</b</td>";
                            }
                            ?>
                          </tr>
                          <tr>
                            <td colspan="2">Nilai Max</td>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria order by id_kriteria");
                            while ($b = mysqli_fetch_array($query)) {
                              $query1 = mysqli_query($koneksi, "SELECT MAX(s.nilai_subkriteria) as nmax 
                            FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='" . $b['id_kriteria'] . "'
                            AND s.id_subkriteria=kp.id_subkriteria");

                              $result1 = mysqli_fetch_array($query1);
                              echo "<td class='text-center'><b>$result1[nmax]</b></td>";
                            }
                            ?>
                          </tr>
                          <!--  -->
                          <tr>
                            <td colspan="2">Nilai Min</td>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria order by id_kriteria");
                            while ($b = mysqli_fetch_array($query)) {
                              $query1 = mysqli_query($koneksi, "SELECT Min(s.nilai_subkriteria) as nmin 
                            FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='" . $b['id_kriteria'] . "'
                            AND s.id_subkriteria=kp.id_subkriteria");

                              $result1 = mysqli_fetch_array($query1);
                              echo "<td class='text-center'><b>$result1[nmin]</b></td>";
                            }
                            ?>
                          </tr>
                        </table>
                      </div>
                      <!--  -->
                      <h4 class="mt-5">Normalisasi Matriks</h4>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Alternatif</th>
                              <?php
                              $tabel = "SELECT * FROM tbl_kriteria";
                              $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                              while ($b = mysqli_fetch_array($query)) {
                                echo "<th class='text-center'>$b[nama_kriteria]</th>";
                              }
                              ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                            $no = 1;
                            while ($a = mysqli_fetch_array($data)) {
                            ?>
                              <tr>
                                <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];

                                echo "
                            <td class='text-center'>$nomor</td>
                            <td class='text-center'>$nama</td>
                            ";

                                $query1 = mysqli_query(
                                  $koneksi,
                                  "SELECT s.nilai_subkriteria as sub, kp.id_kriteria as id_kriteria, k.tipe_kriteria as atribut
                            FROM tbl_subkriteria s, tbl_nilai kp, tbl_kriteria k
                            WHERE kp.id_alternatif='" . $kode . "' AND 
                            s.id_subkriteria=kp.id_subkriteria AND
                            k.id_kriteria=kp.id_kriteria ORDER BY kp.id_kriteria"
                                );

                                while ($result = mysqli_fetch_array($query1)) {
                                  // NILAI MAX
                                  $query2 = mysqli_query($koneksi, "SELECT MAX(s.nilai_subkriteria) as nmax 
                                FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='" . $result['id_kriteria'] . "'
                                AND s.id_subkriteria=kp.id_subkriteria");
                                  $result2 = mysqli_fetch_array($query2);
                                  $tmax = $result2['nmax'];

                                  // NILAI MIN
                                  $query3 = mysqli_query($koneksi, "SELECT MIN(s.nilai_subkriteria) as nmin 
                                FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='" . $result['id_kriteria'] . "'
                                AND s.id_subkriteria=kp.id_subkriteria");
                                  $result3 = mysqli_fetch_array($query3);
                                  $tmin = $result3['nmin'];

                                  if ($result['atribut'] == 'Benefit') {
                                    $val = $result['sub'] / $tmax;
                                  } else {
                                    $val = $tmin / $result['sub'];
                                  }
                                  $val = round($val, 2);
                                  echo "<td class='text-center'>" . $val . "</td>";
                                }
                                ?>
                            <?php } ?>
                          </tbody>
                          </tr>
                              <td colspan="2">Bobot</td>
                              <?php
                              $tabel = "SELECT bobot_kriteria FROM tbl_kriteria";
                              $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                              while ($b = mysqli_fetch_array($query)) {
                                echo "<td class='text-center'><b>$b[bobot_kriteria]</b</td>";
                              }
                              ?>
                              </tr>
                        </table>
                      </div>
                      <!--  -->
                      <h4 class="mt-5">Nilai Preferensi</h4>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Alternatif</th>
                              <?php
                              $tabel = "SELECT * FROM tbl_kriteria";
                              $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                              while ($b = mysqli_fetch_array($query)) {
                                echo "<th class='text-center'>$b[nama_kriteria]</th>";
                              }
                              ?>
                              <th class="text-center">Nilai Vi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                            $no = 1;
                            while ($a = mysqli_fetch_array($data)) {
                              $vi = 0;
                            ?>
                              <tr>
                                <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];

                                echo "
                            <td class='text-center'>$nomor</td>
                            <td class='text-center'>$nama</td>
                            ";

                                $query1 = mysqli_query(
                                  $koneksi,
                                  "SELECT s.nilai_subkriteria as sub, kp.id_kriteria as id_kriteria, k.tipe_kriteria as atribut
                            FROM tbl_subkriteria s, tbl_nilai kp, tbl_kriteria k
                            WHERE kp.id_alternatif='" . $kode . "' AND 
                            s.id_subkriteria=kp.id_subkriteria AND
                            k.id_kriteria=kp.id_kriteria ORDER BY kp.id_kriteria"
                                );

                                while ($result = mysqli_fetch_array($query1)) {
                                  // NILAI MAX
                                  $query2 = mysqli_query($koneksi, "SELECT MAX(s.nilai_subkriteria) as nmax 
                                FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='" . $result['id_kriteria'] . "'
                                AND s.id_subkriteria=kp.id_subkriteria");
                                  $result2 = mysqli_fetch_array($query2);
                                  $tmax = $result2['nmax'];

                                  // NILAI MIN
                                  $query3 = mysqli_query($koneksi, "SELECT MIN(s.nilai_subkriteria) as nmin 
                                FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='" . $result['id_kriteria'] . "'
                                AND s.id_subkriteria=kp.id_subkriteria");
                                  $result3 = mysqli_fetch_array($query3);
                                  $tmin = $result3['nmin'];

                                  if ($result['atribut'] == 'Benefit') {
                                    $val = $result['sub'] / $tmax;
                                  } else {
                                    $val = $tmin / $result['sub'];
                                  }
                                  $val = round($val, 2);
                                  // memanggil nilai bobot
                                  $query4 = mysqli_query($koneksi, "SELECT bobot_kriteria FROM tbl_kriteria 
                                WHERE id_kriteria='" . $result['id_kriteria'] . "'");
                                  $result4 = mysqli_fetch_array($query4);
                                  // normalisasi bobot
                                  $bobot_k = $result4['bobot_kriteria'] / 100;
                                  // perkalian bobot
                                  $valbobot = ($val * $bobot_k);
                                  $nbobot = round($valbobot, 2);
                                  $vi += $valbobot;
                                  $nvi = number_format($vi, 2);
                                  echo "<td class='text-center'>" . $nbobot . "</td>";
                                }
                                echo "<td class='text-center'>" . $nvi . "</td>";

                                mysqli_query($koneksi, "UPDATE tbl_alternatif set nilai_saw='$vi'
                            WHERE id_alternatif='$a[id_alternatif]'");
                                ?>
                              </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                        <div class="d-flex justify-content-end mx-3">
                          <a href="hasil.php" class="mt-4 btn btn-success">
                            Selanjutnya
                            <i class="menu-icon mdi mdi-arrow-right-bold"></i>
                          </a>
                        </div>
                      </div>
                      <!--  -->
                      <?php
                      $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by nilai_saw DESC");
                      $rank = 1;
                      while ($b = mysqli_fetch_array($data)) {
                        mysqli_query($koneksi, "UPDATE tbl_alternatif set ranking='$rank' 
                                WHERE id_alternatif='$b[id_alternatif]'");
                        $rank++;
                      }
                      ?>
                      <!-- perankingan -->
                      <!-- <h4 class="mt-5">Perangkingan</h4>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Nama Alternatif</th>
                              <th class="text-center">Nilai SAW</th>
                              <th class="text-center">Ranking</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $tabel = "SELECT * FROM tbl_alternatif order by ranking";
                            $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                            $no = 1;
                            while ($a = mysqli_fetch_array($query)) {
                            ?>
                              <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $a['nama_alternatif']; ?></td>
                                <td class="text-center"><?php echo number_format($a['nilai_saw'], 2); ?></td>
                                <td class="text-center"><?php echo $a['ranking']; ?></td>
                              </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                        
                      </div> -->
                      <!-- end perankingan -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- TODO -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>