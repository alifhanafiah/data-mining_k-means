<div id="login" class="box">
	<!-- fieldset untuk loginnya -->
	<fieldset>
		<form name="form1" method="post" action="" enctype="multipart/form-data" autocomplete="off" class="form__login">
			<img src="../datamining/images/avatar.png" alt="avatar" width="30%;" style="margin-top: -10em;"><br>
			<label for="username">Username</label><br>
			<input name="username" type="text" id="username" autocomplete="off" placeholder="Masukkan username anda di sini"><br>
			<br>
			<label for="password">Password</label><br>
			<input name="password" type="password" id="password" placeholder="Masukkan password anda di sini"><br>
			<input name="login" type="submit" value="Login" id="login__btn">
		</form>

		<!-- proses login -->
		<?php
		error_reporting(0);
		session_start();
		include_once("koneksi.php");

		// apakah tombol login di klik atau tidak
		if ($_POST["login"] != "") {
			$user = $_POST["username"];
			$pass = $_POST["password"];

			// memeriksa apakah ada data pada user dan pass
			if ($user != "" && $pass != "") {
				include_once("koneksi.php");
				$em = mysqli_query($kon, "SELECT * FROM admin WHERE password = '$pass' AND username = '$user'");
				$data = mysqli_fetch_assoc($em);

				// memeriksa apakah data yang dimasukkan sama dengan data yang ada pada database
				if ($data["username"] == $user && $data["password"] == $pass) {
					$_SESSION["useradmin"] = $data["username"];
					$_SESSION["passadmin"] = $data["password"];
					$_SESSION["nmadmin"] = $data["nama_lengkap"];

					// kembali ke index
					echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=index.php'>";
				} else {
					echo "<p class='error'>Mohon masukkan username dan password yang benar !!!</p>";
				}
			}
		}
		?>
	</fieldset>
</div>