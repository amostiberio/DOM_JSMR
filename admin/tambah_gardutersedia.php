<?php
	include 'connect.php';
	include 'anti_inject.php';
	if(isset($_POST['tambah'])){
		$idcabang = anti_injection($_POST['cabang']);
		$idgerbang= anti_injection($_POST['gerbang']);
		$tahun= anti_injection($_POST['tahun']);
		$tw= anti_injection($_POST['tw']);

		$idgardu_terbuka_tersedia = anti_injection($_POST['idgardu_terbuka_tersedia']);
		$gardu_terbuka_tersedia = anti_injection($_POST['gardu_terbuka_tersedia']);
		$idgardu_masuk_tersedia = anti_injection($_POST['idgardu_masuk_tersedia']);
		$gardu_masuk_tersedia = anti_injection($_POST['gardu_masuk_tersedia']);
		$idgardu_keluar_tersedia = anti_injection($_POST['idgardu_keluar_tersedia']);
		$gardu_keluar_tersedia = anti_injection($_POST['gardu_keluar_tersedia']);
		$idgardu_terbuka_gto_tersedia = anti_injection($_POST['gardu_terbuka_gto_tersedia']);
		$gardu_terbuka_gto_tersedia = anti_injection($_POST['gardu_terbuka_gto_tersedia']);
		$idgardu_masuk_gto_tersedia = anti_injection($_POST['idgardu_masuk_gto_tersedia']);
		$gardu_masuk_gto_tersedia = anti_injection($_POST['gardu_masuk_gto_tersedia']);
		$idgardu_keluar_gto_tersedia = anti_injection($_POST['idgardu_keluar_gto_tersedia']);
		$gardu_keluar_gto_tersedia = anti_injection($_POST['gardu_keluar_gto_tersedia']);
		$idepass_tersedia = anti_injection($_POST['idepass_tersedia']);
		$epass_tersedia = anti_injection($_POST['epass_tersedia']);

		//cek input double
		$cek_gt = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE id_gerbang = '$idgerbang' AND tahun ='$tahun' AND tw='$tw'");
		$data = mysqli_fetch_array($cek_gt,MYSQLI_NUM);
		if($data[0] > 0){ ?>
			<script> window.alert('Gagal, Data Telah Tersedia') </script>
			<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
		}else{
			//insert data
			$insert_gardutersedia = mysqli_query($connect,"INSERT INTO jml_gardutersedia VALUES
			('','$tahun','$tw','$gardu_terbuka_tersedia','$idgardu_terbuka_tersedia','$idgerbang', '$idcabang'),
			('','$tahun','$tw','$gardu_masuk_tersedia', '$idgardu_masuk_tersedia', '$idgerbang','$idcabang'),
			('','$tahun','$tw','$gardu_keluar_tersedia', '$idgardu_keluar_tersedia', '$idgerbang','$idcabang'),
			('','$tahun','$tw','$gardu_terbuka_gto_tersedia','$idgardu_terbuka_gto_tersedia', '$idgerbang', '$idcabang'),
			('','$tahun','$tw','$gardu_masuk_gto_tersedia', '$idgardu_masuk_gto_tersedia', '$idgerbang', '$idcabang'),
			('','$tahun','$tw','$gardu_keluar_gto_tersedia', '$idgardu_keluar_gto_tersedia','$idgerbang', '$idcabang'),
			('','$tahun','$tw','$epass_tersedia','$idepass_tersedia', '$idgerbang', '$idcabang')");


		if($insert_gardutersedia){
	?>
			<script> window.alert('Data berhasil Ditambah') </script>
			<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
	<?php
		}else{
	?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
	<?php
		}
	}
}
?>
