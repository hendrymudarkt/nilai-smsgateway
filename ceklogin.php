<?php	
	include 'lib/koneksi.php';
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = ("SELECT * FROM tb_petugas WHERE username = '$username' AND password = '$password'");
	$result = mysqli_query($conn, $sql) or die(mysql_error());
	if (mysqli_num_rows($result) == 1)
	{
		session_start();
		$pengguna = mysqli_fetch_array($result);
		$_SESSION['username'] = $pengguna['username'];
		$_SESSION['StatusLogin']= "OK";
		header("location: index.php");
	}
	else
	{
	?>
		<script>
			alert("Username atau password salah !");
			history.go(-1);
		</script>
	<?php		
	}
?>