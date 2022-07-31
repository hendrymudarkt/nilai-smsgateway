<?php
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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
  <div class="row">
  <legend>Data Kelas</legend>
  <p><a href="../kelas/tambah-data-kelas.php"><button type="button" class="btn btn-primary">Tambah Data</button></a></p>
    <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>No.</th>
        <th>Kode Kelas</th>
        <th>Nama Kelas</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_kelas";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='5'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['kodekls']; ?></td>
        <td><?php echo $data['namakls']; ?></td>
        <td align="center">
        <a href="ubah-data-kelas.php?kodekls=<?php echo $data['kodekls'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a> ||
        <a href="hapus-data-kelas.php?kodekls=<?php echo $data['kodekls'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </a>
        </td>
      </tr>
       <?php  
        $No++;
        }
      }
    ?>
    </tbody>
    </table>
  </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $(".table").DataTable();
      });
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