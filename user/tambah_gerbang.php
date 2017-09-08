<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idcabang = anti_injection($_POST['idcabang']);
		 	$gerbang= anti_injection($_POST['gerbang']);

		//cek input double
		$cek_gerbang = mysqli_query($connect, "SELECT * FROM gerbang WHERE nama_gerbang = '$gerbang'");
		$data = mysqli_fetch_array($cek_gerbang,MYSQLI_NUM);
		if($data[0] > 0){ ?>

			<script> window.alert('Data Telah Tersedia') </script>
			<script>document.location.href="javascript:history.back()";</script>

<?php


		}else{

			//insert data
			$insert= mysqli_query($connect,"INSERT INTO gerbang VALUES ('','$gerbang','$idcabang')");

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
