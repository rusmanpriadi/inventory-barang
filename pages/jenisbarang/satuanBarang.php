<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Jenis Barang</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Jenis Barang</h6>
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
              <h6>Satuan Barang</h6>
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
        
                  <div class="modal-body ">

          
 
                    <form method="POST" action="./aksisatuan.php">
                      <div class="row">
                        
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput2" placeholder="Smith"  name="satuan_barang" required>
                            <label for="floatingTextInput2">Jenis Barang</label>
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


            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive ps-4 pe-4 ">
                
                <table class="table align-items-center " id="tableS">
                  <thead>
                    <tr>
                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 text-center">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Barang</th>
                        
                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
        include '../../koneksi.php';
            $no = 1;
            $employee = mysqli_query($koneksi, "SELECT * fROM satuanbarang ORDER BY id DESC");
            while ($row = mysqli_fetch_array($employee)) :

            ?>

  <tr>
    <td class="text-center text-xs font-weight-bold "><?= $no++ ?></td>
    <td  class="text-center text-xs font-weight-bold "><?= $row['satuanBarang'] ?></td>
    
    
    <td class="text-xs font-weight-bold  d-flex justify-content-center">
      <div class="mt-3">
      <button class="btn bg-gradient-primary btn-xs ms-2 " data-bs-toggle="modal" data-bs-target="#editModal<?= $no ?>" data-bs-whatever="@mdo">Edit</button>
            <a href="./hapussatuan.php?id=<?php echo $row['id']; ?>" class="btn bg-gradient-danger btn-xs ms-2 deletedUser" data-toggle="modal" data-original-title="Edit user" name="hapus" >Hapus</a>
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
 
                    <form method="POST" action="./aksisatuan.php">
                    <input type="hidden" name="id_code" value="<?= $row['id']?>">
                      <div class="row">
                        
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTextInput2" placeholder="Smith"  name="satuan_barang" value="<?= $row['satuan'] ?>" required>
                            <label for="floatingTextInput2">Nama Barang</label>
                          </div>
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

</body>

</html>