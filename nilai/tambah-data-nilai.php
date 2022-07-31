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
      <legend>Tambah Data Nilai</legend>
        <form method="POST">
        <table>
            <tr>
              <td><label>Kelas</label></td>
              <td>&nbsp;</td>
              <td>
            <select id="kodekls" name="kodekls" class="form-control" onchange="this.form.submit();">
              <option value="">Kelas</option>
                <?php
                  if(isset($_POST['kodekls']))
                  {
                    $kodekls = $_POST['kodekls'];
                  }
                  else
                  {
                    $kodekls = "";
                  }
                  $sql = "SELECT * FROM tb_kelas";
                  $result = mysqli_query($conn, $sql);
                  while($data=mysqli_fetch_array($result)){
                    if($kodekls == $data['kodekls'])
                      {
                        $select = "selected";
                      }
                      else
                      {
                        $select = "";
                      }
                    echo "<option $select value=$data[kodekls]>$data[namakls]</option>";
                  }
                ?>
              </select>
              <tr>
              <td>&nbsp;</td>
            </tr>
        </form>
        <form method="POST" action="simpan-data-nilai.php">
        <?php
              if(isset($_POST['kodekls'])){
              $kodekls = $_POST['kodekls']; ?>
            <tr>
              <td><label>Nama Siswa</label></td>
              <td>&nbsp;</td>
              <td>
              <select name="nis" class="form-control" id="nis">
                <option value="" selected="selected">Nama Siswa</option>
                  <?php
                    $sql = "SELECT * FROM tb_siswa WHERE kodekls = '$kodekls'";
                    $result = mysqli_query($conn, $sql);
                    while($data=mysqli_fetch_array($result)){
                      echo "<option value=$data[nis]>$data[nis]"." => $data[nama]</option>";
                    }
                  ?>
              </select>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nama Pelajaran</label></td>
              <td>&nbsp;</td>
              <td><select name="kodepelajaran" class="form-control" id="kodepelajaran">
                    <option value="" selected="selected">Nama Pelajaran</option>
                      <?php
                        $sql = "SELECT * FROM tb_pelajaran";
                        $result = mysqli_query($conn, $sql);
                        while($data=mysqli_fetch_array($result)){
                          echo "<option value=$data[kodepelajaran]>$data[namapelajaran]</option>";
                        }
                      ?>
                  </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Semester</label></td>
              <td>&nbsp;</td>
              <td>
              <input type="number" class="form-control" name="semester">
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nilai</label></td>
              <td>&nbsp;</td>
              <td><input type="number" name="nilai" class="form-control" id="nilai"></td>
            </tr>
          </table><br>
        <?php } ?>
        <input type="submit" class="btn btn-info" name="submit" value="Simpan"></input>
        <input type="submit" class="btn btn-info" name="submit" value="Batal"></input>
      </form>
      </div>
    </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/chosen.jquery.js"></script>
    <script>
      $('document').ready(function(){
        $("#kodekls").chosen();
        $("#nis").chosen();
        $("#kodepelajaran").chosen();
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