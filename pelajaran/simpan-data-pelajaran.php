<?php
	require_once '../lib/koneksi.php';
	$kodepelajaran = htmlentities(trim($_POST['kodepelajaran']));
	$namapelajaran = htmlentities(trim($_POST['namapelajaran']));
	$sql = ("INSERT INTO tb_pelajaran (kodepelajaran, namapelajaran)
			VALUES ('$kodepelajaran', '$namapelajaran')
			") or die(mysql_error());
	$result = mysqli_query($conn, $sql);
	header("location: data-pelajaran.php");
?>