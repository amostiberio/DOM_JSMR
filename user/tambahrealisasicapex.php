<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idcabang = anti_injection($_POST['idcabang']);
		 	$id_pk= anti_injection($_POST['programkerja']);
			$id_subpk = anti_injection($_POST['subprogram']);
			$jenis = anti_injection($_POST['jenis']);
			$tahun = anti_injection($_POST['tahun']);
			$sttwrl = anti_injection($_POST['sttwrl']);
			$realisasi= anti_injection($_POST['realisasi']);
		//cek input double
		$cek_rencana = mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_sp='$id_subpk' AND tahun='$tahun' AND jenis = '$jenis'");
		$datarencana = mysqli_fetch_array($cek_rencana,MYSQLI_NUM);

		if($datarencana[0] > 0){

		$cek_realisasi = mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$id_subpk' AND tahun ='$tahun' AND jenis ='$jenis' AND stat_twrl ='$sttwrl'");
		$datarealisasi = mysqli_fetch_array($cek_realisasi,MYSQLI_NUM);

		if($datarealisasi[0] > 0){
?>
			<script> window.alert('Data Telah Tersedia') </script>
			 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php


		}
		else {
			$insertrealisasi= mysqli_query($connect,"INSERT INTO capex_realisasi VALUES ('','$id_subpk','$tahun','$sttwrl','0','$realisasi','$jenis')");

			if($insertrealisasi){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
			}
			else{
?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php 		}
		}
		}
		else {

?>
		<script> window.alert('Data Rencana Belum Tersedia') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php

	}}
?>
