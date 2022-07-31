<?php
	require_once '../lib/koneksi.php';
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
	if (mysqli_num_rows($data) > 0) {
		echo '<script language="Javascript">alert("Data Nilai Sudah Ada"); window.location="data-nilai.php";</script>';
	}else{
		$sql = ("INSERT INTO tb_nilai (idnilai, nis, kodepelajaran, nilai, predikat, semester)
			VALUES ('0', '$nis', '$kodepelajaran', '$nilai', '$predikat', '$semester')
			") or die(mysqli_error($conn));
		$result = mysqli_query($conn, $sql);
		header("location: data-nilai.php");
	}
?>