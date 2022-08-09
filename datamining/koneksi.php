<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "db_datamining";
	
	$kon = mysqli_connect($host, $user, $pass, $db);

    // //untuk testing koneksi
    // if($kon) {
    //     echo "Terkoneksi dengan MySQL server <br>";
    //     echo "Database $db bisa diakses";
    // } else {
    //     echo "Koneksi Gagal";
    // }
?>
