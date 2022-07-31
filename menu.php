<?php
include 'lib/koneksi.php';
?>
<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/NilaiSMSGateway/index.php"><span
                    class="glyphicon glyphicon-home"></span></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false" ><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true">
                        </span> Data Master <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://localhost/NilaiSMSGateway/kelas/data-kelas.php">Data Kelas</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/siswa/data-siswa.php">Data Siswa</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/pelajaran/data-pelajaran.php">Data Pelajaran</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/nilai/data-nilai.php">Data Nilai</a></li>
                    </ul>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true">
                </span> Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://localhost/NilaiSMSGateway/siswa/laporan-data-siswa.php">Data Siswa</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/nilai/laporan-nilai-semester.php">Nilai Per Semester</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                aria-expanded="false"><span class="glyphicon glyphicon-envelope" aria-hidden="true">
                </span> Layanan SMS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://localhost/NilaiSMSGateway/layanan/pesan-masuk.php">Pesan Masuk</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/layanan/pesan-keluar.php">Pesan Keluar</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/layanan/server-sms.php" target="_blank">Server SMS</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a><span class="glyphicon glyphicon-user"></span>
                        <?php echo "Selamat datang, ".$_SESSION['username'];?></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><span class="glyphicon glyphicon-log-out"></span>Petugas<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://localhost/NilaiSMSGateway/petugas/data-petugas.php">Data Petugas</a></li>
                        <li><a href="http://localhost/NilaiSMSGateway/logout.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>