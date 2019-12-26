<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrasi Pemakaman</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		
	</head>

	<body>

		<div class="wrapper" style="background-image: url('bg.jpg');">
			<div class="inner">
				<div class="image-holder" style="padding-top: 140px;" align="center">
					<img src="kubur.png" width="80%"><br><br>
					<a class="txt1" href="../index.php">
							Sudah punya akun? Login disini
					</a>
				</div>
				<form action="registrasi.php" method="post">
					<h3>Registrasi</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Nama Lengkap" class="form-control" name="nama" required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="username" required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper pmd-textfield pmd-textfield-floating-label">
						<input type="date" placeholder="Tanggal Lahir" class="form-control" id="datepicker" name="ttl" required>
						<i class="zmdi zmdi-calendar"></i>
					</div>
					<div class="form-wrapper">
						<label>Jenis Kelamin</label><br>
						<input type="radio" name="jk" value="Laki-laki">&nbsp; Laki-Laki
						<input type="radio" name="jk" value="Perempuan">&nbsp; Perempuan
					</div><br>
					<div class="form-wrapper">
						<input type="password" placeholder="Kata Sandi" class="form-control" name="password" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Konfirmasi Kata Sandi" class="form-control" name="kpassword" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button name="registrasi" type="submit">Registrasi
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>

		<script type="text/javascript">
			function pesan(){
				alert('Registrasi berhasil!');
			}
		</script>

	<!-- jquery JS -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<!-- Bootstrap js -->
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Propeller textfield js --> 
	<script type="text/javascript" src="dist/js/propeller.min.js"></script>

	<!-- Datepicker moment with locales -->
	<script type="text/javascript" language="javascript" src="datetimepicker/js/moment-with-locales.js"></script>

	<!-- Propeller Bootstrap datetimepicker -->
	<script type="text/javascript" language="javascript" src="datetimepicker/js/bootstrap-datetimepicker.js"></script>

	<script>
		// Date picker only
		$('#datepicker').datetimepicker({
			format: 'DD-MM-YYYY'
		});
	</script>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>