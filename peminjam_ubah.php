<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
	<div class="card-body">
		<div class="row">
		<div class="col-md-12">
				<form method="post">
					<?php 
						$id = $_GET['id'];
						if(isset($_POST['submit'])) { 
							$id_user = $_SESSION['user']['id_user'];
							$id_buku = $_POST['id_buku'];
							$tanggal_peminjam = $_POST['tanggal_peminjam'];
							$tanggal_pengembali = $_POST['tanggal_pengembali'];
							$status_peminjam = $_POST['status_peminjam'];
							$query = mysqli_query($koneksi, "UPDATE peminjam set id_buku='$id_buku', tanggal_peminjam='$tanggal_peminjam', tanggal_pengembali='$tanggal_pengembali', status_peminjam='$status_peminjam' WHERE id_peminjam=$id");

							if($query) {
								echo '<script>alert("Ubah Data Berhasil.");</script>'; 
							}else{
								echo '<script>alert("Ubah Data Gagal.");</script>';
							}
						}
						$query = mysqli_query($koneksi, "SELECT*FROM peminjam where id_peminjam=$id");
						$data = mysqli_fetch_array($query);
					 ?>
					<div class="row mb-3">
						<div class="col-md-2">Buku</div>
						<div class="col-md-8">
							<select name="id_buku" class="form-control">
								<?php 
								$buk = mysqli_query($koneksi, "SELECT*FROM buku");
								while($buku =  mysqli_fetch_array($buk)) {
									?>
									 
									<option <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
									<?php
								}	
							?>
								
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-2">Tanggal Peminjam</div>
						<div class="col-md-8">
							<input type="date" class="form-control" value="<?php echo $data['tanggal_peminjam']; ?>" name="tanggal_peminjam">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-2">Tanggal Pengembali</div>
						<div class="col-md-8">
							<input type="date" class="form-control" value="<?php echo $data['tanggal_pengembali']; ?>" name="tanggal_pengembali">
						</div>
						<div class="row mb-3">
						<div class="col-md-2">Status Peminjam</div>
						<div class="col-md-8">
							<select name="status_peminjam" class="form-control">
								<option value="dipinjam" <?php if($data['status_peminjam'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
								<option value="dikembalikan" <?php if($data['status_peminjam'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
							</select> 
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							<button type="reset" class="btn btn-secondary">Reset</button>
							<a href="?page=peminjam" class="btn btn-danger">Kembali</a>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
</div>