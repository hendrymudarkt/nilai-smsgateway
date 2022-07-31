<?php
	include "../lib/koneksi.php";
	$kodekls = htmlentities(trim($_POST['kodekls']));
	$namakls = htmlentities(trim($_POST['namakls']));
	$sql = ("UPDATE tb_kelas SET namakls = '$namakls' WHERE kodekls = '$kodekls'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-kelas.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data-kelas.php';
			  </script>"; 
	}
?>