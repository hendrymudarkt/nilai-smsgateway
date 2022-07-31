<?php
session_start();
if($_SESSION['StatusLogin']=="OK")
{
  ?>
<?php
  include "../lib/koneksi.php";
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
    <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="../assets/css/chosen.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include '../menu.php';
  ?>
  <div class="container">
    <div class="row">
      <div class="span12">
      <div class="input-group">
      <legend>Tambah Data Siswa</legend>
        <form method="POST" action="simpan-data-siswa.php">
          <table>
            <tr>
              <td><label>NIS</label></td>
              <td>&nbsp;</td>
              <td><input type="number" name="nis" class="form-control" id="nis" required></input></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nama Siswa</label></td>
              <td>&nbsp;</td>
              <td><input type="text" name="nama" class="form-control" id="nama" required></input></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Pilih Jenis Kelamin</label></td>
              <td>&nbsp;</td>
              <td>
              <select name="jeniskelamin" class="form-control">
                <option selected="selected">Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Tempat Lahir</label></td>
              <td>&nbsp;</td>
              <td><textarea name="tempatlahir" class="form-control" required></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Tanggal Lahir</label></td>
              <td>&nbsp;</td>
              <td>
                  <div class="input-group date form_date" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input class="form-control" type="text" name="tanggallahir" id="dtp_input2">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Pilih Agama</label></td>
              <td>&nbsp;</td>
              <td>
              <select name="agama" class="form-control">
                <option value="" selected="selected">Agama</option>
                <option value="Islam">Islam</option>
                <option value="Katolik">Katolik</option>
                <option value="Protestan">Protestan</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>           
                </select>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Alamat</label></td>
              <td>&nbsp;</td>
              <td><textarea name="alamat" class="form-control" required></textarea></td>
            </tr>
            <tr>
          <tr>
          <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Pilih Kelas</label></td>
              <td>&nbsp;</td>
              <td>
              <select name="kodekls" class="form-control" id="kodekls">
                <option value="" selected="selected">Kelas</option>
                <?php
                  $sql = "SELECT * FROM tb_kelas";
                  $result = mysqli_query($conn, $sql);
                  while($data=mysqli_fetch_array($result)){
                    echo "<option value=$data[kodekls]>$data[namakls]</option>";
                  }
                ?>
                </select>
              </td>
            </tr>
          </table><br>
        <input type="submit" class="btn btn-info" name="submit" value="Simpan"></input>
        <input type="submit" class="btn btn-info" name="submit" value="Batal"></input>
      </form>
      </div>
    </div>
  </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
      $('.form_date').datetimepicker({
          language:  'id',
          weekStart: 1,
          todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
      });
    </script>
    <script src="../assets/js/chosen.jquery.js"></script>
    <script>
      $('document').ready(function(){
        $("#kodekls").chosen();
      })
    </script>
  </body>
</html>
<?php
}
else
{
 header("location:../login.php");
}
?>