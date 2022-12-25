<?php

?>


<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 h-100" id="sidenav-main">

<?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1) ?>

    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 " href="../../pages/dashboard/dashboard.php" >
        <!-- <img src="./assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
        <i class="fa-solid fa-shop fs-5"></i>
        <span class="ms-1 font-weight-bold fs-5 ms-3">CV Hasco</span>
      </a>
    </div>
          <!-- <h6 class="ps-4 ms-2 text-uppercase mt-3 text-xs font-weight-bolder opacity-6">PAGES</h6> -->
    
    
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav mt-2 accordion" id="accordionExample">
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'dashboard.php' ? 'active' : '' ?>"  href="../../pages/dashboard/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
             
              <i class="fa-solid fa-house-chimney text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link  <?= $page == 'profile.php'? 'active':'' ?>" href="../../pages/profile/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> -->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
        </li>
     
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'supplier.php' ? 'active' : '' ?>"  href="../../pages/supplier/supplier.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
             
              <i class="fa-solid fa-user-group text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Supplier</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu collapsed"  href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Barang</span>
          </a>
          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="bg-white collapse-inner rounded">
            <ul class="list-unstyled ms-3">
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'barang.php' ? 'active' : '' ?>" href="../../pages/barang/barang.php">Data Barang</a></li>
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'jenisBarang.php' ? 'active' : '' ?>" href="../../pages/jenisbarang/jenisBarang.php">Jenis Barang</a></li>
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'satuanBarang.php' ? 'active' : '' ?>" href="../../pages/satuanbarang/satuanBarang.php">Satuan Barang</a></li>
              
            </ul>
          </div>
    </div>
    <!-- transaksi -->
        </li>
        <li class="nav-item">
          <a class="nav-link menu collapsed"  href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              
              <i class="fa-solid fa-arrow-right-arrow-left text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
          <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="bg-white collapse-inner rounded">
            <ul class="list-unstyled ms-3">
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'barangMasuk.php' ? 'active' : '' ?>" href="../../pages/barangmasuk/barangMasuk.php">Barang Masuk</a></li>
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'barangKeluar.php' ? 'active' : '' ?>" href="../../pages/barangkeluar/barangKeluar.php">Barang Keluar</a></li>
            </ul>
          </div>
    </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'pengguna.php' ? 'active' : '' ?>"  href="../../pages/pengguna/pengguna.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
             
            
              <i class="fa-solid fa-circle-user text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data User</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
        </li>

        <!-- laporan -->
        </li>
        <li class="nav-item">
          <a class="nav-link menu collapsed"  href="#" data-bs-toggle="collapse" data-bs-target="#collapseTri" aria-expanded="false" aria-controls="collapseTri">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-print text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-primary text-sm opacity-10">Laporan</span>
          </a>
          <div id="collapseTri" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="bg-white collapse-inner rounded">
            <ul class="list-unstyled ms-3">
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'laporanSupplier.php' ? 'active' : '' ?>" href="../../pages/laporan/laporanSupplier.php">Laporan Supplier</a></li>
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'laporanBarang.php' ? 'active' : '' ?>" href="../../pages/laporan/laporanBarang.php">Laporan Stock Barang</a></li>
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'laporanMasuk.php' ? 'active' : '' ?>" href="../../pages/laporan/laporanMasuk.php">Laporan Barang Masuk</a></li>
              <li class="nav-item"><a class="collapse-item nav-link <?= $page == 'laporanKeluar.php' ? 'active' : '' ?>" href="../../pages/laporan/laporanKeluar.php">Laporan Barang Keluar</a></li>
            </ul>
          </div>
    </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu <?= $page == 'pendapatan.php' ? 'active' : '' ?>"  href="../../pages/pendapatan/pendapatan.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
             
            <i class="fa-solid fa-receipt text-primary text-sm opacity-10"></i>
              
            </div>
            <span class="nav-link-text ms-1">Pendapatan</span>
          </a>
        </li>

       
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">LATIHAN</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?= $page == 'kalkulator.php' ? 'active' : '' ?>" href="../../pages/kalkulator/kalkulator.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              
              <i class="fa-solid fs-5 fa-calculator text-success  opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kalkulator</span>
          </a>
        </li>
      </ul>
    </div>
   
  </aside>