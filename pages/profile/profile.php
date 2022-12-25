
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  
  <title>
  Inventory
  </title>
  <?php include '../../includes/header.php' ?>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>

 <?php
    include '../../includes/sidebar.php';
 ?>


  <div class="main-content position-relative max-height-vh-100 h-100">
 
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../../assets/img/team-4.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Rusman Priadi
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Mahasiswa
              </p>
            </div>
          </div>
  
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
              
                <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Settings</button>
              </div>
               <!-- modal tambah data-->
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Edit biodata</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">


                    <?php
                    include "../../koneksi.php";

                    $nomor = mysqli_query($koneksi, "select kodeBarang from tblbarang order by kodeBarang desc");
                    $kdbarang = mysqli_fetch_array($nomor);
                    $kode = $kdbarang['kodeBarang'];


                    $urut = substr($kode, 8, 3);
                    $tambah = (int) $urut + 1;
                    $bulan = date("m");
                    $tahun = date("y");

                    if (strlen($tambah) == 1) {
                      $format = "BAR-" . $bulan . $tahun . "00" . $tambah;
                    } else if (strlen($tambah) == 2) {
                      $format = "BAR-" . $bulan . $tahun . "0" . $tambah;
                    } else {
                      $format = "BAR-" . $bulan . $tahun . $tambah;
                    }

                    $jumlah = 0;

                    ?>

                    <form method="POST" action="./aksiBarang.php">
                      <div class="row">
                        <div class="col ">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput1" value="<?php echo $format; ?>" id="kode-barang" name="kode_barang" placeholder="John" readonly>
                            <label for="floatingTextInput1">Kode Barang</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput2" placeholder="Smith" name="nama_barang" required>
                            <label for="floatingTextInput2">Nama Barang</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col mb-4">
                          <label for="floatingTextInput3">Jenis Barang</label>

                          <select class="form-select" aria-label="Default select example" name="jenis_barang">
                            <option value="">-- Pilih Jenis Barang --</option>
                            <?php

                            $sql = $koneksi->query("select * from jenisbarang order by id");
                            while ($row = $sql->fetch_assoc()) {
                              echo "<option value='$row[id].$row[jenisBarang]'>$row[jenisBarang]</option>";
                            }
                            ?>

                          </select>

                        </div>
                        <div class="col mb-4">

                          <label for="floatingTextInput4">Satuan</label>

                          <select class="form-select" aria-label="Default select example" name="satuan">
                            <option value="">-- Pilih Jenis Barang --</option>
                            <?php

                            $sql = $koneksi->query("select * from satuanbarang order by id");
                            while ($row = $sql->fetch_assoc()) {
                              echo "<option value='$row[id].$row[satuanBarang]'>$row[satuanBarang]</option>";
                            }
                            ?>

                          </select>

                        </div>
                      </div>
                      <div class="row">

                      <div class="col">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput2" placeholder="Smith" name="harga_modal" required>
                            <label for="floatingTextInput2">Harga Modal</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput2" placeholder="Smith" name="harga_jual" required>
                            <label for="floatingTextInput2">Harga Jual</label>
                          </div>
                        </div>
                      </div>
                      <div class="row ">

                        <div class="col mb-4">
                          <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="jumlah" value="<?php echo $jumlah; ?>" name="jumlah" readonly>
                            <label for="floatingTextInput5">Stock</label>
                          </div>
                        </div>

                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="simpan" class="btn btn-primary" name="bsimpan">Simpan</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- end modal tambah data-->
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" value="rusman.priadi">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" value="rusman20@mhs.akba.ac.id">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">First name</label>
                    <input class="form-control" type="text" value="Rusman">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name</label>
                    <input class="form-control" type="text" value="Priadi">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address</label>
                    <input class="form-control" type="text" value="Jl. Ishak dg Masikki">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">City</label>
                    <input class="form-control" type="text" value="Maros">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Country</label>
                    <input class="form-control" type="text" value="Indonesia">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No WA</label>
                    <input class="form-control" type="text" value="082194502220">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">About me</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me</label>
                    <input class="form-control" type="text" value="Manusia">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="../../assets/img/unitama.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <!-- <a href="javascript:;">
                    <img src="../assets/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white">
                  </a> -->
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-between">
                <a href="https://akba.ac.id/website/" class="btn btn-sm btn-info mb-0 d-none d-lg-block" target="_blank">AKBA</a>
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                <a href="https://unitama.ac.id/" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block" target="_black">UITAMA</a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
              </div>
            </div>
            <div class="card-body pt-0">
             
              <div class="text-center mt-4">
                <h5>
                  UNITAMA
                </h5>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Universitas Teknologi Akba Makassar
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Mahasiswa
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Teknik Informatika
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
 
  <?php include '../../includes/footer.php' ?>
</body>

</html>