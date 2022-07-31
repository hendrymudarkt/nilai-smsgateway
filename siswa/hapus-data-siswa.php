<?php
	include '../lib/koneksi.php';
	$nis = $_GET['nis'];
	$sql = "DELETE FROM tb_siswa WHERE nis = '$nis'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-siswa.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-siswa.php';
			  </script>"; 
	}
?>