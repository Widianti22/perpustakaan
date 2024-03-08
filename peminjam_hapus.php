<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM peminjam WHERE id_peminjam=$id");
 ?>
 <script>
 	alert('Hapus Data Berhasil');
 	location.href ="index.php?page=peminjam";
 </script>