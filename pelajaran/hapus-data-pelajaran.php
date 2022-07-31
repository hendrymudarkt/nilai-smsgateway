<?php
	include '../lib/koneksi.php';
	$kodepelajaran = $_GET['kodepelajaran'];
	$sql = "DELETE FROM tb_pelajaran WHERE kodepelajaran = '$kodepelajaran'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-pelajaran.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-pelajaran.php';
			  </script>"; 
	}
?>