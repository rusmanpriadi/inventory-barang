<?php

$id = $_GET['userid'];

//gunakan fungsi di bawah ini agar session bisa dibuat
session_start();

//koneksi ke database latihan
include '../../koneksi.php';

//hapus data dari tabel kontak
$hapus = mysqli_query($koneksi, "DELETE FROM login WHERE userid = '$id'");

//set session sukses
$_SESSION["sukses"] = 'Data Berhasil Dihapus';

//redirect ke halaman index.php
header('Location: ./pengguna.php');   