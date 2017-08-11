<?php
	include 'connect.php';
        
		if(isset($_POST['editrencanabeban'])){
			$idrencanasms11 = $_POST['idrencanasms11'];
			$idrencanasms12= $_POST['idrencanasms12'];
			$idrencanasms21 = $_POST['idrencanasms21'];
			$idrencanasms22 = $_POST['idrencanasms22'];
			$idrealisasisms11 = $_POST['idrealisasisms11'];
			$idrealisasisms12 = $_POST['idrealisasisms12'];
			$idrealisasisms21 = $_POST['idrealisasisms21'];			
			$idrealisasisms22 = $_POST['idrealisasisms22'];

			$nilaiRencanaSms11 = $_POST['nilaiRencanaSms11'];
			$nilaiRencanaSms12 = $_POST['nilaiRencanaSms12'];
			$nilaiRencanaSms21 = $_POST['nilaiRencanaSms21'];
			$nilaiRencanaSms22 = $_POST['nilaiRencanaSms22'];		
			$nilaiRealisasiSms11 = $_POST['nilaiRealisasiSms11'];
			$nilaiRealisasiSms12 = $_POST['nilaiRealisasiSms12'];			
			$nilaiRealisasiSms21 = $_POST['nilaiRealisasiSms21'];			
			$nilaiRealisasiSms22 = $_POST['nilaiRealisasiSms22'];
			

			$cekrencanasms11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrencanasms11'"));
			$cekrencanasms12 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrencanasms12'"));
			$cekrencanasms22 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrencanasms21'"));
			$cekrencanasms21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrencanasms22'"));
			
			$cekrealisasisms11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrealisasisms11'"));
			$cekrealisasisms12 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrealisasisms12'"));
			$cekrealisasisms21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrealisasisms21'"));			
			$cekrealisasisms22 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_csi ='$idrealisasisms22'"));

			if($cekrencanasms11){
				$updateRencanasms11 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRencanaSms11' WHERE id_csi='$idrencanasms11'");
			}

			if($cekrencanasms12){
				$updateRencanasms12 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRencanaSms12' WHERE id_csi='$idrencanasms12'");
			}
			if($cekrencanasms21){
				$updateRencanasms21 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRencanaSms21' WHERE id_csi='$idrencanasms21'");
			}		

			if($cekrencanasms22){
				$updateRencanasms22 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRencanaSms22' WHERE id_csi='$idrencanasms22'");
			}

			if($cekrealisasisms11){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRealisasiSms11' WHERE id_csi='$idrealisasisms11'");
			}
			if($cekrealisasisms12){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRealisasiSms12' WHERE id_csi='$idrealisasisms12'");
			}
			if($cekrealisasisms21){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRealisasiSms21' WHERE id_csi='$idrealisasisms21'");
			}		

			if($cekrealisasisms22){
				$updateRencanasms1 = mysqli_query($connect,"UPDATE data_csi SET nilai_csi ='$nilaiRealisasiSms22' WHERE id_csi='$idrealisasisms22'");
			}

				if($cekrencanasms11 OR $cekrencanasms12 OR $cekrencanasms21 OR $cekrencanasms22 OR $cekrealisasisms11 OR $cekrealisasisms12 OR $cekrealisasisms21 OR $cekrealisasisms22){
?>

					<script> window.alert('Pembaharuan Nilai CSI Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
	