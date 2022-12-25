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

<?php include '../../includes/sidebar.php' ?>



  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kalkulator </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Kalkulator</h6>
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
            <div class="card-header pb-0">
              <h6>Kalkulator</h6>
            </div>
            <div class="card-body d-flex justify-content-center  px-0 pt-0 mt-4 pb-2">

              <?php

              $bil1 = null;
              $bil2 = null;
              if (isset($_GET['bil1'])) {

                $bil1 = $_GET['bil1'];
                $bil2 = $_GET['bil2'];
                $hasil = 0;
                $operasi = $_GET["operasi"];
                switch ($operasi) {
                  case '+':
                    $hasil = $bil1 + $bil2;
                    break;
                  case '-':
                    $hasil = $bil1 - $bil2;
                    break;
                  case 'x':
                    $hasil = $bil1 * $bil2;
                    break;
                  case '/':
                    $hasil = $bil1 / $bil2;
                    break;
                  case '%':
                    $hasil = $bil1 % $bil2;
                    break;

                  case '**':
                    $hasil = $bil1 ** $bil2;
                    break;
                }
              }
              ?>

              <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" class="col-6 mb-8 d-flex flex-column">
                <!-- <h2>Kalkulator dengan PHP dan Bootstrap</h2> -->
                <div class="form-group">
                  <label>Bilangan 1:</label>
                  <input type="text" name="bil1" class="form-control" value="<?php echo $bil1; ?>" required>
                </div>
                <div class="form-group">
                  <label for="">Operator : </label>
                  <select class="form-control" name="operasi">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="x">x</option>
                    <option value="/">/</option>
                    <option value="%">%</option>
                    <option value="**">**</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Bilangan 2:</label>
                  <input type="text" name="bil2" class="form-control" value="<?php echo $bil2; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Hitung</button>
            
                
                <div class="form-grup text-center">
                  <?php
                  if (isset($_GET['bil1'])) {
                    echo "<h1>$hasil</h1>";
                  }
                  ?>
                </div>
              </form>
              <br>

            </div>



          </div>
        </div>
      </div>
    </div>
  </main>



<?php include '../../includes/footer.php' ?>

</body>

</html>