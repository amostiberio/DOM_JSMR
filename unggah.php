<?php
include 'connect.php';
if(isset($_POST['tambah']) && $_FILES['file']['size'] > 0)
{	
	$idcabang = $_POST['idcabang'];
	$nama = $_POST['nama'];
	$tipe = $_POST['tipe'];
	$tahun = $_POST['tahun'];
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
	
	$insert= mysqli_query($connect,"INSERT INTO realisasi_laporan VALUES ('','$nama','$tipe','$content','$size','$tahun',now(),'$idcabang')");
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