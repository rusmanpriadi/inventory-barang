<?php

session_start();

include '../../koneksi.php';


// tambah
if(isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO satuanbarang (satuanBarang) 
    VALUES ('$_POST[satuan_barang]')");
    

    if($simpan) {
       $_SESSION['status'] = "Data berhasil disimpan";
       $_SESSION['status_code'] = "success";
       header('Location: ./satuanBarang.php');
       
    }else {
        $_SESSION['status'] = "Data tidak tersimpan";
        $_SESSION['status_code'] = "error";
        header('Location: ./satuanBarang.php');
    }

}


// ubahh
if(isset($_POST['ubah'])) {

    $satuan_barang = $_POST['satuan_barang'];
  
    $id = $_POST['id_code'];

    $ubah = mysqli_query($koneksi, "UPDATE satuanbarang SET satuanBarang='$satuan_barang'
        WHERE id = '$id'
        ");
    if($ubah) {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./satuanBarang.php');
    }else {
        $_SESSION['status'] = "Data tidak dirubah";
        $_SESSION['status_code'] = "error";
        header('Location: ./satuanBarang.php');
    }

}

