<?php
	include '../lib/koneksi.php';
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$jeniskelamin = $_POST['jeniskelamin'];
	$tempatlahir = $_POST['tempatlahir'];
	$tanggallahir = date('Y-m-d', strtotime($_POST['tanggallahir']));
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$kodekls = $_POST['kodekls'];
	$sql = ("INSERT INTO tb_siswa (nis, nama, jeniskelamin, tempatlahir, tanggallahir, agama, alamat, kodekls)
			VALUES ('$nis', '$nama', '$jeniskelamin', '$tempatlahir', '$tanggallahir', '$agama', '$alamat', '$kodekls')");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	header("location: data-siswa.php");
?>