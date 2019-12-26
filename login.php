<?php 

if (isset($_POST['login'])) {
	// mengaktifkan session pada php
	session_start();

	// menghubungkan php dengan koneksi database
	include_once "koneksi.php";

	// menangkap data yang dikirim dari form login
	$username = $_POST['username'];
	$password = $_POST['password'];
	$kodecaptcha = $_POST['kodecaptcha'];


	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($mysqli,"SELECT * FROM user where username='$username' and kata_sandi='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);

	
		if($cek > 0){

			$data = mysqli_fetch_array($login);

			if ($kodecaptcha != $_SESSION["code"] OR $_SESSION["code"]=='') {
				echo '<script language="javascript">
				alert ("Kode Captcha Salah!");
				window.location="index.php";
				</script>';
				exit();
			}

			else {
				if($data['level']=="admin"){
					// buat session login dan username
					$_SESSION['username'] = $username;
					$_SESSION['nama_user'] = $data['nama_user'];
					$_SESSION['level'] = "admin";
					// alihkan ke halaman admin
					header("location:../pemakaman/admin/index.php");

				// cek jika user login sebagai warga
				}else if($data['level']=="warga"){
					// buat session login dan username
					$_SESSION['username'] = $username;
					$_SESSION['nama_user'] = $data['nama_user'];
					$_SESSION['level'] = "warga";
					// alihkan ke halaman warga
					header("location:../pemakaman/warga/index.php");
				}else{
					// alihkan ke halaman login kembali
					echo '<script language="javascript">
					alert ("Username / Password Salah!");
					window.location="index.php?pesan=gagal";
					</script>';
					exit();
				}
			}
			
		}
		else {
			echo '<script language="javascript">
					alert ("Username / Password Salah!");
					window.location="index.php?pesan=gagal";
					</script>';
					exit();
				}
		}
?>