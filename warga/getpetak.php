<?php

include_once "../koneksi.php";
   
   /*$result=mysqli_query($mysqli, "SELECT * FROM petak WHERE petak.id_tu='$_POST[tpuunit]'");*/

   $tpuunit=$_POST["tpuunit"];

   // $result=mysqli_query($mysqli, "SELECT id_petak, nama_petak FROM petak WHERE id_tu='$tpuunit");

   $result=mysqli_query($mysqli, "SELECT * FROM petak WHERE id_tu = $tpuunit");

   echo "<option value=''>-Pilih Petak-</option>";

   while($petak=mysqli_fetch_array($result)){
   	echo"<option value=$petak[no_petak]>$petak[no_petak]</option>";
   }

?>