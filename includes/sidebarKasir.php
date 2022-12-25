

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 h-100" id="sidenav-main">
    
<?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1) ?>
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 " href="../dashboardKasir/dashboardKasir.php" >
        <!-- <img src="./assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
        <i class="fa-solid fa-shop fs-5"></i>
        <span class="ms-1 font-weight-bold fs-5 ms-3">CV Hasco</span>
      </a>
    </div>
          <!-- <h6 class="ps-4 ms-2 text-uppercase mt-3 text-xs font-weight-bolder opacity-6">PAGES</h6> -->
    
    
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav mt-2 accordion" id="accordionExample">
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'dashboardKasir.php' ? 'active' : '' ?> "  href="../../kasir/dashboardKasir/dashboardKasir.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'kasirBarang.php' ? 'active' : '' ?>"  href="../../kasir/barangKasir/kasirBarang.php" >
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Barang</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">KASIR</h6>
        </li>
     
       
       
        <li class="nav-item">
          <a class="nav-link menu  <?= $page == 'transaksi.php' ? 'active' : '' ?>"  href="../../kasir/transaksiKasir/transaksi.php" >
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-arrow-right-arrow-left text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'laporanKasir.php' ? 'active' : '' ?>"  href="../../kasir/laporanKasir/laporanKasir.php" >
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
             
              <i class="fa-solid fa-folder-open text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 mt-2">Data Penjualan</span>
          </a>
        </li>
       
      


       
      
      </ul>
    </div>
   
  </aside>