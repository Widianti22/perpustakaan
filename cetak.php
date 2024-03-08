<h2 align="center">Laporan Peminjaman Buku</h2>	
<table border="1" cellspacing="0" cellpadding="5" width="100%">
			<tr>
				<th>No</th>
				<th>User</th>
				<th>Buku</th>
				<th>Tanggal Peminjam</th>
				<th>Tanggal pengembali</th>
				<th>Status Peminjam</th>
			</tr>
			<?php 
			include "koneksi.php";
			$i = 1;
				$query = mysqli_query($koneksi, "SELECT*FROM peminjam LEFT JOIN user on user.id_user = peminjam.id_user LEFT JOIN buku on buku.id_buku = peminjam.id_buku");
				while($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['judul']; ?></td>
						<td><?php echo $data['tanggal_peminjam']; ?></td>
						<td><?php echo $data['tanggal_pengembali']; ?></td>
						<td><?php echo $data['status_peminjam']; ?></td>
					</tr>
					<?php
				}
			?>
		</table>
		<script>
			window.print();
			setTimeout(function() {
			}, 100);
		</script>