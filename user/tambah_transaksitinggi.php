<?php
include 'connect.php';
include 'anti_inject.php';

if(isset($_POST['tambah'])){
	$idcabang = anti_injection($_POST['idcabang']);
	$idgerbang= anti_injection($_POST['idgerbang']);
	$tahun= anti_injection($_POST['tahun']);
	$tw= anti_injection($_POST['tw']);

	$idgardu_terbuka_lalin = anti_injection($_POST['idgardu_terbuka_lalin']);
	$gardu_terbuka_lalin = anti_injection($_POST['gardu_terbuka_lalin']);
	$idgardu_masuk_lalin = anti_injection($_POST['idgardu_masuk_lalin']);
	$gardu_masuk_lalin = anti_injection($_POST['gardu_masuk_lalin']);
	$idgardu_keluar_lalin = anti_injection($_POST['idgardu_keluar_lalin']);
	$gardu_keluar_lalin = anti_injection($_POST['gardu_keluar_lalin']);
	$idgardu_terbuka_gto_lalin = anti_injection($_POST['idgardu_terbuka_gto_lalin']);
	$gardu_terbuka_gto_lalin = anti_injection($_POST['gardu_terbuka_gto_lalin']);
	$idgardu_masuk_gto_lalin = anti_injection($_POST['idgardu_masuk_gto_lalin']);
	$gardu_masuk_gto_lalin = anti_injection($_POST['gardu_masuk_gto_lalin']);
	$idgardu_keluar_gto_lalin = anti_injection($_POST['idgardu_keluar_gto_lalin']);
	$gardu_keluar_gto_lalin = anti_injection($_POST['gardu_keluar_gto_lalin']);
	$idepass_lalin = anti_injection($_POST['idepass_lalin']);
	$epass_lalin = anti_injection($_POST['epass_lalin']);

	//cek input double
	$cek_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE id_gerbang = '$idgerbang' AND tahun ='$tahun' AND tw ='$tw'");
	$data = mysqli_fetch_array($cek_lalin,MYSQLI_NUM);
	if($data[0] > 0){ ?>
		<script> window.alert('Gagal, Data Telah Tersedia') </script>
		<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
	}else{
		//insert data
		$insert_transaksitinggi= mysqli_query($connect,"INSERT INTO transaksi_tinggi VALUES
		('','$tahun','$tw','$gardu_terbuka_lalin','$idgardu_terbuka_lalin','$idgerbang', '$idcabang'),
		('','$tahun','$tw','$gardu_masuk_lalin', '$idgardu_masuk_lalin', '$idgerbang','$idcabang'),
		('','$tahun','$tw','$gardu_keluar_lalin', '$idgardu_keluar_lalin', '$idgerbang','$idcabang'),
		('','$tahun','$tw','$gardu_terbuka_gto_lalin','$idgardu_terbuka_gto_lalin', '$idgerbang', '$idcabang'),
		('','$tahun','$tw','$gardu_masuk_gto_lalin', '$idgardu_masuk_gto_lalin', '$idgerbang', '$idcabang'),
		('','$tahun','$tw','$gardu_keluar_gto_lalin', '$idgardu_keluar_gto_lalin','$idgerbang', '$idcabang'),
		('','$tahun','$tw','$epass_lalin','$idepass_lalin', '$idgerbang', '$idcabang')");
		if($insert_transaksitinggi){
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
