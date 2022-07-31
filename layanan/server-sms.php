<!DOCTYPE html>
<head>
<title>Server SMS</title>
<!-- refresh script setiap 30 detik --> 
<meta http-equiv="refresh" content="10; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>
<body>
	<h1>Server SMS sedang berjalan...</h1>
   <p>*Halaman ini harus terbuka untuk memuat data SMS.</p> 
	<?php
	//error_reporting(0);
	include '../lib/koneksi.php';
	// $conn=open_connection();
	$absencekNIM = 1;
	$laporancekNIM = 1;
	$nilaicekNIM = 1;
	// query untuk membaca SMS yang belum diproses
	$query = "SELECT * FROM inbox WHERE Processed = 'false'";
	$hasil = mysqli_query($conn, $query);
	while ($data = mysqli_fetch_array($hasil))
	{
		// membaca ID SMS
		$id = $data['ID'];   // membaca no pengirim
		$noPengirim = $data['SenderNumber'];   // membaca pesan SMS dan mengubahnya menjadi kapital
		$msg = strtoupper($data['TextDecoded']);   // proses parsing    // memecah pesan berdasarkan karakter <spasi> 
		$pecah = explode(" ", $msg);  // baca NIS dari pesan SMS
		$nis = $pecah[2];   // jika kata terdepan dari SMS adalah 'CEK' maka cari keterangan Nilai
		$semester = $pecah[3];
		if ($pecah[0] == "CEK" && $pecah[1] == "NILAI") {
			//cari nilai siswa berdasar NIS
			$query3 = "SELECT nama, GROUP_CONCAT(CONCAT_WS('-',tb_pelajaran.namapelajaran, tb_nilai.nilai)SEPARATOR ' | ') AS nilai from tb_siswa
            INNER JOIN tb_nilai ON tb_siswa.nis = tb_nilai.nis
            INNER JOIN tb_pelajaran ON tb_nilai.kodepelajaran = tb_pelajaran.kodepelajaran WHERE tb_nilai.nis = '$nis' AND tb.nilai.semester = '$semester'";
         	$hasil3 = mysqli_query($conn, $query3); 
            // cek bila data Nilai tidak ditemukan
             if (mysqli_num_rows($hasil3) == 0) {
               $reply = "Data Nilai Siswa tidak ditemukan, Cek Kembali NIS";
               $nilaicekNIM = 0;
            } else {
             // bila nilai ditemukan
               while($data3 = mysqli_fetch_array($hasil3)){
                  $nn = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE nis = '$nis' AND semester = '$semester'");
                  while ($hnn = mysqli_fetch_array($nn)) {
                     $pljrn = mysqli_query($conn, "SELECT * FROM tb_pelajaran WHERE kodepelajaran = '$hnn[kodepelajaran]'");
                     while ($sks = mysqli_fetch_array($pljrn)) {
                        $total += $nn['nilai'];
                     }
                  }
                  $nama = $data3['nama'];
                  $nilai = $data3['nilai'];
               }
               $reply = "Nama : ".$nama."  ".$nilai."<br>Jumlah Nilai : ".number_format($total);
               $query = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
               $query = mysqli_query($conn, $query);
               $query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
               $query = mysqli_query($conn, $query);
            }
      }
            }
         {
            $reply = "Maaf format SMS Anda salah. Ketik CEK (spasi) NIS (spasi) SEMESTER";
         }
?>
</body>
</html>