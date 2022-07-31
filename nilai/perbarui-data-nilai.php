<?php
	include "../lib/koneksi.php";
	$idnilai = htmlentities(trim($_POST['idnilai']));
	$nis = htmlentities(trim($_POST['nis']));
	$kodepelajaran = htmlentities(trim($_POST['kodepelajaran']));
	$semester = htmlentities(trim($_POST['semester']));
	$nilai = htmlentities(trim($_POST['nilai']));
	if ($nilai >= 90) {
		$predikat = "A";
	}
	elseif ($nilai >= 80 && $nilai < 90) {
		$predikat = "B";
	}
	elseif ($nilai >= 70 && $nilai < 80) {
		$predikat = "C";
	}
	elseif ($nilai >= 60 && $nilai < 70) {
		$predikat = "D";
	}else{
		$predikat = "E";
	}
	$data = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE nis = '$nis' AND semester = '$semester'");
	$sql = ("UPDATE tb_nilai SET nis = '$nis', kodepelajaran = '$kodepelajaran', nilai = '$nilai', predikat = '$predikat', semester = '$semester' WHERE idnilai = '$idnilai'") or die(mysqli_error($conn));
		$result = mysqli_query($conn, $sql);	
		if ($result) {
			mysqli_close($conn);
			echo "<script type='text/javascript'>
					alert('Data Berhasil Diubah'); 
					window.location.href='data-nilai.php';
				</script>"; 
		} else {
			mysqli_close($conn);
			echo "<script type='text/javascript'>
					alert('Data Gagal di Edit'); 
					window.location.href='data-nilai.php';
				</script>"; 
		}
?>