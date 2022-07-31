<?php
error_reporting(0);
session_start();
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
    <title>SMP Murni Padang</title>
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap1.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body>
<?php
  include "../menu.php";
  $kodekls = isset($_POST['kodekls'])? $_POST['kodekls'] : '';
?>
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <img src="../assets/img/padang.png" align="left" width="130" height="130">
  <img src="../assets/img/logo.jpg" align="right" width="130" height="130">
  <div style="border-bottom:solid 2px" id="container">
  <div class="row">
  <h4 align="center"><b>Pemerintah Kota Padang</h4></b>
  <h4 align="center"><b>Dinas Pendidikan</h4></b>
  <h3 align="center"><b>SMP Murni Padang</h3></b>
  <p align="center">
  Jl. Nipah No.33 Berok Nipah Kec. Padang Barat Telp. (751)</br>
  </div>
  </div>
  <div id="container">
  <div class="row">
  <div class="col-lg-12">
  <p></p>
  <h4 align="center"><b>DATA SISWA</b></h4>
   <form action="" method="POST" class="hidden-print">
  <div class="input-group col-md-2">
  <label>Pilih Kelas</label>
  <select name="kodekls" class="form-control" onchange="this.form>submit();">
  <option value="" selected="selected">Kelas</option>
  <?php
    include '../lib/koneksi.php';
    $sql = "SELECT * FROM tb_kelas";
    $result = mysqli_query($conn, $sql);
    while($data=mysqli_fetch_array($result))
    {
      echo "<option value=$data[kodekls]>$data[namakls]</option>";
    }
  ?>
  </select>
  </div>
  </div>
  </form>
  </div>
  </div>
  </div>
  <div class="container">
  <div class="row">
  <div class="col-md-2 pull-right hidden-print">
  <button onclick="window.print();" class="btn btn-primary hidden-print ">Print</button>
  </div>
  </div><p>
  </div>
  </div>
  <table class="table table-bordered" table-condensed id="export" align="center">
  <thead>
    <tr>
      <th>NIS</th>
      <th>Nama Siswa</th>
      <th>Jenis Kelamin</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Agama</th>
      <th>Alamat</th>
      <th>Kelas</th>
    </tr>
   </thead>
  <tbody>
  <?php
  include '../lib/koneksi.php';
  if(isset($_POST['kodekls']))
  {     
    $myquery="SELECT * FROM tb_siswa WHERE kodekls=$kodekls";
    $daftarsiswa=mysqli_query($conn, $myquery) or die (mysql_error());
  while($dataku=mysqli_fetch_object($daftarsiswa))
  {
  ?>
        <tr>
        <td><?php echo  $dataku->nis?></td>
        <td><?php echo  $dataku->nama?></td>
        <td><?php echo  $dataku->jeniskelamin?></td>
        <td><?php echo  $dataku->tempatlahir?></td>
        <td><?php echo  $dataku->tanggallahir?></td>
        <td><?php echo  $dataku->agama?></td>
        <td><?php echo  $dataku->alamat?></td>
        <td>
          <?php
            $sql = "SELECT * FROM tb_siswa WHERE nis=$dataku->nis";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_object($query);
            $hasil = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE kodekls='$result->kodekls'");
            $dt = mysqli_fetch_object($hasil);
            echo $dt->namakls;
          ?>
        </td>
        </tr>
  <?php
  }
  }
  ?>
  </tbody>
  </table>
    <div class="col-md-3 pull-right" align="center">
    <p>Diketahui oleh:
    <br>Kepala Sekolah SMP Murni Padang,</p>
    <p>  <br> </p>
    <p><u> ENI Farida, SH, MM</u><br>
    NIY. 251165001</p>
    </div>
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