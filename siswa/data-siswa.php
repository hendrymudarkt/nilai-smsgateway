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
  <body style="min-height: 100px">
  <?php
    include '../menu.php';
  ?>
  <div class="container">
  <div class="row">
  <legend>Data Siswa</legend>
  <p><a href="tambah-data-siswa.php"><button type="button" class="btn btn-primary">Tambah Data</button></a></p>
  <div class="table-responsive">
  <table class="table table-condensed table-bordered">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Kelas</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_siswa";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='11'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['nis']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['jeniskelamin']; ?></td>
        <td><?php echo $data['tempatlahir']; ?></td>
        <td><?php echo $data['tanggallahir']; ?></td>
        <td><?php echo $data['agama']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php
            $sql = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE kodekls = '$data[kodekls]'");
            $dt = mysqli_fetch_array($sql);
            echo $dt['namakls'];
         ?></td>
        <td align="center">
        <a href="ubah-data-siswa.php?nis=<?php echo $data['nis'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a> ||
        <a href="hapus-data-siswa.php?nis=<?php echo $data['nis'];?>">
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