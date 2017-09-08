<?php
include 'connect.php';
include 'anti_inject.php';

//tambah unggah biasa
	if(isset($_POST['tambah']) && $_FILES['file']['size'] > 0)
	{
		$idcabang = anti_injection($_POST['idcabang']);
		$nama = anti_injection($_POST['nama']);
		$tipe = anti_injection($_POST['tipe']);
		$tahun = ($_POST['tahun']);
		$tmpName = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size'];


		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
			$nama = addslashes($nama);
		}

		$insert= mysqli_query($connect,"INSERT INTO realisasi_laporan VALUES ('','$nama','$tipe','$content','$size','$tahun',date('m'),now(),'$idcabang','1')");
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php 		 }
	}


//tambah unggah admin RKAP
	if(isset($_POST['tambahReferensiFileRKAP']) && $_FILES['file']['size'] > 0)
	{
		$role = anti_injection($_POST['refenresiRole']);
		$nama = anti_injection($_POST['nama']);
		$tipe = anti_injection($_POST['tipe']);
		$tahun = anti_injection($_POST['tahun']);
		$tmpName = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

	if(!get_magic_quotes_gpc())
	{
		$nama = addslashes($nama);
	}

	$insert= mysqli_query($connect,"INSERT INTO referensi_file VALUES ('','$nama','$tipe','$content','$size','$tahun','',now(),'$role')");
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php 		 }
		}


	if(isset($_POST['tambahReferensiFileRevisiRKAP']) && $_FILES['file']['size'] > 0)
	{
		$role = anti_injection($_POST['refenresiRole']);
		$nama = anti_injection($_POST['nama']);
		$tipe = anti_injection($_POST['tipe']);
		$tahun = anti_injection($_POST['tahun']);
		$tmpName = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

	if(!get_magic_quotes_gpc())
	{
		$nama = addslashes($nama);
	}

	$insert= mysqli_query($connect,"INSERT INTO referensi_file VALUES ('','$nama','$tipe','$content','$size','$tahun','',now(),'$role')");
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php 		 }
		}


	if(isset($_POST['tambahReferensiFilePencapaian']) && $_FILES['file']['size'] > 0)
	{
		$role = anti_injection($_POST['refenresiRole']);
		$nama = anti_injection($_POST['nama']);
		$tipe = anti_injection($_POST['tipe']);
		$ambilTanggal = anti_injection($_POST['tahun']);

		list($month,$year) = explode('-',$ambilTanggal);


		$tmpName = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

	if(!get_magic_quotes_gpc())
	{
		$nama = addslashes($nama);
	}

	$insert= mysqli_query($connect,"INSERT INTO referensi_file VALUES ('','$nama','$tipe','$content','$size','$year','$month',now(),'$role')");
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php 		 }
		}
?>
