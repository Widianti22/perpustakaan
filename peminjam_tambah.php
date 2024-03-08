<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
	<div class="card-body">
		<div class="row">
		<div class="col-md-12">
				<form class="form-group" method="post">
					<?php 
						if(isset($_POST['submit'])) { 
							$id_user = $_SESSION['user']['id_user'];
							$id_buku = $_POST['id_buku'];
							$tanggal_peminjam = $_POST['tanggal_peminjam'];
							$tanggal_pengembali = $_POST['tanggal_pengembali'];
							$status_peminjam = $_POST['status_peminjam'];

							$query = mysqli_query($koneksi, "INSERT INTO peminjam(id_user,id_buku,tanggal_peminjam,tanggal_pengembali,status_peminjam) values('$id_user','$id_buku','$tanggal_peminjam','$tanggal_pengembali','$status_peminjam')");

							if($query) {
								echo '<script>alert("Tambah Data Berhasil.");</script>'; 
							}else{
								echo '<script>alert("Tambah Data Gagal.");<script>';
							}
						}

					 ?>
					<div class="row mb-3">
						<div class="col-md-2">Buku</div>
						<div class="col-md-8">
							<select name="id_buku" class="form-control">
								<?php 

								$buk = mysqli_query($koneksi, "SELECT*FROM buku");
								while($buku = mysqli_fetch_array($buk)) {
									?>
									<option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
									<?php
								}	
							?>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-2">Tanggal Peminjam</div>
						<div class="col-md-8">
							<input type="date" class="form-control" name="tanggal_peminjam">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-2">Tanggal Pengembali</div>
						<div class="col-md-8">
							<input type="date" class="form-control" name="tanggal_pengembali">
						</div>
					</div>

						<div class="row mb-3">
						<div class="col-md-2">Status Peminjam</div>
						<div class="col-md-8">
							<select name="status_peminjam" class="form-control">
								<option value="dipinjam">Dipinjam</option>
								<option value="dikembalikan">Dikembalikan</option>
							</select>
						</div>
					</div>


					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							<button type="reset" class="btn btn-secondary">Reset</button>
							<a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
</div>
 </body>
 </html>