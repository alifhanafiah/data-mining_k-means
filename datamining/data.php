<div class="data">
	<!-- memeriksa apakah user menekan tombol atau tidak -->
	<?php
	switch (@$_GET['act']) {
		default:
	?>
			<!-- header -->
			<h3>Data</h3>

			<!-- tombol untuk menambah data -->
			<p><a href='?module=data&act=tambah' class='btn btn-more tambah'>Tambah</a></p>

			<!-- table -->
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
						<th rowspan=2>Aksi</th>
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
					$q = mysqli_query($kon, "SELECT * FROM data ORDER BY nama_barang ASC");
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
						<td align='center'>
							<a href='?module=data&act=edit&id=$r[id]' class='btn btn-more'>Edit</a>
							<a href='?module=data&act=hapus&id=$r[id]' class='btn btn-more' onclick=\"return confirm('Apakah anda yakin untuk menghapus data ?')\">Delete</a>
						</td>
					</tr>
					";
						// menambahkan nomor urut
						$no++;
					}
					?>
				</tbody>
			</table>
		<?php
			break;

			// jika tombol tambah di tekan
		case "tambah":
			if (isset($_POST['simpan'])) {
				mysqli_query($kon, "INSERT INTO data VALUES('','$_POST[nm]','$_POST[stok]','$_POST[jan]','$_POST[feb]','$_POST[mar]');");

				// konfirmasi jika data berhasil di simpan
				echo "<script>alert('Data Berhasil Disimpan');window.location.href='?module=data';</script>";
			}
		?>
			<!-- header -->
			<h3> Tambah Barang</h3>

			<!-- form untuk mengisi data -->
			<form id="form--add" method="post" action="" enctype="multipart/form-data">
				<fieldset>
					<div class="form__input">
						<label class="form__input__label" for="nm">Nama Barang</label><br>
						<input type="text" id="nm" name="nm"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="stok">Total Stok</label><br>
						<input type="text" id="stok" name="stok"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="jan">Januari</label><br>
						<input type="text" id="jan" name="jan"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="feb">Februari</label><br>
						<input type="text" id="feb" name="feb"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="mar">Maret</label><br>
						<input type="text" id="mar" name="mar"><br>
					</div>
					<div class="form__btn">
						<button type="submit" name="simpan" class="btn btn-more">Save</button>
						<button class="btn btn-more">Cancel</button>
					</div>
				</fieldset>
			</form>
		<?php
			break;

			// jika tombol edit ditekan
		case "edit":
			$r = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM data WHERE id='$_GET[id]'"));
			if (isset($_POST['simpan'])) {
				mysqli_query($kon, "UPDATE data SET nama_barang='$_POST[nm]',stok='$_POST[stok]',jan='$_POST[jan]',feb='$_POST[feb]',mar='$_POST[mar]' WHERE id='$_GET[id]'");

				// konfirmasi jika data berhasil diubah
				echo "<script>alert('Data berhasil diubah');window.location.href='?module=data';</script>";
			}
		?>
			<!-- header -->
			<h3> Edit Barang</h3>

			<!-- form untuk mengedit data -->
			<form id="form--edit" method="post" action="" enctype="multipart/form-data">
				<fieldset>
					<div class="form__input">
						<label class="form__input__label" for="nm">Nama Barang</label><br>
						<input type="text" id="nm" name="nm" value="<?php echo "$r[nama_barang]"; ?>"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="stok">Total Stok</label><br>
						<input type="text" id="stok" name="stok" value="<?php echo "$r[stok]"; ?>"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="jan">Januari</label><br>
						<input type="text" id="jan" name="jan" value="<?php echo "$r[jan]"; ?>"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="feb">Februari</label><br>
						<input type="text" id="feb" name="feb" value="<?php echo "$r[feb]"; ?>"><br>
					</div>
					<div class="form__input">
						<label class="form__input__label" for="mar">Maret</label><br>
						<input type="text" id="mar" name="mar" value="<?php echo "$r[mar]"; ?>"><br>
					</div>
					<div class="form__btn">
						<button type="submit" name="simpan" class="btn btn-more">Ubah</button>
						<button class="btn btn-more">Cancel</button>
					</div>
				</fieldset>
			</form>
	<?php
			break;

			// jika tombol hapus ditekan
		case "hapus":
			if (isset($_GET['id'])) {
				mysqli_query($kon, "DELETE FROM data WHERE id='$_GET[id]';");
				
				// konfirmasi jika data berhasil dihapus
				echo "<script>alert('Data berhasil dihapus');window.location.href='?module=data';</script>";
			}
			break;
	}
	?>
</div>