<?php
  include_once "../koneksi.php";

  $unit=$_POST["unit"];

  $result = mysqli_query($mysqli, "SELECT tpu_unit.id_tu, tpu.nama_tpu, unit.nama_unit FROM tpu_unit JOIN unit ON unit.id_unit = tpu_unit.id_unit JOIN tpu ON tpu.id_tpu=tpu_unit.id_tpu WHERE tpu_unit.id_unit = $unit");

  echo"<option value=''>-Pilih TPU Unit-</option>";
  while($tpuunit=mysqli_fetch_array($result)){
  	echo "<option value=$tpuunit[id_tu]>$tpuunit[nama_tpu]-$tpuunit[nama_unit]</option>";
  }

?>