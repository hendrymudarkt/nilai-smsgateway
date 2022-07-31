<?php
    include "lib/koneksi.php";
    session_start();
    $_SESSION['StatusLogin'];
    if($_SESSION['StatusLogin']=="OK")
    {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel=”icon” type=”image/png” href="assets/img/favicon.png">
    <title>SMP Murni Padang</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body style="min-height: 500px">
  <?php
  include 'menu.php';
  ?>
    <div class="container well">
      <div class="blog-header">
        <h1 class="blog-title">Website Nilai SMS Gateway</h1>
        <p class="lead blog-description">Deskripsi Aplikasi:</p>
      </div>
      <div class="row">
      <div class="col-sm-12 blog-main">
        <p>Website Nilai SMS Gateway adalah Website yang berguna untuk mengelola data nilai siswa menjadi suatu informasi berupa pesan SMS yang dapat diakses melalui perangkat seluler.</p>Untuk memperoleh informasi tersebut dapat dilakukan dengan cara mengirimkan pesan dengan format yang telah disesuaikan seperti berikut:</p>
        <ul>
		      <li>CEK NILAI (NIM) (SEMESTER) => Untuk mengetahui nilai siswa</li>
          <ol>Contoh : <b>CEK NILAI 1610051 Ganjil</b></ol>
        </ul>
      </div>
      </div>
    </div>
    <center><img src="assets/img/logo.jpg" alt="" height="200px" width="200px"></center>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
    }
    else
    {
    header("location:login.php");
    }
    ?>  