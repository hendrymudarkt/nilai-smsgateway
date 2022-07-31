<?php
session_start();
if($_SESSION['StatusLogin']=="OK")
{
  ?>
<?php
  include '../lib/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMP Murni Padang</title>
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
    <div class="row">
      <div class="span12">
      <div class="input-group">
      <legend>Tambah Data Pelajaran</legend>
        <form method="POST" action="simpan-data-pelajaran.php">
          <table>
            <tr>
              <td><label>Kode Pelajaran</label></td>
              <td>&nbsp;</td>
              <td><input type="text" name="kodepelajaran" class="form-control" id="kodepelajaran" required></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nama Pelajaran</label></td>
              <td>&nbsp;</td>
              <td><input type="text" name="namapelajaran" class="form-control" id="namapelajaran" required></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table><br>
        <input type="submit" class="btn btn-info" name="submit" value="Simpan"></input>
        <input type="submit" class="btn btn-info" name="submit" value="Batal"></input>
      </form>
      </div>
    </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
else
{
 header("location:../login.php");
}
?>