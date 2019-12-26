 <?php

include_once("../koneksi.php");

if (isset($_POST['submit'])) {
	$namap=$_POST['namap'];
 	$isi=$_POST['deskripsi'];

 	$user=mysqli_query($mysqli, "SELECT * FROM user WHERE nama_user='$namap'");
 	$ambil=mysqli_fetch_assoc($user);

 	$result=mysqli_query($mysqli, "INSERT INTO testimoni(id_user, isi) VALUES ('".$ambil['id_user']."', '$isi')");

 	header('location:testimoni.php');
}

 

?>