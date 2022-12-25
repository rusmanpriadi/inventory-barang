<?php

session_start();

include '../../koneksi.php';


// tambah
if(isset($_POST['bsimpan'])) {
    
    $kode_barang= $_POST['kode_barang'];
    $nama_barang= $_POST['nama_barang'];
    
    
    $jenis_barang= $_POST['jenis_barang'];
    $pecah_jenis = explode(".", $jenis_barang);

    $id = $pecah_jenis[0];
    $jenis_barang = $pecah_jenis[1];
    
    $jumlah= $_POST['jumlah'];

    $harga_modal = htmlspecialchars($_POST['harga_modal']);

    $harga_jual = htmlspecialchars($_POST['harga_jual']);
    
    $satuan= $_POST['satuan'];
    $pecah_satuan = explode(".", $satuan);

    $id = $pecah_satuan[0];
    $satuan = $pecah_satuan[1];


    $simpan = $koneksi->query("insert into tblbarang (kodeBarang, namaBarang, jenisBarang, satuan,hargaModal,hargaJual, jumlah ) values('$kode_barang','$nama_barang','$jenis_barang','$satuan','$harga_modal','$harga_jual','$jumlah')");
    

    if($simpan) {
       $_SESSION['status'] = "Data berhasil disimpan";
       $_SESSION['status_code'] = "success";
       header('Location: ./barang.php');
       
    }else {
        $_SESSION['status'] = "Data tidak tersimpan";
        $_SESSION['status_code'] = "error";
        header('Location: ./barang.php');
    }

}


// ubahh
if(isset($_POST['ubah'])) {

    $kode_barang= $_POST['kode_barang'];
    $nama_barang= $_POST['nama_barang'];
    
    
    $jenis_barang= $_POST['jenis_barang'];
    $pecah_jenis = explode(".", $jenis_barang);

    $id = $pecah_jenis[0];
    $jenis_barang = $pecah_jenis[1];
    
  
    
    $satuan= $_POST['satuan'];
    $pecah_satuan = explode(".", $satuan);

    $id = $pecah_satuan[0];
    $satuan = $pecah_satuan[1];

   
    $id = $_POST['id_code'];

    $ubah = mysqli_query($koneksi, "UPDATE tblbarang SET kodeBarang='$kode_barang',
                                                        namaBarang='$nama_barang',
                                                        jenisBarang='$jenis_barang',
                                                        satuan='$satuan'
        WHERE id = '$id'
        ");
    if($ubah) {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./barang.php');
    }else {
        $_SESSION['status'] = "Data tidak dirubah";
        $_SESSION['status_code'] = "error";
        header('Location: ./barang.php');
    }

}

