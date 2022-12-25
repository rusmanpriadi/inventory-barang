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

  <?php

  include '../../includes/header.php';

  function ribuan($nilai)
  {
    return number_format($nilai, 0, ',', '.');
  }



  ?>


</head>

<body class="g-sidenav-show  bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <?php include '../../includes/sidebarKasir.php' ?>



  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaksi</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Transaksi</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="../../logout.php" class="nav-link text-white font-weight-bold px-0" onclick=" return confirm('Are You sure you want to logout?');">

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
              <h6>Transaksi</h6>

            </div>

            <?php include '../../koneksi.php' ?>
            <?php $dataselect = mysqli_query($koneksi, "SELECT * FROM tblbarang");
            $jsArray = "let kodeBarang = new Array();";
            $jsArray1 = "let hargaModal = new Array();";
            $jsArray2 = "let hargaJual = new Array();";
            $jsArray3 = "let jumlah = new Array();";
            ?>

            <div class="p-3">
              <form method="POST" action="./aksiTransaksi.php">
                <div class=" d-flex w-100 justify-content-between flex-wrap">
                  <div class=" ">
                 
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="floatingTextInput2" name="nama_barang" list="datalist1" onchange="changeValue(this.value)" required autofocus>
                          <label for="floatingTextInput2">Nama Barang</label>
                          <datalist id="datalist1">
                            <?php if (mysqli_num_rows($dataselect)) { ?>
                              <?php while ($row = mysqli_fetch_array($dataselect)) { ?>
                                <option value="<?php echo $row["namaBarang"] ?>"> <?php echo $row["namaBarang"] ?>
                                <?php
                                $jsArray .= "kodeBarang['" . $row['namaBarang'] . "'] = {kodeBarang:'" . addslashes($row['kodeBarang']) . "'};";
                                $jsArray1 .= "hargaModal['" . $row['namaBarang'] . "'] = {hargaModal:'" . addslashes($row['hargaModal']) . "'};";
                                $jsArray2 .= "hargaJual['" . $row['namaBarang'] . "'] = {hargaJual:'" . addslashes($row['hargaJual']) . "'};";
                                $jsArray3 .= "jumlah['" . $row['namaBarang'] . "'] = {jumlah:'" . addslashes($row['jumlah']) . "'};";
                              } ?>
                              <?php } ?>
                          </datalist>
                        </div>
                    
                  </div>
                  <div class="">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="Cnkode" id="kode_barang" required readonly>
                      <input type="hidden" name="harga_modal" id="harga_modal">
                      <label for="floatingTextInput2">Kode Barang</label>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="harga_jual" name="Charga" onchange="InputSub()" required readonly>
                      <label for="floatingTextInput2">Harga</label>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="stock" name="stock" required readonly>

                      <label for="floatingTextInput2">Stock</label>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="Iqty" name="qty" onchange="InputSub()" required>
                      <label for="floatingTextInput2">Qty</label>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="Isubtotal" onchange="InputSub()" name="subtotal" required readonly>
                      <label for="floatingTextInput2">Subtotal</label>
                    </div>
                  </div>


                </div>


                <div class="row ">
                  <div class="col">
                    <button type="submit" name="InputCart" class="btn btn-primary btn-xs  btn-sm me-2">Tambah+</button>
                    <button type="reset" class="btn bg-gradient-warning  btn-xs me-2">Reset+</button>

                  </div>
                </div>
              </form>

            </div>






            <!-- table transkasi -->
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive ps-4 ">

                <table class="table align-items-center  pe-3 print-none" id="tableS cart">
                  <thead>
                    <tr>
                      <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 text-center">#</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Barang</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtotal</th>


                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $no = 1;
                    $employee = mysqli_query($koneksi, "SELECT * fROM transaksi ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($employee)) :

                    ?>

                      <tr>
                        <td class="text-center text-xs font-weight-bold "><?= $no++ ?></td>

                        <td class="text-center text-xs font-weight-bold "><?= $row['namaBarang'] ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['kodeBarang'] ?></td>
                        <td class="text-center text-xs font-weight-bold ">Rp <?php echo ribuan($row['harga']); ?></td>
                        <td class="text-center text-xs font-weight-bold "><?= $row['qty'] ?></td>
                        <td class="text-center text-xs font-weight-bold ">Rp <?php echo ribuan($row['subtotal']); ?></td>


                        <td class="text-xs font-weight-bold  d-flex justify-content-center">
                          <div class="mt-3">
                            <form method="post" action="./aksiTransaksi.php">
                              <!-- <a href="./hapusTransaksi.php?id=<?php echo $row['id']; ?>" class="btn bg-gradient-secondary btn-sm ms-2 deletedUser" data-toggle="modal" name="hapus">Hapus</a> -->
                              <input type="hidden" name="idpr" value="<?php echo $row['kodeBarang'] ?>">
                              <input type="hidden" name="idcc" value="<?php echo $row['id'] ?>">
                              <input type="hidden" name="jml" value="<?php echo $row['qty'] ?>">
                              <button type="submit" name="upone" class="btn btn-danger btn-xs">Hapus</button>
                            </form>
                          </div>
                        </td>

                      </tr>
                      <?php
                      $itungtrans = mysqli_query($koneksi, "SELECT SUM(subtotal) as jumlahtrans FROM transaksi");
                      $itungtrans2 = mysqli_fetch_assoc($itungtrans);
                      $itungtrans3 = $itungtrans2['jumlahtrans'];
                      ?>

                    <?php

                    endwhile; ?>
                    <?php
                    include '../../koneksi.php';
                    $sql3 = mysqli_query($koneksi, "SELECT SUM(subtotal) FROM transaksi");
                    while ($data3 = mysqli_fetch_array($sql3)) {
                    ?>
                      <tr class="mb-3 mt-5 ">
                        <td colspan="5" class=" text-center font-weight-bold fs-6 total"><span>Total</span></td>
                        <td class="text-center fs-6 font-weight-bold p-3 ">Rp <?php echo isset($itungtrans3) ? ribuan($itungtrans3) : '' ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  
                  </tbody>

                </table>

                
                <div class="p-3 mt-3">
                  <form method="POST">
                    <input type="hidden" name="totalCart" id="totalCart" value="<?php echo $itungtrans3; ?>">
                    <div class="d-flex align-items-center w-100 ">
                      <div class="form-pembayaran w-50">
                        <div class="row">
                          <div class="col">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control w-75" placeholder="0" name="pembayaran" onchange="procesBayar()" id="pembayaran" required>
                              <label for="floatingTextInput2">Pembayaran</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col ">
                            <div class="form-floating mb-3 ">
                              <input type="text" class="form-control w-75" placeholder="0" id="kembalian" required readonly>
                              <input type="hidden" name="kembalian" id="kembalian1">
                              <label for="floatingTextInput2">Kembalian</label>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="d-flex align-items-center justify-content-center">
                        <h6>No. Invoice : </h6>


                        <h6 class="ms-3"><?php $DataInv = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM transaksi LIMIT 1"));
                                          $noinv = isset($DataInv['invoice']) ? $DataInv['invoice'] : '';
                                          echo $noinv  ?></h6>
                      </div>
                    </div>


                    <div class="row ">
                      <div class="col">
                        <?php
                        $on = mysqli_query($koneksi, "SELECT * FROM transaksi");
                        $x1 = mysqli_num_rows($on);
                        if ($x1 > 0) {
                        ?>

                          <button type="submit" name="import" class="btn bg-gradient-danger  btn-sm me-2">
                            Bayar</button>
                        <?php } else { ?>

                          <button type="button" class="btn bg-gradient-danger  btn-sm me-2" disabled>Bayar+</button>
                        <?php  } ?>


                        <!-- modal bayar-->
                        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-body">
                                <?php
                                include '../../koneksi.php';
                                $DataInv = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM inv WHERE invoice='$noinv'"));
                                $Dbayar = $DataInv['pembayaran'];
                                $Dkembali = $DataInv['kembalian'];
                                $Datee = $DataInv['tgl_inv'];
                                $i4 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(subtotal) as isub FROM laporan WHERE invoice='$noinv'"));
                                ?>
                                <!-- tambah -->
                                <form method="POST" action="./aksiTransaksi.php">
                                  <div class="row col-12">
                                    <div class="col">
                                      <h6 class="mb-0">No. Invoice : <?php echo $noinv ?></h5>
                                    </div>
                                    <div class="col">
                                      <h6 class="mb-0 date-inv">Tanggal : <?php echo $Datee ?></h5>
                                    </div>
                                  </div>

                                  <div class="row mt-3 ">
                                    <div class="col ms-3 p-3">
                                      <table class="w-60 table table-item p-2" cellpadding="10">
                                        <tr class="w-100 bg-primary text-white p-2 ">
                                          <td>
                                            <span>Total</s>
                                          </td>
                                          <td>:</td>
                                          <td class="text-end"> <input type="text" class="w-80 bg-transparent border-0 text-white w-25 text-end" id="iTotal" disabled></td>
                                        </tr>
                                        <tr class="text-dark bg-light">
                                          <td>
                                            <span>Pembayaran</s>
                                          </td>
                                          <td>:</td>
                                          <td class="text-end"> <input type="text" class="w-80 bg-transparent border-0 text-dark w-25 text-end" id="iPembayaran" disabled></td>
                                        </tr>
                                        <tr class="text-dark bg-light">
                                          <td>
                                            <span>Kembalian</s>
                                          </td>
                                          <td>:</td>
                                          <td class="text-end"> <input type="text" class="w-80 bg-transparent border-0 text-dark w-25 text-end" id="iKembalian" disabled></td>
                                        </tr>
                                      </table>








                                    </div>
                                  </div>
                              </div>







                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Cetak</button>
                              </div>
                  </form>

                </div>

              </div>
            </div>
          </div>
          <!-- end modal bayar-->

        </div>
      </div>
      </form>





    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>

  </main>




  <?php include '../../includes/footer.php' ?>

  <?php
  if (isset($_POST['import'])) {
    $Ipembayaran = htmlspecialchars($_POST['pembayaran']);
    $Ikembalian = htmlspecialchars($_POST['kembalian']);
    $totalCar = htmlspecialchars($_POST['totalCart']);

    $bulan = date('m');
    $tambahJumlah= mysqli_query($koneksi, "INSERT INTO tb_penjualan (id_barang,jumlah,tgl_penjualan) values('$bulan','$totalCar','$Datee')");


    $UpdCart = mysqli_query($koneksi, "UPDATE inv SET
      pembayaran='$Ipembayaran',kembalian='$Ikembalian',status='selesai' WHERE invoice='$noinv'")
      or die(mysqli_connect_error());

    $UpdLap = mysqli_query($koneksi, "INSERT INTO laporan (invoice,kode_produk,nama_produk,harga,harga_modal,qty,subtotal)
     SELECT invoice,kodeBarang,namaBarang,harga,hargaModal,qty,subtotal FROM transaksi") or die(mysqli_connect_error());

    $DelCart = mysqli_query($koneksi, "DELETE FROM transaksi") or die(mysqli_connect_error());

    if ($UpdCart && $UpdLap && $DelCart) {
      echo '<script>window.location="invoice.php?detail=' . $noinv . '"</script>';
    } else {
      echo '<script>alert("Gagal Di Simpan");history.go(-1);</script>';
    }
  };
  ?>

  <script type="text/javascript">
    $('#tableS').dataTable({
      searching: false,
      paging: false,
      info: false
    });
  </script>

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



  <script type="text/javascript">
    <?php echo $jsArray, $jsArray1, $jsArray2, $jsArray3  ?>

    function ribuan(nilai) {
      return number_format(nilai, 0, ',', '.');
    }


    function changeValue(nama_barang) {
      document.getElementById("kode_barang").value = kodeBarang[nama_barang].kodeBarang;
      document.getElementById("harga_modal").value = hargaModal[nama_barang].hargaModal;
      document.getElementById("harga_jual").value = hargaJual[nama_barang].hargaJual;
      document.getElementById("stock").value = jumlah[nama_barang].jumlah;


      document.getElementById("Iqty").value = 0;
      document.getElementById("subStok").value = 0;
      document.getElementById("Isubtotal").value = 0;
    };

    function InputSub() {
      let harga_jual = parseInt(document.getElementById('harga_jual').value);

      let jumlah_beli = parseInt(document.getElementById('Iqty').value);
      let jumlah_harga = harga_jual * jumlah_beli;



      document.getElementById('Isubtotal').value = jumlah_harga;
    };

    function procesBayar() {
      let harga_Cart = parseInt(document.getElementById('totalCart').value);
      let pembayaran_Cart = parseInt(document.getElementById('pembayaran').value);
      let kembali_Cart = pembayaran_Cart - harga_Cart;

      let number_string = kembali_Cart.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);


      if (ribuan) {
        separator = sisa ? '' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('kembalian').value = rupiah;

      document.getElementById('kembalian1').value = kembali_Cart;
    };

    function submitBayar() {
      let total = document.getElementById('totalCart').value;
      let pembayaran = document.getElementById('pembayaran').value;
      let kembalian = document.getElementById('kembalian').value;

      document.getElementById('iTotal').value = "Rp " + total;
      document.getElementById('iPembayaran').value = "Rp " + pembayaran;
      document.getElementById('iKembalian').value = "Rp " + kembalian;

    }
  </script>




</body>

</html>