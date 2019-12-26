<?php

$petak=$_POST['petak'];

include_once("../koneksi.php");
$harga = '';
$result=mysqli_query($mysqli, "SELECT * FROM petak WHERE no_petak = '$petak'");
while($data=mysqli_fetch_array($result)){
	$harga = $data['harga'];
               
}

header('location:transaksi.php?petak='.$petak.'&harga='.$harga);

?>