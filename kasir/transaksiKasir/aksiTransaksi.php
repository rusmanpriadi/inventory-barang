<?php

session_start();

include '../../koneksi.php';


if (isset($_POST['InputCart'])) {
    $Input1 = htmlspecialchars($_POST['nama_barang']);
    $Input2 = $_POST['Cnkode'];
    $Input3 = htmlspecialchars($_POST['Charga']);
    $Input5 = htmlspecialchars($_POST['subtotal']);
    $hrg_m = htmlspecialchars($_POST['harga_modal']);
    $Input6 = $_POST['totalCart'];
    $ii = $_POST['qty'];

    // if ($stock < $ii) {
    // echo   $_SESSION['status'] = "Oops! Jumlah pengeluaran lebih besar dari stok ...";
    // $_SESSION['status_code'] = "error";
    // header('Location: ./transaksi.php');;
    // }   
    // else {
    $cekDulu = mysqli_query($koneksi, "SELECT * FROM transaksi ");
    $cekStock = mysqli_query($koneksi, "SELECT * FROM tblbarang where kodeBarang='$Input2'");
    $liat = mysqli_num_rows($cekDulu);
    $f = mysqli_fetch_array($cekDulu);
    $inv_c = $f['invoice'];
    $stocknya  = mysqli_fetch_array($cekStock);
    $stock     = $stocknya['jumlah'];
    $sisa      = $stock - $ii;

    if ($stock < $ii) {
        echo   $_SESSION['status'] = "Oops! Jumlah pengeluaran lebih besar dari stok ...";
        $_SESSION['status_code'] = "error";
        header('Location: ./transaksi.php');
    } else {


        if ($liat > 0) {
            $cekbrg = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kodeBarang='$Input2' and invoice='$inv_c'");
            $liatlg = mysqli_num_rows($cekbrg);

            $brpbanyak = mysqli_fetch_array($cekbrg);
            $jmlh = $brpbanyak['qty'];
            $jmlh1 = $brpbanyak['harga'];

            if ($liatlg > 0) {
                $i = htmlspecialchars($_POST['qty']);
                $baru = $jmlh + $i;
                $baru1 = $jmlh1 * $baru;

                $updateaja = mysqli_query($koneksi, "UPDATE transaksi SET qty='$baru', subtotal='$baru1' WHERE invoice='$inv_c' and namaBarang='$Input1'");
                if ($updateaja) {
                    $upstok = mysqli_query($koneksi, "UPDATE tblbarang SET jumlah='$sisa' WHERE kodeBarang='$Input2'");
                    $_SESSION['status'] = "Data berhasil diupdate";
                    $_SESSION['status_code'] = "success";
                    header('Location: ./transaksi.php');
                } else {
                    $_SESSION['status'] = "Data tidak diupdate";
                    $_SESSION['status_code'] = "error";
                    header('Location: ./transaksi.php');
                };
            } else {

                $tambahdata = mysqli_query($koneksi, "INSERT INTO transaksi (invoice,namaBarang,kodeBarang,harga,hargaModal,qty,subtotal) values('$inv_c','$Input1','$Input2','$Input3','$hrg_m','$ii','$Input5')");
                if ($tambahdata) {
                    $upstok = mysqli_query($koneksi, "UPDATE tblbarang SET jumlah='$sisa' WHERE kodeBarang='$Input2'");

                    $_SESSION['status'] = "Data berhasil ditambah";
                    $_SESSION['status_code'] = "success";
                    header('Location: ./transaksi.php');
                } else {
                    $_SESSION['status'] = "Data tidak ditambah";
                    $_SESSION['status_code'] = "error";
                    header('Location: ./transaksi.php');
                }
            }
        } else {
            $queryStar = mysqli_query($koneksi, "SELECT max(invoice) as kodeTerbesar FROM inv");
            
            $data = mysqli_fetch_array($queryStar);
            $kodeInfo = $data['kodeTerbesar'];
        
            $urutan = (int) substr($kodeInfo, 8, 2);
           
            

            $urutan++;
            $huruf = "AD";
            $oi = $huruf . date("jnyGi") . sprintf("%02s", $urutan);
          

            $bikincart = mysqli_query($koneksi, "INSERT INTO inv (invoice,pembayaran,kembalian,status,subtotal) values('$oi','','','proses','')");
            

            if ($bikincart) {
                $tambahuser = mysqli_query($koneksi, "INSERT INTO transaksi (invoice,namaBarang,kodeBarang,harga,hargaModal,qty,subtotal) values('$oi','$Input1','$Input2','$Input3','$hrg_m','$ii','$Input5')");

               


                if ($tambahuser) {
                    $upstok = mysqli_query($koneksi, "UPDATE tblbarang SET jumlah='$sisa' WHERE kodeBarang='$Input2'");
  
                   
                    $_SESSION['status'] = "Data berhasil ditambah";
                    $_SESSION['status_code'] = "success";
                    header('Location: ./transaksi.php');
                } else {
                    $_SESSION['status'] = "Data tidak ditambah";
                    $_SESSION['status_code'] = "error";
                    header('Location: ./transaksi.php');
                }
            
              

            } else {
            }
        }
    }
}


// button hapus transaksi

if (isset($_POST['upone'])) {
    $idcartt = $_POST['idcc'];
    $idproduk = $_POST['idpr'];
    $jml = $_POST['jml'];

    $cekBarang1 = mysqli_query($koneksi, "SELECT * FROM tblbarang WHERE kodeBarang='$idproduk'");
    $stocknya1  = mysqli_fetch_array($cekBarang1);
    $stockk     = $stocknya1['jumlah'];
    //menghitung sisa stok
    $sisa1    = $stockk + $jml;


    $insert1 = mysqli_query($koneksi, "UPDATE tblbarang SET jumlah='$sisa1' WHERE kodeBarang='$idproduk'");
    if ($insert1) {
        //update stok
        $hapus_data = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id ='$idcartt'");
        if ($hapus_data) {
            $_SESSION['status'] = "Data berhasil dihapus";
            $_SESSION['status_code'] = "success";
            header('Location: ./transaksi.php');
        } else {
            $_SESSION['status'] = "Data tidak dihapus";
            $_SESSION['status_code'] = "error";
            header('Location: ./transaksi.php');
        }
    } else {
        echo  $_SESSION['status'] = "Data tidak ditambah";
        $_SESSION['status_code'] = "error";
        header('Location: ./transaksi.php');
    }
}
