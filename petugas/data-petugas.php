<?php
session_start();
if($_SESSION['StatusLogin']=="OK")
{
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
    <title>Aplikasi Absensi SMS Gateway</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="../assets/font-awesome-4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="min-height: 100px">
  <?php
    include '../menu.php';
  ?>
  <div class="container">
  <div class="row">
  <legend>Manajemen Data Petugas</legend>
  <p><a href="tambah-data-petugas.php"><button type="button" class="btn btn-primary">Tambah Data</button></a></p>
  <div class="table-responsive">
  <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>No.</th>
        <th>Nama Petugas</th>
        <th>Nama Pengguna</th>
        <th>Sandi</th>
        <th>Aksi</th>
      </tr>
      </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_petugas";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='8'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NamaPtg']; ?></td>
        <td><?php echo $data['NamaPgn']; ?></td>
        <td><?php echo $data['Sandi']; ?></td>
        <td align="center">
        <a href="ubah-data-petugas.php?NamaPgn=<?php echo $data['NamaPgn'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a> ||
        <a href="hapus-data-petugas.php?NamaPgn=<?php echo $data['NamaPgn'];?>">
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
  </div>
  
  <?php
      include '../footer.php';
  ?>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#table").DataTable();
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