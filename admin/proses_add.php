<?php
$nama=$_POST['nama'];
$nik=$_POST['nik'];
$jk=$_POST['jk'];
$tgl=$_POST['tgl'];
$pendidikan=$_POST['pendidikan'];
$pekerjaan=$_POST['pekerjaan'];

// Create database connection using config file
include_once("../koneksi.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "INSERT INTO penduduk(Nama, Nik, Jenis_kelamin, Tanggal_lahir, Pendidikan, Pekerjaan) VALUES ('$nama','$nik','$jk','$tgl','$pendidikan','$pekerjaan')");

header("location:kependudukan.php");
?>