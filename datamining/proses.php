<?php
include("koneksi.php");

// mengambil dan/atau mengubah data dari c1 dan c2
mysqli_query($kon, "UPDATE hasil SET c1x='$_POST[c1x]', c2x='$_POST[c2x]', c1y='$_POST[c1y]', c2y='$_POST[c2y]' WHERE id_hasil='1'");

// konfirmasi jika data c1 dan c2 berhasil di proses
echo "<script>alert('Data berhasil diproses');window.location.href='index.php?module=hasil'</script>";
?>