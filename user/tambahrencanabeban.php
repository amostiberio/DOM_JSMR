<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idcabang = anti_injection($_POST['idcabang']);
		 	$id_pk= anti_injection($_POST['programkerja']);
			$id_subpk = anti_injection($_POST['subprogram']);
			$jenis = anti_injection($_POST['jenis']);
			$tahun = anti_injection($_POST['tahun']);
			$rkap1= anti_injection($_POST['rkap1']);
			$rkap2= anti_injection($_POST['rkap2']);
			$rkap3= anti_injection($_POST['rkap3']);
			$rkap4= anti_injection($_POST['rkap4']);


		//cek input double
		$cek_rencana = mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$id_subpk' AND tahun ='$tahun' AND jenis = '$jenis' ");
		$data = mysqli_fetch_array($cek_rencana,MYSQLI_NUM);
		if($data[0] > 0){ ?>

			<script> window.alert('Data Telah Tersedia') </script>
			 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php


		}else{

			//insert data
			$insert= mysqli_query($connect,"INSERT INTO beban_rencana VALUES ('','$id_subpk','$tahun','1','$rkap1','0','$jenis'),
			('','$id_subpk','$tahun','2','$rkap2','0','$jenis'),('','$id_subpk','$tahun','3','$rkap3','0','$jenis'),
			('','$id_subpk','$tahun','4','$rkap4','0','$jenis');");

			if($insert){
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
