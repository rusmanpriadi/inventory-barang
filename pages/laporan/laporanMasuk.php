<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">

    <title>
        Inventory
    </title>
    <?php include '../../includes/header.php' ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>


    <?php
    include '../../includes/sidebar.php'
    ?>



    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Laporan </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Laporan Barang Masuk</h6>
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
                            <div class="button-export">

                            </div>

                        </div>
                        <div class="ms-4 mt-3">
                            <form action="./export_laporan_barangmasuk_excel.php" method="post">
                                <div class="row form-group w-50">

                                    <div class="col-md-5">
                                        <select class="form-control " name="bln">
                                            <option value="1" selected="">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        $now = date('Y');
                                        echo "<select name='thn' class='form-control'>";
                                        for ($a = 2018; $a <= $now; $a++) {
                                            echo "<option value='$a'>$a</option>";
                                        }
                                        echo "</select>";
                                        ?>

                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" class="btn btn-success" name="submit" value="Export to Excel">
                                    </div>

                                </div>
                            </form>

                            <div class="mt-1">
                                <form id="Myform1">
                                    <div class="row form-group w-50">

                                        <div class="col-md-5">
                                            <select class="form-control " name="bln">

                                                <option value="all" selected="">ALL</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                            $now = date('Y');
                                            echo "<select name='thn' class='form-control'>";
                                            for ($a = 2018; $a <= $now; $a++) {
                                                echo "<option value='$a'>$a</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" class="btn btn-primary" name="submit2" value="Tampilkan">
                                        </div>



                                    </div>
                                </form>
                            </div>
                        </div>


              

                        <div class="card-body px-0 pt-0 pb-2 tampung1">
                            <div class="table-responsive ps-4 pe-4">

                                <table class="table align-items-center" id="tableS">
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

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../koneksi.php';
                                        $no = 1;
                                        $employee = mysqli_query($koneksi, "SELECT * fROM barang_masuk ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($employee)) :

                                        ?>

                                            <tr>
                                                <td class="text-center text-xs font-weight-bold "><?= $no++ ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['id_transaksi'] ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['tanggal'] ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['kode_barang'] ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['nama_barang'] ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['pengirim'] ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['jumlah'] ?></td>
                                                <td class="td-b text-center text-xs font-weight-bold "><?= $row['satuan'] ?></td>



                                            </tr>



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
    
<script type="text/javascript">
    jQuery(document).ready(function($){
        $(function(){
    $('#Myform1').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'export_laporan_barangmasuk_excel.php',
            data: $(this).serialize(),
            success: function(data) {
             $(".tampung1").html(data);
             $('.table').DataTable();

            }
        });

        return false;
         e.preventDefault();
        });
    });
});
</script>


 <script type="text/javascript">
    jQuery(document).ready(function($){
        $(function(){
    $('#Myform2').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'export_laporan_barangkeluar_excel.php',
            data: $(this).serialize(),
            success: function(data) {
             $(".tampung2").html(data);
             $('.table').DataTable();

            }
        });

        return false;
         e.preventDefault();
        });
    });
});
</script>

</body>

</html>

