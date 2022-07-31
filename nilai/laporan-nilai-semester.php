<?php
error_reporting(0);
session_start();
if($_SESSION['StatusLogin']=="OK")
{
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include '../lib/koneksi.php';
  $kodekls = isset($_POST['kodekls'])? $_POST['kodekls'] : '';
?>
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
    <link href="../assets/css/chosen.css" rel="stylesheet">
  </head>
  <body style="min-height: 100px">
<?php
  include "../menu.php";
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
  <p></p>
  <h4 align="center"><b>NILAI PER SEMESTER SISWA</b></h4>
  <div class="col-lg-3">
  <?php
    $txtcari = isset($_GET['txtcari'])? $_GET['txtcari'] : '0';
    $txtsemester = isset($_GET['txtsemester'])? $_GET['txtsemester'] : '0';
  ?>
  <form action="" method="get" name="FCari" id="FCari" class="hidden-print">
  <div class="input-group">
    <select name="txtcari" class="form-control" id="nis">
      <option value="NULL">Nama Siswa</option>
      <?php
        $sql = "SELECT * FROM tb_siswa";
        $result = mysqli_query($conn, $sql);
        while($data=mysqli_fetch_array($result)){
          echo "<option value=$data[nis]>$data[nis]"." => $data[nama]</option>";
        }
      ?>
    </select>
    <select name="txtsemester" id="nis" class="form-control">
      <option value="0">Semester</option>
      <?php
        $qry=mysqli_query($conn, "SELECT semester FROM tb_nilai GROUP BY semester");
        while($t=mysqli_Fetch_array($qry)){ ?>
        <option value="<?php echo $t['semester'] ?>"><?php echo $t['semester'] ?></option>
        <?php }
      ?>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-primary" type="submit" value="Cari">Cari!</button>
    </span>
  </div> 
  </form>
  <?php
    $sql="SELECT * FROM tb_siswa, tb_kelas, tb_nilai WHERE tb_siswa.nis=tb_nilai.nis AND tb_nilai.nis=$txtcari AND tb_nilai.semester=$txtsemester";
    $result=mysqli_query($conn, $sql);
    $dataku=mysqli_fetch_array($result);
  ?>
  </div>
  <?php
    if(isset($_GET['txtcari'])){
  ?>
  <div class="col-md-2 pull-right hidden-print">
  <button onclick="window.print();" class="btn btn-primary hidden-print ">Print</button>
  </div>
  </div><p>
  </div>
  </div>
  <table>
  <thead>
      <tr>
        <td>NIS</td> 
        <td>&nbsp;:&nbsp;</td>
        <td><?php echo $dataku['nis'] ?></td>
      </tr>
      <tr>
        <td>Nama</td> 
        <td>&nbsp;:&nbsp;</td>
        <td><?php echo $dataku['nama'] ?></td>
      </tr>
      <tr>
        <td>Kelas</td> 
        <td>&nbsp;:&nbsp;</td>
        <td><?php echo $dataku['namakls'] ?></td>
      </tr>
      <tr>
        <td>Semester</td> 
        <td>&nbsp;:&nbsp;</td>
        <td><?php echo $dataku['semester'] ?></td>
      </tr>
  </thead>
  </table>
    <table class="table table-bordered table-condensed" align="center" width="730">
      <thead>
      <tr>
        <th>No.</th>
        <th>Nama Pelajaran</th>
        <th>Predikat</th>
        <th>Nilai</th>
      </tr>
      </thead>
    <tbody>
 <?php
 $total = 0;
 $nomor=1;
  $myquery="SELECT * FROM tb_siswa, tb_nilai WHERE tb_siswa.nis=tb_nilai.nis AND tb_nilai.nis=$txtcari";
  $daftarmhs=mysqli_query($conn, $myquery) or die (mysqli_error($conn));
  while($dataku=mysqli_fetch_array($daftarmhs))
  { ?>
      <tr>
        <td><?php echo $nomor++ ?></td>
        <td><?php
                  $sql = "SELECT * FROM tb_pelajaran WHERE kodepelajaran = '$dataku[kodepelajaran]'";
                  $result = mysqli_query($conn, $sql);
                  $data=mysqli_fetch_array($result);
                    echo "$data[namapelajaran]";
          ?></td>        
        <td align="center"><?php echo $dataku['predikat'] ?></td>
        <td align="center"><?php echo $dataku['nilai']; ?></td>
       </tr>
    <?php 
          $total += $dataku['nilai'];
  }
  ?>
      <tr>
         <td colspan="3" align="center">Jumlah Nilai</td>
         <td align="right"><?php echo number_format($total) ?></td>
       </tr>
      </tbody>
    </table>
    <div class="col-md-3 pull-right" align="center">
    <p>Diketahui oleh:
    <br>Kepala Sekolah SMP Murni Padang,</p>
    <p>  <br> </p>
    <p><u> ENI Farida, SH, MM</u><br>
    NIY. 251165001</p>
    <?php
      }
    ?>
  </div>
  </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/chosen.jquery.js"></script>
    <script>
      $(document).ready(function(){
                $('#nis').change(function(){
                    var nis=$(this).val();
                    $.ajax({
                        url : "",
                        method : "POST",
                        data : {NIS: nis},
                        async : false,
                        dataType : 'json',
                        success: function(data){
                            var html = 'Data Tidak Ada';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].NIS+'">'+data[i].nama+'</option>';
                            }
                            $('#nis').html(html);
                        }
                    });
                });
            });
      $('document').ready(function(){
        $("#nis").chosen();
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