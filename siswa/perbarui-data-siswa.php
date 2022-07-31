<?php
	include '../lib/koneksi.php';
	$nis = htmlentities(trim($_POST['nis']));
	$nama = htmlentities(trim($_POST['nama']));
	$jeniskelamin = htmlentities(trim($_POST['jeniskelamin']));
	$tempatlahir = htmlentities(trim($_POST['tempatlahir']));
	$tanggallahir = date('Y-m-d', strtotime($_POST['tanggallahir']));
	$agama = htmlentities(trim($_POST['agama']));
	$alamat = htmlentities(trim($_POST['alamat']));
	$kodekls = htmlentities(trim($_POST['kodekls']));
	$sql = ("UPDATE tb_siswa SET nama = '$nama', jeniskelamin = '$jeniskelamin', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', agama = '$agama', alamat = '$alamat', kodekls = '$kodekls' WHERE nis = '$nis'") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-siswa.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data-siswa.php';
			  </script>"; 
	}
	header("location:data-siswa.php");
?>