<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idcabang = anti_injection($_POST['idcabang']);
		 	$idgerbang= anti_injection($_POST['idgerbang']);
			$idsemester = anti_injection($_POST['idsemester']);
			$tahun = anti_injection($_POST['tahun']);
			$idtw = anti_injection($_POST['triwulan']);

			$idgardu_terbuka = anti_injection($_POST['idgardu_terbuka']);
      $gardu_terbuka = anti_injection($_POST['gardu_terbuka']);

      $idgardu_masuk = anti_injection($_POST['idgardu_masuk']);
      $gardu_masuk = anti_injection($_POST['gardu_masuk']);

      $idgardu_keluar = anti_injection($_POST['idgardu_keluar']);
      $gardu_keluar = anti_injection($_POST['gardu_keluar']);

      $idgardu_terbuka_gto = anti_injection($_POST['idgardu_terbuka_gto']);
      $gardu_terbuka_gto = anti_injection($_POST['gardu_terbuka_gto']);

      $idgardu_masuk_gto = anti_injection($_POST['idgardu_masuk_gto']);
      $gardu_masuk_gto = anti_injection($_POST['gardu_masuk_gto']);

      $idgardu_keluar_gto = anti_injection($_POST['idgardu_keluar_gto']);
      $gardu_keluar_gto = anti_injection($_POST['gardu_keluar_gto']);


      $panjang_antrian = anti_injection($_POST['panjang_antrian']);

			//cek input double
			$cek_waktutransaksi= mysqli_query($connect, "SELECT * FROM waktu_transaksi WHERE id_gerbang = '$idgerbang' AND tahun ='$tahun' AND id_tw='$idtw'");
			$data = mysqli_fetch_array($cek_waktutransaksi,MYSQLI_NUM);
			if($data[0] > 0){ ?>

				<script> window.alert('Gagal, Data Telah Tersedia') </script>
				<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>



<?php
		}
		else{
			//insert data
			$insert_waktutransaksi= mysqli_query($connect,"INSERT INTO waktu_transaksi VALUES
      ('','$gardu_terbuka', '$tahun','$idgerbang','$idgardu_terbuka', '$idcabang', '$idsemester', '$idtw'),
			('','$gardu_masuk', '$tahun','$idgerbang','$idgardu_masuk', '$idcabang', '$idsemester','$idtw'),
      ('','$gardu_keluar', '$tahun','$idgerbang','$idgardu_keluar', '$idcabang', '$idsemester', '$idtw'),
			('','$gardu_terbuka_gto', '$tahun','$idgerbang','$idgardu_terbuka_gto', '$idcabang', '$idsemester', '$idtw'),
      ('','$gardu_masuk_gto', '$tahun', '$idgerbang','$idgardu_masuk_gto', '$idcabang', '$idsemester', '$idtw'),
      ('','$gardu_keluar_gto', '$tahun', '$idgerbang','$idgardu_keluar_gto', '$idcabang', '$idsemester', '$idtw')");

      $insert_panjangantrian= mysqli_query($connect,"INSERT INTO panjang_antrian VALUES ('','$panjang_antrian', '$tahun', '$idgerbang', '$idsemester','$idcabang', '$idtw')");

			if($insert_waktutransaksi AND $insert_panjangantrian){
?>
				<script> window.alert('Data berhasil Ditambah') </script>
        <script>document.location.href="javascript:history.back()";</script>
<?php
			}else{
?>
				<script> window.alert('Data Gagal Ditambahkan') </script>
        <script>document.location.href="javascript:history.back()";</script>
<?php
			}
		}
	}
?>
