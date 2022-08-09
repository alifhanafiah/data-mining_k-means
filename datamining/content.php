<!-- mengecek apakah modul kosong, jika tidak maka ke home.php -->
<?php
if(!empty($_GET["module"])){
	include_once($_GET["module"].".php");
	
}else{
	include"home.php";
}
