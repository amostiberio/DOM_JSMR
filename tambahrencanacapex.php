<?php
	include 'connect.php';

		if(isset($_POST['tambah'])){
			$idcabang = $_POST['idcabang'];
		 	$id_pk= $_POST['programkerja'];
			$id_subpk = $_POST['subprogram'];
			$jenis = $_POST['jenis'];
			$tahun = $_POST['tahun'];
			$rkap1= $_POST['rkap1'];
			$rkap2= $_POST['rkap2'];
			$rkap3= $_POST['rkap3'];
			$rkap4= $_POST['rkap4'];
			
		
		//cek input double
		$cek_rencana = mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$id_subpk' AND tahun ='$tahun' AND jenis = '$jenis' ");
		$data = mysqli_fetch_array($cek_rencana,MYSQLI_NUM);
		if($data[0] > 0){ ?>

			<script> window.alert('Data Telah Tersedia') </script>
			<script>document.location.href="javascript:history.back()";</script>

<?php 		 
				
			
		}else{
		
			//insert data 
			$insert= mysqli_query($connect,"INSERT INTO capex_rencana VALUES ('','$id_subpk','$tahun','1','$rkap1','$jenis'), 
			('','$id_subpk','$tahun','2','$rkap2','$jenis'),('','$id_subpk','$tahun','3','$rkap3','$jenis'),
			('','$id_subpk','$tahun','4','$rkap4','$jenis');");
			
			if($insert){
?>		 		
				<script> window.alert('Data berhasil Ditambah') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php		
			}else{ 
?>
				<script> window.alert('Data Gagal Ditambahkan') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php 		 
			}
		}
		}
?>