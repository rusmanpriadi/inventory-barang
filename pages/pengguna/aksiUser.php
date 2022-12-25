<?php

session_start();

include '../../koneksi.php';

// tambah
if(isset($_POST['bsimpanUser'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO login (`username`, `password`, `alamat`, `telepon`, `level`) 
    VALUES ('$_POST[username]',
    '$_POST[password]',
    '$_POST[alamat]',
    '$_POST[telp]',
    '$_POST[level]')");

    if($simpan) {
        $_SESSION['status'] = "Data berhasil disimpan";
        $_SESSION['status_code'] = "success";
        header('Location: ./pengguna.php');
    }else {
        $_SESSION['status'] = "Data berhasil disimpan";
        $_SESSION['status_code'] = "success";
        header('Location: ./pengguna.php');
    }

}

// ubahh
if(isset($_POST['ubah'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    
    $id = $_POST['id_code'];

    $ubah = mysqli_query($koneksi, "UPDATE login SET `username`='$username',
                                                        `password`='$password',
                                                        `alamat`='$alamat',
                                                        `telepon`='$telp',
                                                        `level`='$level'
                                                
        WHERE userid = '$id'
        ");
    if($ubah) {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./pengguna.php');
    }else {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./pengguna.php');
    }

}



