
 
<?php

session_start();

include '../../koneksi.php';


// tambah
if (isset($_POST['bsimpan'])) {
    $id_transaksi= $_POST['id_transaksi'];
    $tanggal= $_POST['tanggal_keluar'];

    $barang= $_POST['nama_barang'];
    $pecah_barang = explode(".", $barang);
    $kode_barang = $pecah_barang[0];
    $nama_barang = $pecah_barang[1];
    $jumlah= $_POST['jumlahkeluar'];
    
    $satuan= $_POST['satuan'];
    $tujuan= $_POST['tujuan'];
    
    
    $total= $_POST['total'];
    $sisa2 = $total;
    if ($sisa2 < 0) {
      
        
        $_SESSION['status'] = "Stok Barang Habis, Transaksi Tidak Dapat Dilakukan";
        $_SESSION['status_code'] = "error";
        header('Location: ./barangKeluar.php');
            
    }else {

    $simpan =  $koneksi->query("insert into barang_keluar (id_transaksi, tanggal, kode_barang, nama_barang, jumlah, satuan, tujuan) values('$id_transaksi','$tanggal','$kode_barang','$nama_barang','$jumlah','$satuan','$tujuan')");
    $sql2 = $koneksi-> query("update tblbarang set jumlah=(jumlah) where kodeBarang='$kode_barang'");
							
    

    if ($simpan) {
        $_SESSION['status'] = "Data berhasil disimpan";
        $_SESSION['status_code'] = "success";
        header('Location: ./barangKeluar.php');
    } else {
        $_SESSION['status'] = "Data tidak tersimpan";
        $_SESSION['status_code'] = "error";
        header('Location: ./barangKeluar.php');
    }
}
}

// ubahh
if (isset($_POST['ubah'])) {

    $kodeBarang = $_POST['kode_barang'];
    $namaBarang = $_POST['nama_barang'];
    $jenisBarang = $_POST['jenis_barang'];
    $satuan = $_POST['satuan'];
    $stock = $_POST['stock'];

    $id = $_POST['id_code'];

    $ubah = mysqli_query($koneksi, "UPDATE tblbarang SET kodeBarang='$kodeBarang',
                                                        namaBarang='$namaBarang',
                                                        jenisBarang='$jenisBarang',
                                                        satuan='$satuan',
                                                        stock='$stock'
        WHERE id = '$id'
        ");
    if ($ubah) {
        $_SESSION['status'] = "Data berhasil dirubah";
        $_SESSION['status_code'] = "success";
        header('Location: ./barangMasuk.php');
    } else {
        $_SESSION['status'] = "Data tidak dirubah";
        $_SESSION['status_code'] = "error";
        header('Location: ./barangMasuk.php');
    }
}
