<div class="data__proses">
	<!-- header -->
	<h3>Processing</h3>

	<!-- mengambil data c1 dan c2 dari database -->
	<?php
	include("koneksi.php");
	$sql_edit = mysqli_query($kon, "SELECT * FROM hasil WHERE id_hasil='1'");
	$row =  mysqli_fetch_array($sql_edit);
	?>

	<!-- form untuk memasukkan data c1 dan c2
			form akan dibuka di tab baru dan di arahkan ke hasil -->
	<form name="form1" method="post" action="proses.php" id="data-proses__form">
		<table class="data-proses__table">
			<tr>
				<td class="center"><b>C1x</b></td>
				<td><input type="text" name="c1x" value="<?php echo "$row[c1x]"; ?>"></td>
				<td class="center"><b>C2x</b></td>
				<td><input type="text" name="c2x" value="<?php echo "$row[c2x]"; ?>"></td>
			</tr>
			<tr>
				<td class="center"><b>C1y</b></td>
				<td><input type="text" name="c1y" value="<?php echo "$row[c1y]"; ?>"></td>
				<td class="center"><b>C2y</b></td>
				<td><input type="text" name="c2y" value="<?php echo "$row[c2y]"; ?>"></td>
			</tr>
			<tr>
				<td colspan=4><input type="submit" name="simpan" value="PROSES" class="btn btn-more"></td>
			</tr>
		</table>
	</form>

	<!-- tabel  -->
	<table class="data__table">
		<thead>
			<tr>
				<th rowspan=2>No</th>
				<th rowspan=2>Nama Barang</th>
				<th rowspan=2>Total Stok Barang</th>
				<th colspan=3>
					<center>Penjualan</center>
				</th>
				<th rowspan=2>Total</th>
			</tr>
			<tr>
				<th>Januari</th>
				<th>Februari</th>
				<th>Maret</th>
			</tr>
		</thead>

		<!-- data di dalam table -->
		<tbody>
			<?php
			$no = 1;
			$q = mysqli_query($kon, "SELECT * FROM data ORDER BY id ASC");
			while ($r = mysqli_fetch_array($q)) {
				// mencari total
				$sub = $r['jan'] + $r['feb'] + $r['mar'];
				echo "
					<tr>
						<td>$no</td>
						<td>$r[nama_barang]</td>
						<td>$r[stok]</td>
						<td>$r[jan]</td>
						<td>$r[feb]</td>
						<td>$r[mar]</td>
						<td>$sub</td>
					</tr>
					";
				// menambahkan nomor urut
				$no++;
			}
			?>
		</tbody>
	</table>
</div>