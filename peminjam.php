<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
	<div class="card-body">
	<div class="row">
		<div class="col-md-12">
		<a href="?page=peminjam_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah peminjaman</a>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<tr>
				<th>No</th>
				<th>User</th>
				<th>Buku</th>
				<th>Tanggal Peminjam</th>
				<th>Tanggal pengembali</th>
				<th>Status Peminjam</th>
				<th>Aksi</th>
			</tr>
			<?php 
			$i = 1;
				$query = mysqli_query($koneksi, "SELECT*FROM peminjam LEFT JOIN user on user.id_user = peminjam.id_user LEFT JOIN buku on buku.id_buku = peminjam.id_buku WHERE peminjam.id_user=" . $_SESSION['user']['id_user']);
				while($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['judul']; ?></td>
						<td><?php echo $data['tanggal_peminjam']; ?></td>
						<td><?php echo $data['tanggal_pengembali']; ?></td>
						<td><?php echo $data['status_peminjam']; ?></td>
						<td>
							<?php 
								if($data['status_peminjam'] != 'dikembalikan') {
							 ?>
							<a href="?page=peminjam_ubah&&id=<?php echo $data['id_peminjam']; ?>"class="btn btn-info">Ubah</a>
							<a onclick="return confirm('apakah anda yakin menghapus data ini?');" href="?page=peminjam_hapus&&id=<?php echo $data['id_peminjam']; ?>"class="btn btn-danger">Hapus</a>
							<?php 
							}
							?>
						</td>
					</tr>
					<?php
				}
			?>
		</table>
		</div>
	</div>
	</div>
</div>