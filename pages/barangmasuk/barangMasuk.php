<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">

  <title>
    Inventory
  </title>

  <?php include '../../includes/header.php' ?>


</head>

<body class="g-sidenav-show  bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <?php include '../../includes/sidebar.php' ?>



  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Barang Masuk</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Barang Masuk</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
          <a href="../../logout.php"  class="nav-link text-white font-weight-bold px-0" onclick=" return confirm('Are You sure you want to logout?');">
                
                <i class="fa-solid fa-rotate me-sm-1"></i>
                <span class="d-sm-inline d-none">Log Out</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Barang Masuk</h6>
              <div class="button_header">

                <button class="btn bg-gradient-warning  btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah+</button>

              </div>
            </div>
            <!-- modal tambah data-->
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Tambah data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">


                    <?php
                    include "../../koneksi.php";

                    $nomor = mysqli_query($koneksi, "select id_transaksi from barang_masuk order by id_transaksi desc");
                    $idtran = mysqli_fetch_array($nomor);
                    $kode = isset($idtran['id_transaksi'])? $idtran['id_transaksi'] : '';


                    $urut = substr($kode, 8, 3);
                    $tambah = (int) $urut + 1;
                    $bulan = date("m");
                    $tahun = date("y");

                    if (strlen($tambah) == 1) {
                      $format = "TRM-" . $bulan . $tahun . "00" . $tambah;
                    } else if (strlen($tambah) == 2) {
                      $format = "TRM-" . $bulan . $tahun . "0" . $tambah;
                    } else {
                      $format = "TRM-" . $bulan . $tahun . $tambah;
                    }



                    $tanggal_masuk = date("Y-m-d");



                    ?>

                    <!-- tambah -->
                    <form method="POST" action="./aksiMasuk.php" >
                      <div class="row">
                        <div class="col ">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput1" value="<?php echo $format; ?>" id="id-transaksi" name="id_transaksi" placeholder="John" readonly>
                            <label for="floatingTextInput1">Id Transaksi</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingTextInput2" value="<?php echo $tanggal_masuk; ?>" placeholder="Smith" name="tanggal_masuk" required>
                            <label for="floatingTextInput2">Tanggal</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col mb-3">
                          <label for="floatingTextInput3">Nama Barang</label>

                          <select class="form-select" aria-label="Default select example" id="cmb_barang" name="nama_barang">

                            <option value="">Pilih ...</option>
                            <?php

                            $sql = $koneksi->query("select * from tblbarang order by id");
                            while ($row = $sql->fetch_assoc()) {
                              echo "<option value='$row[kodeBarang].$row[namaBarang]'>$row[kodeBarang] | $row[namaBarang]</option>";
                            }
                            ?>

                          </select>

                        </div>

                        <div class="col mb-3">

                          <label for="floatingTextInput4">Jumlah</label>

                          <input type="text" name="jumlahmasuk" id="jumlahmasuk" onkeyup="sum()" class="form-control" />

                        </div>

                      </div>
                      <div class="row ">

                        <div class="col mb-4">
                          <div class=" mb-1">
                            <label for="floatingTextInput5">Total Stock</label>
                            <input readonly="readonly" name="jumlah" id="jumlah" type="number" class="form-control">
                          </div>
                        </div>
                        <div class="col mb-4">
                          <label for="floatingTextInput3">Supplier</label>

                          <select class="form-select" aria-label="Default select example" name="pengirim">
                            <option value="">Pilih ...</option>
                            <?php

                            $sql = $koneksi->query("select * from tblsupplier order by id");
                            while ($row = $sql->fetch_assoc()) {
                              echo "<option value='$row[namaSupplier]'>$row[namaSupplier]</option>";
                            }
                            ?>
                          </select>
                        </div>


                      </div>
                      <div class="row">
                        <div class="col mb-4">
                          <div class="tampung1"></div>
                        </div>
                        <div class="col mb-4">
                          <div class="tampung"></div>
                        </div>
                      </div>



                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="simpan" class="btn btn-primary" name="bsimpan">Simpan</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <!-- end modal tambah data-->


            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive ps-4 ">

                <table class="table align-items-center pe-3" id="tableS">
                  <thead>
                    <tr>
                      <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 text-center">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Transaksi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengirim</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Masuk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $no = 1;
                    $employee = mysqli_query($koneksi, "SELECT * fROM barang_masuk ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($employee)) :

                    ?>

                      <tr>
                        <td class="text-center text-xs font-weight-bold "><?= $no++ ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['id_transaksi'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['tanggal'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['kode_barang'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['nama_barang'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['pengirim'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['jumlah'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['satuan'] ?></td>

                        <td class="text-xs font-weight-bold  d-flex justify-content-center">
                          <div class="mt-3">
                            <!-- <button class="btn bg-gradient-primary btn-sm ms-2 " data-bs-toggle="modal" data-bs-target="#editModal<?= $no ?>" data-bs-whatever="@mdo">Edit</button> -->
                            <a href="./hapusMasuk.php?id=<?php echo $row['id']; ?>" class="btn bg-gradient-danger btn-xs ms-2 deletedUser" data-toggle="modal" data-original-title="Edit user" name="hapus">Hapus</a>
                          </div>
                        </td>

                      </tr>

                      <!-- modal edit data  -->
                      <div class="modal fade" id="editModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Edit data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                              <form method="POST" action="./aksiBarang.php">
                                <input type="hidden" name="id_code" value="<?= $row['id'] ?>">
                                <div class="row">
                                  <div class="col ">
                                    <div class="form-floating mb-3">
                                      <input type="text" class="form-control" id="floatingTextInput1" value="<?= $row['kodeBarang'] ?>" id="kode-barang" name="kode_barang" placeholder="John">
                                      <label for="floatingTextInput1">Kode Barang</label>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-floating mb-3">
                                      <input type="text" class="form-control" id="floatingTextInput2" placeholder="Smith" name="nama_barang" value="<?= $row['namaBarang'] ?>" required>
                                      <label for="floatingTextInput2">Nama Barang</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">

                                  <div class="col mb-4">
                                    <label for="floatingTextInput3">Jenis Barang</label>

                                    <select class="form-select" aria-label="Default select example" name="jenis_barang">
                                      <option value="<?= $row['jenisBarang'] ?>"><?= $row['jenisBarang'] ?></option>
                                      <?php
                                      $query    = mysqli_query($koneksi, "SELECT * FROM jenisbarang GROUP BY jenisBarang ORDER BY jenisBarang");
                                      while ($row = mysqli_fetch_array($query)) {
                                      ?>
                                        <option value="<?= $row['jenisBarang']; ?>"><?php echo $row['jenisBarang']; ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="col mb-4">
                                    <label for="floatingTextInput4">Satuan</label>
                                    <select class="form-select" aria-label="Default select example" name="satuan">
                                      <option value="<?= $row['satuan'] ?>"><?= $row['satuan'] ?></option>
                                      <?php
                                      $query    = mysqli_query($koneksi, "SELECT * FROM satuanbarang GROUP BY satuanBarang ORDER BY satuanBarang");
                                      while ($row = mysqli_fetch_array($query)) {
                                      ?>
                                        <option value="<?= $row['satuanBarang']; ?>"><?php echo $row['satuanBarang']; ?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="row ">
                                  <div class="col mb-4">
                                    <div class="form-floating mb-1">
                                      <input type="text" class="form-control" id="floatingTextInput1" placeholder="John" value="<?= $row['stock'] ?>" name="stock">
                                      <label for="floatingTextInput5">Stock</label>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" id="simpan" class="btn btn-primary" name="ubah">Ubah</button>
                                </div>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>
                      <!-- end modal tambah edit-->


                    <?php endwhile; ?>

                  </tbody>


                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>



  <?php include '../../includes/footer.php' ?>


  <script>
    function sum() {
      let stock = document.getElementById('stock').value;
      let jumlahmasuk = document.getElementById('jumlahmasuk').value;
      let result = parseInt(stock) + parseInt(jumlahmasuk);
      if (!isNaN(result)) {
        document.getElementById('jumlah').value = result;
      }
    }
  </script>

<script>
jQuery(document).ready(function($) {
   $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
     var tamp = $(this).val(); // Ciptakan variabel provinsi
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'get_barang.php', // File yang akan memproses data
         data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
         success: function(data) { // Jika berhasil
              $('.tampung').html(data); // Berikan hasil ke id kota
            }
           
     
    });
});
});
</script>			

<script>
jQuery(document).ready(function($) {
   $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
     let tamp = $(this).val(); // Ciptakan variabel provinsi
     $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'get_satuan.php', // File yang akan memproses data
         data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
         success: function(data) { // Jika berhasil
              $('.tampung1').html(data); // Berikan hasil ke id kota
            }
           
     
    });
});
});
</script> 


</body>

</html>