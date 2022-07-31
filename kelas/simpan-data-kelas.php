<?php
	require_once '../lib/koneksi.php';
	$kodekls = htmlentities(trim($_POST['kodekls']));
	$namakls = htmlentities(trim($_POST['namakls']));
	$result = mysqli_query($conn, "INSERT INTO tb_kelas (kodekls, namakls)
	VALUES ('$kodekls', '$namakls')") or die(mysqli_error($conn));
	header("location: data-kelas.php");
?>