<?php
	include "../lib/koneksi.php";
	$kodepelajaran = htmlentities(trim($_POST['kodepelajaran']));
	$namapelajaran = htmlentities(trim($_POST['namapelajaran']));
	$sql = ("UPDATE tb_pelajaran SET namapelajaran = '$namapelajaran' WHERE kodepelajaran = '$kodepelajaran'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-pelajaran.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data-pelajaran.php';
			  </script>"; 
	}
?>