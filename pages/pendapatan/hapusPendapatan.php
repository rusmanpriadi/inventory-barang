<?php

session_start();

include '../../koneksi.php';
if (isset($_POST['Remove'])) {
    $nona = $_POST['nona'];
    $hapus_data_Cart_all = mysqli_query($koneksi, "DELETE FROM laporan WHERE invoice='$nona'");
    $hapus_data_Cart_all1 = mysqli_query($koneksi, "DELETE FROM inv WHERE invoice='$nona'");


    
    if($hapus_data_Cart_all && $hapus_data_Cart_all1) {
        $_SESSION['status'] = "Data berhasil dihapus";
        $_SESSION['status_code'] = "success";
        header('Location: ./pendapatan.php');
    }else {
        $_SESSION['status'] = "Data tidak dihapus";
        $_SESSION['status_code'] = "error";
        header('Location: ./pendapatan.php');
    }
};