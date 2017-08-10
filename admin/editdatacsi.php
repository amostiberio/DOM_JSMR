<?php
	include 'connect.php';
        
		if(isset($_POST['editrencanabeban'])){
			$idrencanasms1 = $_POST['idrencanasms1'];
			$idrencanasms2 = $_POST['idrencanasms2'];
			$idrealisasisms1 = $_POST['idrealisasisms1'];
			$idrealisasisms2 = $_POST['idrealisasisms2'];

			$nilaiRencanaSms1 = $_POST['nilaiRencanaSms1'];
			$nilaiRealisasiSms1 = $_POST['nilaiRealisasiSms1'];
			$nilaiRencanaSms2 = $_POST['nilaiRencanaSms2'];	
			$nilaiRealisasiSms2 = $_POST['nilaiRealisasiSms2'];

			$cekrencanasms1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrencanasms1'"));
			$cekrencanasms2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrencanasms2'"));
			$cekrealisasisms1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrealisasisms1'"));
			$cekrealisasisms2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrealisasisms2'"));

			if($cekrencanasms1){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRencanaSms1' WHERE id_csi='$idrencanasms1'");
			}

			if($cekrencanasms2){
				$updateRencanasms2 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRencanaSms2' WHERE id_csi='$idrencanasms2'");
			}

			if($cekrealisasisms1){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRealisasiSms1' WHERE id_csi='$idrealisasisms1'");
			}

			if($cekrealisasisms2){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRealisasiSms2' WHERE id_csi='$idrealisasisms2'");
			}

				if($cekrencanasms1 OR $cekrencanasms2 OR $cekrealisasisms1 OR $cekrealisasisms2){
?>

					<script> window.alert('Pembaharuan Nilai CSI Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
	