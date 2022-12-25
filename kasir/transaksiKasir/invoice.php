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
  <style>
     @media print {
    body * {
        visibility: hidden;
    }
    #print, #print * {
        visibility: visible;
    }
    #print {
        position: absolute;
        left: 0;
        top: 0;
        margin-top: 0px !important;
    }
    #print .print-none{
      display: none !important;
    }
    #print .print-show{
      display: block !important;
    }
    @page {
        size: A6 portrait !important;
        margin: 0;
    }
  }
   </style>

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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Detail</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Detail</h6>
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
                        

                        <?php include '../../koneksi.php';
                          
                        
                         
                        $noinv = $_GET['detail'];
                        if (!empty($_GET['detail'])) {
                        } else {
                            echo '<script>history.go(-1);</script>';
                        };
                        $DataInv = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM inv WHERE invoice='$noinv'"));
                        $Dbayar = $DataInv['pembayaran'];
                        $Dkembali = $DataInv['kembalian'];
                        $Datee = $DataInv['tgl_inv'];
                        ?>
                        <div class="card-header pb-0 d-flex justify-content-between">
                            <h6>Detail</h6>
                            <span class="float-right">
                                <a href="transaksi.php" class="btn btn-danger btn-sm px-3 mr-1">Kembali</a>
                                <button type="button" class="btn btn-primary btn-sm px-3" onclick="document.title='Invoice#<?php echo $noinv ?>';window.print()">
                                    Cetak</button>
                            </span>

                        </div>

                        <div class="bg-primary p-2 ms-3 me-3 rounded rounded-4 ">
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-white">No. Invoice : <?php echo $noinv ?></p>
                                    <p class="mb-0 date-inv text-white">Tanggal : <?php echo $Datee ?></p>
                                </div>

                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive ps-4 ">

                                <table class="table align-items-center print-none pe-3 " id="cart">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 text-center">#</th>

                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Barang</th>

                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtotal</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;
                                        $employee = mysqli_query($koneksi, "SELECT * fROM laporan WHERE invoice='$noinv'");
                                        while ($row = mysqli_fetch_array($employee)) :

                                        ?>

                                            <tr>
                                                <td class="text-center text-xs font-weight-bold p-3"><?= $no++ ?></td>

                                                <td class="text-center text-xs font-weight-bold p-3"><?= $row['nama_produk'] ?></td>
                                                <td class="text-center text-xs font-weight-bold p-3"><?= $row['kode_produk'] ?></td>
                                                <td class="text-center text-xs font-weight-bold p-3 mt-2">Rp <?php echo ribuan($row['harga']); ?></td>
                                                <td class="text-center text-xs font-weight-bold p-3"><?= $row['qty'] ?></td>
                                                <td class="text-center text-xs font-weight-bold p-3">Rp <?php echo ribuan($row['subtotal']); ?></td>



                                            </tr>






                                        <?php
                                            $itungtrans = mysqli_query($koneksi, "SELECT SUM(subtotal) as jumlahtrans FROM transaksi");
                                            $itungtrans2 = mysqli_fetch_assoc($itungtrans);
                                            $itungtrans3 = $itungtrans2['jumlahtrans'];
                                        endwhile; ?>

                                    </tbody>




                                </table>

                            </div>
                        </div>
                        <?php
                        $i4 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(subtotal) as isub FROM laporan WHERE invoice='$noinv'"));
                        ?>
                        <div class="row justify-content-end mt-1 p-4">

                            <div class="col-sm-6 col-md-5 col-lg-4">
                                <div class="bg-primary d-flex justify-content-between  p-2">
                                    <h6 class="mb-0 text-white">Total Item
                                    </h6>
                                    <span class="float-right text-white">Rp.<?php echo ribuan($i4['isub']); ?></span>
                                </div>
                                <div class="bg-light p-2">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-2">Pembayaran</h6>
                                        <span class="text-dark fw-bold">Rp.<?php echo ribuan($Dbayar); ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                    <h6 class="mb-0">Kembalian</h6>
                                        <span class="text-dark fw-bold">Rp.<?php echo ribuan($Dkembali); ?></span>
                                </div>
                                </div>
                            </div>

                        </div>
                        
                       <?php 
                       include '../../koneksi.php';
                        
                        $DataLogin = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM users "));
                       
                        $toko = $DataLogin['toko'];
                        $alamat = $DataLogin['alamat'];
                        $telepon = $DataLogin['telepon']; 
                     ?>

                        <!-- data print -->
                        <section id="print">
                            <div class="d-none  print-show">
                                <div class="text-center mb-5 pt-1">
                                    <p class="mb-2 fs-3 fw-bold" ><?php echo $toko ?></p>
                                    <p class="mb-0"><?php echo $alamat ?></p>
                                    <p class="mb-4">Telp : <?php echo $telepon ?></p>
                                </div>
                                <p class="mb-1">Invoice : <?php echo $noinv ?>
                                   
                                </p>
                                <p class="mb-1">Tanggal : <?php echo $Datee ?></p>
                                <div class="row">
                                    <div class="col-12 py-3 my-3 border-top border-bottom">
                                        <div class="row">
                                            <div class="col">
                                                <p class="mb-0 " >Description</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0 " >Harga</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0 " >Qty</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0 " >Jumlah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $no = 1;
                                    $dataprint = mysqli_query($koneksi, "SELECT * FROM laporan WHERE invoice='$noinv'");
                                    while ($c = mysqli_fetch_array($dataprint)) {
                                    ?>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-0 "><?php echo $c['nama_produk']; ?></p>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0 "><?php echo ribuan($c['harga']); ?></p>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0 "><?php echo ribuan($c['qty']); ?></p>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-0 "><?php echo ribuan($c['subtotal']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-12 py-3 my-3 border-top">
                                        <div class="row justify-content-end">

                                            <div class="col-3 text-right border-bottom">
                                                <p class="mb-1">Total <span class="ml-3">:</span></p>
                                                <p class="mb-1">Tunai <span class="ml-3">:</span></p>
                                                <p class="mb-1">Kembalian <span class="ml-3">:</span></p>
                                            </div>
                                            <div class="col-3 border-bottom">
                                                <p class="mb-1"><?php echo ribuan($i4['isub']); ?></p>
                                                <p class="mb-1"><?php echo ribuan($Dbayar); ?></p>
                                                <p class="mb-1"><?php echo ribuan($Dkembali); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-5">
                                        <h5>* Terima Kasih Telah Berbelanja Di Adgrafika *</h5>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end box print -->
                        </section>
                        <!-- end data print -->
                    </div>
                </div>
            </div>

        </div>

    </main>




    <?php include '../../includes/footer.php' ?>

    





</body>

</html>