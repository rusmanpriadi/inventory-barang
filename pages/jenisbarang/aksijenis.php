<?php

session_start();

include '../../koneksi.php';


// tambah
if(isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO jenisBarang (jenisBarang) 
    VALUES ('$_POST[jenis_barang]')");
    

    if($simpan) {
       $_SESSION['status'] = "Data berhasil disimpan";
       $_SESSION['status_code'] = "success";
       header('Location: ./jenisBarang.php');
       
    }else {
        $_SESSION['status'] = "Data tidak tersimpan";
        $_SESSION['status_code'] = "error";
        header('Location: ./jenisBarang.php');
    }

}


// ubahh
if(isset($_POST['ubah'])) {

    $jenis_barang = $_POST['jenis_barang'];
  
    $id = $_POST['id_code'];

    $ubah = mysqli_query($koneksi, "UPDATE jenisbarang SET jenisBarang='$jenis_barang'
        WHERE id = '$id'
        ");
    if($ubah) {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./jenisBarang.php');
    }else {
        $_SESSION['status'] = "Data tidak dirubah";
        $_SESSION['status_code'] = "error";
        header('Location: ./jenisBarang.php');
    }

}

