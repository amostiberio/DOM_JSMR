<?php
include 'connect.php';
if(isset($_POST['tambah']) && $_FILES['file']['size'] > 0)
{	
	$idcabang = $_POST['idcabang'];
	$nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$tanggal = $_POST['tanggal'];
    list($month,$year) = explode('-',$tanggal);
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
	
	$insert= mysqli_query($connect,"INSERT INTO realisasi_laporan VALUES ('','$nama','$tipe','$content','$size','$year','$month',now(),'$idcabang','1')");
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php		
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php 		 }
		}

if(isset($_POST['tambah_lalinjj']) && $_FILES['file']['size'] > 0)
{	
	$idcabang = $_POST['idcabang'];
	$nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$tahun = $_POST['tahun'];
	$tw = $_POST['tw'];
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
	
	$insert= mysqli_query($connect,"INSERT INTO lalin_jj VALUES ('','$nama','$tipe','$content','$size','$tahun','$tw','$idcabang')");
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