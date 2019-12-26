<?php

session_start();

include_once("../koneksi.php");

if (isset($_POST['Cari'])) {
    $Cari=$_POST['Cari'];
    $result = mysqli_query($mysqli, "SELECT * FROM data_pesanan WHERE no_petak like '%".$Cari."%'");
}

else{
    $result = mysqli_query($mysqli, "SELECT * FROM data_pesanan");
}


if( isset($_SESSION['username']) ){


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Booking Pemakaman</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <div class="nav-link" style="color: black !important">Sistem Booking Pemakaman</div>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="nav-link">
          <?php 

          echo $_SESSION['nama_user'];
          ?>
        </div>
      </li>
      <li class="nav-item">
        <div class="nav-link">
          <a href="../logout.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #006400 !important">
    <!-- Brand Logo -->
    <a class="brand-link">
      <center><span class="brand-text font-weight-light" style="font-family: Lemon; color: white; font-size: 30px">Graveyard</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="color: white !important">Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="dpemesanan.php" class="nav-link active" style="background-color: #3CB371">
              <i class="nav-icon fas fa-university"></i>
              <p style="color: white !important">Data Pemesanan</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="dtestimoni.php" class="nav-link">
              <i class="nav-icon fas fa-object-group"></i>
              <p style="color: white !important">Data Testimoni</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-title">
              <form method="post">
                <div class="input-group p-3">
                  <input class="form-control" type="text" placeholder="Cari..." name="Cari" required 
                    <?php 
                    if(isset($_POST['Cari'])){
                        echo "value='".$_POST['Cari']."'";
                    }
                    ?>>
                  <div class="input-group-prepend">
                    <input class="btn btn-success btn-sm" type="submit" value="Cari" style="background-color: #52748D !important">
                  </div>
              </div>
            </form>
            </div>
            <div class="card-header border-top">
              <div class="row">
                <div class="col-6">
                  <h3 class="card-title">Data Pemesanan</h3>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body overflow-auto p-0" method="post" action="kependudukan.php">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemesan</th>
                  <th>Nama Jenazah</th>
                  <th>No. Petak</th>
                  <th>Harga</th>
                  <th>Tanggal Transaksi</th>
                  <th>Bukti Transfer</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $No=1;
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$No."</td>";
                    // echo "<td>".$user_data['id_penduduk']."</td>";
                    echo "<td>".$user_data['id_user']."</td>";
                    echo "<td>".$user_data['nama_jenazah']."</td>";
                    echo "<td>".$user_data['no_petak']."</td>";
                    echo "<td>".$user_data['harga']."</td>"; 
                    echo "<td>".$user_data['tgl_trans']."</td>"; 
                    echo "<td>".$user_data['bukti_trans']."</td>";    
                    echo "<td><a href='edit.php?id_trans=$user_data[id_trans]'>Terima</a></td></tr>";
                    $No++;
                }
                ?>
                </tbody>
              </table><br>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 Sepmetda</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php
    }else{
        echo "
            <script>
                alert('Anda harus login!');
            </script>
        ";
        header('Location: ../index.php');
    }
?>