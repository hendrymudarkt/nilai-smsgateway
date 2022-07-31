<?php
	include '../lib/koneksi.php';
	$idnilai = $_GET['idnilai'];
	$sql = "DELETE FROM tb_nilai WHERE idnilai = '$idnilai'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-nilai.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-nilai.php';
			  </script>"; 
	}
?>