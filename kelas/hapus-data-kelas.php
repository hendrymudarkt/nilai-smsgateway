<?php
	include '../lib/koneksi.php';
	$kodekls = $_GET['kodekls'];
	$sql = "DELETE FROM tb_kelas WHERE kodekls = '$kodekls'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-kelas.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-kelas.php';
			  </script>"; 
	}
?>