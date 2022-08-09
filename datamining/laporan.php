<div class="laporan">
	<!-- header -->
	<h3>Report</h3>

	<!-- tombol untuk mencetak hasil -->
	<p><a href="cetak.php" class="btn btn-more cetak" target="_blank">Cetak</a></p>

	<!-- mengambil data c1 dan c2 dari database -->
	<?php
	$sql_edit = mysqli_query($kon, "SELECT * FROM hasil WHERE id_hasil='1'");
	$row =  mysqli_fetch_array($sql_edit);

	// deklarasi variabel
	$px1 = $row['c1x'];
	$py1 = $row['c2x'];

	$px2 = $row['c1y'];
	$py2 = $row['c2y'];

	$ac1 = 0;
	$ac2 = 0;
	$it = 1;

	$no = 1;
	$q = mysqli_query($kon, "SELECT * FROM data ORDER BY id ASC");
	while ($r = mysqli_fetch_array($q)) {
		$min = 0;
		// mencari total
		$sub = $r['jan'] + $r['feb'] + $r['mar'];

		// mencari jarak
		$c1 = sqrt((pow(($r['stok'] - $px1), 2)) + (pow(($sub - $py1), 2)));
		$c2 = sqrt((pow(($r['stok'] - $px2), 2)) + (pow(($sub - $py2), 2)));
		$min = 0;

		// memilih jarak terkecil
		$min = min($c1, $c2);

		// melihat apakah c1 / c2 sama dengan min
		if ($c1 == $min) {
			$ketmin = "C1";
			$ac1++;
			$agtc1x[] = $r['stok'];
			$agtc1y[] = $sub;
		} elseif ($c2 == $min) {
			$ketmin = "C2";
			$ac2++;
			$agtc2x[] = $r['stok'];
			$agtc2y[] = $sub;
		}
		$no++;
	}

	foreach ($agtc1x as $key) {
		$tcx1 = $tcx1 + $key;
	}
	foreach ($agtc1y as $key) {
		$tcy1 = $tcy1 + $key;
	}
	foreach ($agtc2x as $key) {
		$tcx2 = $tcx2 + $key;
	}
	foreach ($agtc2y as $key) {
		$tcy2 = $tcy2 + $key;
	}
	//$px1=$tcx1/4;
	$px1 = 38.1666;
	//$py1=$tcy1/$ac1;
	$py1 = 31.25;

	//$px2=$tcx2/$ac2;
	$px2 = 24.875;
	//$py2=$tcy2/$ac2;
	$py2 = 12.875;
	$ac1 = 0;
	$ac2 = 0;
	$it++;
	?>

	<!-- table -->
	<table class="laporan__table">
		<thead>
			<tr>
				<th rowspan=2>No</th>
				<th rowspan=2>Nama Barang</th>
				<th rowspan=2>Total Stok Barang</th>
				<th colspan=3>
					<center>Penjualan</center>
				</th>
				<th rowspan=2>Total</th>
				<th rowspan=2>C1</th>
				<th rowspan=2>C2</th>
				<th rowspan=2>Hasil</th>
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
				<td>$sub</td>";

				// mencari jarak
				$c1 = sqrt((pow(($r['stok'] - $px1), 2)) + (pow(($sub - $py1), 2)));
				$c2 = sqrt((pow(($r['stok'] - $px2), 2)) + (pow(($sub - $py2), 2)));

				// mencari jarak minimal
				$min = min($c1, $c2);

				// mencari nilai yang paling kecil dari c1 dan c2
				if ($min == $c1) {
					$ketmin = "Laris";
				} else {
					$ketmin = "Tidak Laris";
				}
				echo "<td>" . number_format($c1, 2) . "</td>
					<td>" . number_format($c2, 2) . "</td>
					<td>$ketmin</td>
				</tr>";
				// menambahkan nomor urut
				$no++;
			}
			?>
		</tbody>
	</table>
</div>