<?php

session_start();

include '../../koneksi.php';

// tambah
if(isset($_POST['bsimpanSupplier'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tblsupplier (kodeSupplier,namaSupplier,alamat,telp) 
    VALUES ('$_POST[kode_supplier]',
    '$_POST[nama_supplier]',
    '$_POST[alamat]',
    '$_POST[telp]')");

    if($simpan) {
        $_SESSION['status'] = "Data berhasil disimpan";
        $_SESSION['status_code'] = "success";
        header('Location: ./supplier.php');
    }else {
        $_SESSION['status'] = "Data berhasil disimpan";
        $_SESSION['status_code'] = "success";
        header('Location: ./supplier.php');
    }

}

// ubahh
if(isset($_POST['ubah'])) {

    $kodeSupplier = $_POST['kode_supplier'];
    $namaSupplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    
    $id = $_POST['id_code'];

    $ubah = mysqli_query($koneksi, "UPDATE tblsupplier SET kodeSupplier='$kodeSupplier',
                                                        namaSupplier='$namaSupplier',
                                                        alamat='$alamat',
                                                        telp='$telp'
                                                
        WHERE id = '$id'
        ");
    if($ubah) {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./supplier.php');
    }else {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./supplier.php');
    }

}



