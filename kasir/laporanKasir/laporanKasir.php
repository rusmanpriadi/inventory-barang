<?php
session_start();

// fotmat rupiah harga
function ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}



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

    <?php include '../../includes/sidebarKasir.php' ?>



    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Laporan</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Laporan</h6>
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
                            <h6>Laporan Penjualan</h6>
                            <div class="button_header">



                            </div>
                        </div>



                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive ps-4 pe-4">

                                <table class="table align-items-center  pe-3" id="tableS">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 text-center">#</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SubTotal</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kembalian</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>


                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $data_laporan = mysqli_query($koneksi, "SELECT * FROM inv WHERE status='selesai' ORDER BY invid DESC");
                                        $dataTotal = $koneksi->query("SELECT * FROM laporan");
                                        $totalQty = 0;
                                        $totalSub = 0;
                                        $totalBayar = 0;
                                        $totalKembali = 0;
                                        while ($tampil = $dataTotal->fetch_array()) :
                                            $totalQty += $tampil["qty"];
                                            $totalSub += $tampil["subtotal"];



                                            while ($d = mysqli_fetch_array($data_laporan)) :
                                                $oninv = $d['invoice'];
                                                $totalBayar += $d["pembayaran"];
                                                $totalKembali += $d["kembalian"];
                                        ?>



                                                <tr>
                                                    <td class="text-center text-xs  "><?php echo $no++; ?></td>
                                                    <td class="text-center text-xs  "><a href="../transaksiKasir/invoice.php?detail=<?php echo $oninv ?>"><?php echo $d['invoice']; ?></a></td>
                                                    <td class="text-center text-xs  "><?php
                                                                                        $result1 = mysqli_query($koneksi, "SELECT SUM(qty) AS count FROM laporan WHERE invoice='$oninv'");
                                                                                        $cekrow = mysqli_num_rows($result1);
                                                                                        $row1 = mysqli_fetch_assoc($result1);
                                                                                        $count = $row1['count'];
                                                                                        if ($cekrow > 0) {
                                                                                            echo ribuan($count);
                                                                                        } else {
                                                                                            echo '0';
                                                                                        } ?></td>
                                                    <td class="text-center text-xs  ">Rp <?php
                                                                                            $result2 = mysqli_query($koneksi, "SELECT SUM(subtotal) AS count1 FROM laporan WHERE invoice='$oninv'");
                                                                                            $cekrow1 = mysqli_num_rows($result2);
                                                                                            $row2 = mysqli_fetch_assoc($result2);
                                                                                            $count1 = $row2['count1'];
                                                                                            if ($cekrow1 > 0) {
                                                                                                echo ribuan($count1);
                                                                                            } else {
                                                                                                echo '0';
                                                                                            }
                                                                                            
                                                                                            ?></td>
                                                    <td class="text-center text-xs  ">Rp <?php echo ribuan($d['pembayaran']); ?></td>
                                                    <td class="text-center text-xs  ">Rp <?php echo ribuan($d['kembalian']); ?></td>
                                                    <td class="text-center text-xs  "><?php echo $d['tgl_inv']; ?></td>


                                                    <td class="text-xs font-weight-bold  d-flex justify-content-center">
                                                        <div class="mt-3">

                                                            <form action="./haspusLaporan.php" method="POST">
                                                                <input type="hidden" name="nona" value="<?php echo $oninv ?>">
                                                                <button type="submit" name="Remove" class="btn bg-gradient-danger btn-xs ms-2 " data-toggle="modal" data-original-title="Edit user">Hapus</button>
                                                        </div>
                                                        </form>
                                                    </td>

                                                </tr>



                                            <?php endwhile; ?>
                                        <?php endwhile; ?>

                                    </tbody>
                                    <tbody>
                                        <tr class="mb-3 mt-5 border-top">
                                            <td colspan="2" class=" text-center font-weight-bold  fs-6 total"><span>Total</span></td>
                                            <td class="text-center font-weight-bold  p-3 "><span><?php echo $totalQty ?></span></td>
                                            <td class="text-center font-weight-bold  p-3 "><span>Rp <?php echo ribuan($totalSub) ?></span></td>
                                            <td class="text-center font-weight-bold  p-3 "><span>Rp <?php echo ribuan($totalBayar) ?></span></td>
                                            <td class="text-center font-weight-bold  p-3 "><span>Rp <?php echo ribuan($totalKembali) ?></span></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php
    if (isset($_POST['Remove'])) {
        $nona = $_POST['nona'];
        $hapus_data_Cart_all = mysqli_query($koneksi, "DELETE FROM laporan WHERE invoice='$nona'");
        $hapus_data_Cart_all1 = mysqli_query($koneksi, "DELETE FROM inv WHERE invoice='$nona'");


        if ($hapus_data_Cart_all && $hapus_data_Cart_all1) {
            echo '<script>;window.location="laporanKasir.php"</script>';
            //set session sukses
            $_SESSION["sukses"] = 'Data Berhasil Dihapus';
        } else {
            echo '<script>alert("Gagal Hapus Data keranjang");history.go(-1);</script>';
        }
    };
    ?>



    <?php include '../../includes/footer.php' ?>



</body>

</html>