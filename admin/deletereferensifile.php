<?php

	include 'connect.php';
	include 'anti_inject';


		if(isset($_POST['deletelaporan'])){
			$id_referensi = anti_injection($_POST['id_referensi']);

		$delete = mysqli_query($connect,"DELETE FROM referensi_file WHERE id_referensi='$id_referensi'");
		if($delete){
?>
		<script> window.alert('Penghapusan Laporan Berhasil') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php
	}else{ ?>
		<script> window.alert('Penghapusan Laporan Gagal') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php 	}
	}


?>
