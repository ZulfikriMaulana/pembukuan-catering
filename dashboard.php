<?php
if (!isset($_SESSION)) {
	session_start();
}
require "inc.koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Administrator - Pembukuan Hena Catering</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	
	<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	
 
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <style>
    #table-datatable {
      width: 100% !important;
    }

    #table-datatable .sorting_disabled {
      border: 1px solid #f4f4f4;
    }
  </style>
  <div class="wrapper">

    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b><i class="fa fa-money"></i></b> </span>
        <span class="logo-lg"><b>Keuangan</b>Catering</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">   
			  <?php
				if (isset($_SESSION["userid"])) {
			  ?>
					<span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['nama_role']; ?></span>
			  <?php
				}
			  ?>

                
              </a>
            </li>
            <li>
              <a href="dashboard.php?p=logout"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
           
          </div>
          
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="dashboard.php">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>
    <?php
          if(isset($_SESSION["nama_role"]))
						{ 							
									if($_SESSION["nama_role"] == "admin")
									{						
        ?>
          <li>
            <a href="dashboard.php?p=lihatpesanan">
              <i class="fa fa-folder"></i> <span>DATA PESANAN</span>
            </a>
          </li>

          <li>
            <a href="dashboard.php?p=lihattransaksi">
              <i class="fa fa-folder"></i> <span>DATA TRANSAKSI</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-hand-paper-o"></i>
              <span>LAPORAN</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: block;">
              <li><a href="dashboard.php?p=laporanharian"><i class="fa fa-circle-o"></i> LAPORAN HARIAN</a></li>
              <li><a href="dashboard.php?p=laporanbulanan"><i class="fa fa-circle-o"></i> LAPORAN BULANAN</a></li>
              <li><a href="dashboard.php?p=laporantahunan"><i class="fa fa-circle-o"></i> LAPORAN TAHUNAN</a></li>
            </ul>
          </li>
          <?php
                  }
                  else {

          ?>

          <li>
            <a href="dashboard.php?p=lihatuser">
              <i class="fa fa-users"></i> <span>DATA PENGGUNA</span>
            </a>
          </li>

          <li>
            <a href="laporan.php">
              <i class="fa fa-file"></i> <span>LAPORAN</span>
            </a>
          </li>
          <?php
                  }
            }
            ?>
          <li>
            <a href="dashboard.php?p=lihatpelanggan">
              <i class="fa fa-users"></i> <span>PELANGGAN</span>
            </a>
          </li>
          <li>
            <a href="dashboard.php?p=lihatkategori">
              <i class="fa fa-folder"></i> <span>KATEGORI</span>
            </a>
          </li>
          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>GANTI PASSWORD</span>
            </a>
          </li>

          <li>
            <a href="dashboard.php?p=logout">
              <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
	 <!-- /.content-wrapper -->

	 
<div class="content-wrapper">

<?php
		$pages_dir = 'pages';
		if (!empty($_GET['p'])) {
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);

			$p = $_GET['p'];
			if (in_array($p . '.php', $pages)) {
				include($pages_dir . '/' . $p . '.php');
			} else {
				echo 'Halaman tidak ditemukan! :(';
			}
		} else {
			include($pages_dir . '/home.php');
		}
		?>


</div>
	 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2023</strong> - Hena Catering
  </footer>
  </div>

  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/bower_components/raphael/raphael.min.js"></script>
<script src="assets/bower_components/morris.js/morris.min.js"></script>
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script><script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="assets/dist/js/pages/dashboard.js"></script>

<script src="assets/dist/js/demo.js"></script>
<script src="assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="assets/bower_components/chart.js/Chart.min.js"></script>



    
	
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
 

</body>

</html>