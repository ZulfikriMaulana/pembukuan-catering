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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hena Catering</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="css/style.css" rel="stylesheet">

</head>

<body>

	<div class="example3">
		<nav class="navbar navbar-inverse navbar-static-top blue">
			<div class="container">
				<div id="navbar3" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<?php
						if (isset($_SESSION["role"])) {
							if ($_SESSION["role"] == "admin") {
						?>
								<li><a href="index.php?p=lihatpesanan">Kelola Pesanan</a></li>
							<?php
							} else if ($_SESSION["role"] == "owner") //owner
							{
							?>
								<li><a href="index.php?p=lihatuser">Kelola User</a></li>
								<li><a href="index.php?p=tambahpesanan">Pesanan</a></li>
								<li><a href="index.php?p=laporan">Laporan</a></li>
							<?php
							}
							?>
							<li><a href="index.php?p=logout">Logout</a></li>
						<?php
						} else {
						?>
							<li><a href="index.php?p=login">Login</a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container">
		<?php
		if (isset($_SESSION["role"])) {
			echo "Selamat datang, <b>" . $_SESSION["email"] . "</b>" . "<br>";
			echo "Anda login sebagai <b>" . $_SESSION["role"] . "</b>";
		}
		?>

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
			include($pages_dir . '/login.php');
		}
		?>
	</div>
	<footer class="page-footer blue center-on-small-only col-md-6 container">
		<div class="footer-copyright text-center rgba-black-light">
			© 2023 Copyright: Hena Catering </a>
		</div>
	</footer>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</body>

</html>