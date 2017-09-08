<?php
include 'connect.php';
include 'anti_inject.php';
if(isset($_POST['tambah'])){
	$idcabang = anti_injection($_POST['cabang']);
	$idgerbang= anti_injection($_POST['gerbang']);
	$tahun= anti_injection($_POST['tahun']);

	$idkpl_gerbangtol = anti_injection($_POST['idkpl_gerbangtol']);
	$kpl_gerbangtol = anti_injection($_POST['kpl_gerbangtol']);
	$idkspt = anti_injection($_POST['idkspt']);
	$kspt = anti_injection($_POST['kspt']);
	$idkry_jasamarga = anti_injection($_POST['idkry_jasamarga']);
	$kry_jasamarga = anti_injection($_POST['kry_jasamarga']);
	$idkry_jlj = anti_injection($_POST['idkry_jlj']);
	$kry_jlj = anti_injection($_POST['kry_jlj']);
	$idkry_jlo = anti_injection($_POST['idkry_jlo']);
	$kry_jlo = anti_injection($_POST['kry_jlo']);
	$idsakit_permanen = anti_injection($_POST['idsakit_permanen']);
	$sakit_permanen = anti_injection($_POST['sakit_permanen']);
	$idtugt = anti_injection($_POST['idtugt']);
	$tugt = anti_injection($_POST['tugt']);

	//cek input double
	$cek_js = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE id_gerbang = '$idgerbang' AND tahun ='$tahun'");
	$data = mysqli_fetch_array($cek_js,MYSQLI_NUM);
	if($data[0] > 0){ ?>
		<script> window.alert('Gagal, Data Telah Tersedia') </script>
		<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
	}else{
		//insert data
		$insert_jumlahsdm = mysqli_query($connect,"INSERT INTO pengumpul_tol VALUES
		('','$tahun','$kpl_gerbangtol','$idkpl_gerbangtol','$idgerbang', '$idcabang'),
		('','$tahun','$kspt', '$idkspt', '$idgerbang','$idcabang'),
		('','$tahun','$kry_jasamarga', '$idkry_jasamarga', '$idgerbang','$idcabang'),
		('','$tahun','$kry_jlj','$idkry_jlj', '$idgerbang', '$idcabang'),
		('','$tahun','$kry_jlo', '$idkry_jlo', '$idgerbang', '$idcabang'),
		('','$tahun','$sakit_permanen', '$idsakit_permanen','$idgerbang', '$idcabang'),
		('','$tahun','$tugt','$idtugt', '$idgerbang', '$idcabang')");

		if($insert_jumlahsdm){
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
