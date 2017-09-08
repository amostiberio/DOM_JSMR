<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idsemester= anti_injection($_POST['idsemester']);

      $idgardu_keluar = anti_injection($_POST['idgardu_keluar']);
      $gardu_keluar = anti_injection($_POST['gardu_keluar']);

			$idgardu_masuk = anti_injection($_POST['idgardu_masuk']);
      $gardu_masuk = anti_injection($_POST['gardu_masuk']);

			$idgardu_terbuka = anti_injection($_POST['idgardu_terbuka']);
      $gardu_terbuka = anti_injection($_POST['gardu_terbuka']);

      $idgardu_tol_ambilkartu = anti_injection($_POST['idgardu_tol_ambilkartu']);
      $gardu_tol_ambilkartu = anti_injection($_POST['gardu_tol_ambilkartu']);

      $idgardu_tol_transaksi = anti_injection($_POST['idgardu_tol_transaksi']);
      $gardu_tol_transaksi = anti_injection($_POST['gardu_tol_transaksi']);

      $idpanjang_antrian = anti_injection($_POST['idpanjang_antrian']);
      $panjang_antrian = anti_injection($_POST['panjang_antrian']);


			//cek input double
			$cek_wt_rencana= mysqli_query($connect, "SELECT * FROM wt_rencana WHERE id_semester = '$idsemester'");
			$data = mysqli_fetch_array($cek_wt_rencana,MYSQLI_NUM);
			if($data[0] > 0){ ?>

				<script> window.alert('Gagal, Data Telah Tersedia') </script>
				<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
		}
		else {

			//insert data
			$insert_wtrencana= mysqli_query($connect,"INSERT INTO wt_rencana VALUES
			('','$gardu_masuk', '$idgardu_masuk', '$idsemester'),
			('','$gardu_keluar', '$idgardu_keluar', '$idsemester'),
			('','$gardu_terbuka', '$idgardu_terbuka', '$idsemester'),
			('','$gardu_tol_ambilkartu', '$idgardu_tol_ambilkartu', '$idsemester'),
			('','$gardu_tol_transaksi', '$idgardu_tol_transaksi', '$idsemester'),
      ('','$panjang_antrian', '$idpanjang_antrian', '$idsemester')");

			if($insert_wtrencana){

?>
				<script> window.alert('Data berhasil Ditambah') </script>
        <script>document.location.href="javascript:history.back()";</script>
<?php
			}else{
				echo $gardu_masuk, $idgardu_masuk, $idsemester;
?>
				<script> window.alert('Data Gagal Ditambahkan') </script>
        <script>document.location.href="javascript:history.back()";</script>
<?php
			}
		}
	}
?>
