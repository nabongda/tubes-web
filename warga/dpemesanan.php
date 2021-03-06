<?php
    session_start();
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

  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>

  <script>
  $(document).ready(function(){
    $("#kec").change(function(){
      var kec=$("#kec").val();
      $.ajax({
        type:"post",
        url:"gettpu.php",
        data:"kec="+kec,
        success:function(data){
          $("#tpu").html(data);
        }
      });
    });
  });

  $(document).ready(function(){
    $("#tpu").change(function(){
      var tpu=$("#tpu").val();
      $.ajax({
        type:"post",
        url:"getunit.php",
        data:"tpu="+tpu,
        success:function(data){
          $("#unit").html(data);
        }
      });
    });
  });

  $(document).ready(function(){
    $("#unit").change(function(){
      var unit=$("#unit").val();
      $.ajax({
        type:"post",
        url:"gettpuunit.php",
        data:"unit="+unit,
        success:function(data){
          $("#tpuunit").html(data);
        }
      });
    });
  });

  $(document).ready(function(){
    $("#tpuunit").change(function(){
      var tpuunit=$("#tpuunit").val();
      $.ajax({
        type:"post",
        url:"getpetak.php",
        data:"tpuunit="+tpuunit,
        success:function(data){
          $("#petak").html(data);
        }
      });
    });
  });
  </script>
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
              <p style="color: white !important">Pesan Makam</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="testimoni.php" class="nav-link">
              <i class="nav-icon fas fa-object-group"></i>
              <p style="color: white !important">Testimoni</p>
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
              <li class="breadcrumb-item active">Pilih Makam</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">Pilih Makam</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="proses_transaksi.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kec">Kecamatan</label><br>
                    <select class="form-control" name="kec" id="kec" required="">
                      <option value="">-Pilih Kecamatan-</option>
                      <?php 
                      include_once('../koneksi.php');
                      $result=mysqli_query($mysqli, "SELECT id_kec,nama_kec from kecamatan");
                      while($kec=mysqli_fetch_array($result)){
                      
                      echo "<option value=$kec[id_kec]>$kec[nama_kec]</option>";
               
                      } ?>
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="tpu">TPU</label><br>
                    <select class="form-control" name="tpu" id="tpu" required>
                      <option value="">-Pilih TPU-</option>
                      >
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="unit">Unit</label><br>
                    <select class="form-control" name="unit" id="unit" required>
                      <option value="">-Pilih Unit-</option>
                      >
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tpuunit">TPU Unit</label><br>
                    <select class="form-control" name="tpuunit" id="tpuunit" required>
                      <option value="">-Pilih TPU Unit-</option>
                      >
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="petak">Petak</label><br>
                    <select class="form-control" name="petak" id="petak" required>
                      <option value="">-Pilih Petak-</option>
                      >
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="submit" value="submit">Pesan</a></button>
                </div>
              </form>
              <?php
               if(isset($_POST['submit'])) {
                 $petak=$_POST['petak'];

                 include_once("../koneksi.php");

                 $result=mysqli_query($mysqli, "INSERT INTO transaksi_detail(no_petak) VALUES ('$petak')");

                 header('location:transaksi.php');
               }
              ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.17.custom.min.js"></script>
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