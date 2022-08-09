<?php
session_start();
include "koneksi.php";
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Mining | Clustering</title>
	<!-- css -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<!-- mengecek apakah user telah login atau belum -->
	<?php
	if (!empty($_SESSION["useradmin"]) && !empty($_SESSION["passadmin"])) {
	?>
		<!-- navigation -->
		<nav class="nav">
			<ul id="menu" class="box">
				<li><a href="?module=home">Home</a></li>
				<li><a href="?module=data">Data</a></li>
				<li><a href="?module=data_proses">Processing</a></li>
				<li><a href="?module=hasil">Result</a></li>
				<li><a href="?module=laporan">Report</a></li>
				<li><a href="?module=logout">Logout</a></li>
			</ul>
		</nav>

		<!-- main content -->
		<main class="main">
			<div class="box">
				<div class="welcome">
					<h4>Hello, <b><?php echo "$_SESSION[nmadmin]"; ?></b></h4>
					<br>
					<hr>
					<br>
				</div>
				<?php
				include "content.php";
				?>
			</div>
		</main>

		<!-- footer -->
		<?php include "footer.php"; ?>
		
	<?php
	} else {
		include "login.php";
	}
	?>
</body>

</html>