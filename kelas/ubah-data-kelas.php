<?php
session_start();
if($_SESSION['StatusLogin']=="OK")
{
  ?>
<?php
    include "../lib/koneksi.php";
    $kodekls = htmlentities($_GET['kodekls']);
    $sql = "SELECT * FROM tb_kelas WHERE kodekls = '$kodekls'";
    $result = mysqli_query($conn, $sql);
    $data2 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<?php
// include '../header.php';
?>
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
      <legend>Ubah Data Kelas</legend>
        <form method="POST" action="perbarui-data-kelas.php">
        <table>
            <tr>
              <td><label>Kode Kelas</label></td>
              <td>&nbsp;</td>
              <td><input readonly type="text" name="kodekls" class="form-control" id="kodekls" required value="<?php echo $data2['kodekls']; ?>"></input></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nama Kelas</label></td>
              <td>&nbsp;</td>
              <td><input type="text" name="namakls" class="form-control" id="namakls" required value="<?php echo $data2['namakls'] ?>"></input></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table><br>
        <input type="submit" class="btn btn-info" name="submit" value="Perbarui"></input>
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