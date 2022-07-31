<?php
session_start();
if($_SESSION['StatusLogin']=="OK")
{
  ?>
<?php
    include "../lib/koneksi.php";
    $idnilai = htmlentities($_GET['idnilai']);
    $sql = "SELECT * FROM tb_nilai WHERE idnilai = '$idnilai'";
    $result = mysqli_query($conn, $sql);
    $data2 = mysqli_fetch_array($result);
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
      <legend>Ubah Data Nilai</legend>
        <form method="POST" action="perbarui-data-nilai.php">
          <input type="hidden" name="idnilai" value="<?php echo $data2['idnilai'] ?>">
          <table>
            <tr>
              <td><label>Nama Mahasiswa</label></td>
              <td>&nbsp;</td>
              <td><select name="nis" class="form-control" id="nis">
                        <?php
                          $sql = "SELECT * FROM tb_siswa";
                          $result = mysqli_query($conn, $sql);
                          echo "<option value=$data2[nis]>$data2[nis]</option>";
                          while($data=mysqli_fetch_array($result)){
                            echo "<option value=$data[nis]>$data[nis]"." => $data[nama]</option>";
                          }
                        ?>
                    </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nama Pelajaran</label></td>
              <td>&nbsp;</td>
              <td>
              <select name="kodepelajaran" class="form-control" id="kodepelajaran">
                  <?php
                    $result2 = mysqli_query($conn, "SELECT * FROM tb_pelajaran WHERE kodepelajaran = '$data2[kodepelajaran]'");
                    $dataaa = mysqli_fetch_array($result2);
                    echo "<option value=$data2[kodepelajaran]>$dataaa[namapelajaran]</option>";
                    $sql = "SELECT * FROM tb_pelajaran";
                    $result = mysqli_query($conn, $sql);
                    while($data=mysqli_fetch_array($result)){
                      echo "<option value=$data[kodepelajaran]>$data[namapelajaran]</option>";
                    }
                  ?>
              </select>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Semester</label></td>
              <td>&nbsp;</td>
              <td>
              <input type="number" class="form-control" name="semester" value="<?php echo $data2['semester'] ?>">
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><label>Nilai</label></td>
              <td>&nbsp;</td>
              <td><input type="number" name="nilai" class="form-control" id="nilai" value="<?php echo $data2['nilai'] ?>"></td>
            </tr>
            <tr>
          </table><br>
        <input type="submit" class="btn btn-info" name="submit" value="Perbarui"></input>
      </form>
      </div>
    </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/chosen.jquery.js"></script>
    <script>
      $('document').ready(function(){
        $("#NIM").chosen();
        $("#KodePljrn").chosen();
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