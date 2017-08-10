<?php
	include 'connect.php';
        
		if(isset($_POST['tambahRencanaCSI'])){
			$idCabang=$_POST['idcabang'];
		 	$tahun=$_POST['tahun'];
			$idSemester = $_POST['idsemester'];
			$nilai = $_POST['nilai'];
			$jenis = $_POST['jenis'];
		 //cek input double
		$cekNilai = mysqli_query($connect, "SELECT id_csi FROM data_csi WHERE id_cabang = '$idCabang' AND tahun ='$tahun' AND id_semester='$idSemester' AND jenis = '$jenis'");		

		if(mysqli_num_rows($cekNilai) > 0){
?>
				 <script> window.alert('Nilai <?php echo $jenis ?> Sudah Ada') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
		
<?php
		 }
		//insert nilai
		else {
			$insert= mysqli_query($connect,"INSERT INTO data_csi VALUES ('','$nilai','$tahun','$idSemester','$idCabang','$jenis')");
		}
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php		
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php 		 }
		}


		if(isset($_POST['tambahRealisasiCSI'])){
			$idCabang=$_POST['idcabang'];
		 	$tahun=$_POST['tahun'];
			$idSemester = $_POST['idsemester'];
			$nilai = $_POST['nilai'];
			$jenis = $_POST['jenis'];
		 //cek input double
		$cekNilai = mysqli_query($connect, "SELECT id_csi FROM data_csi WHERE id_cabang = '$idCabang' AND tahun ='$tahun' AND id_semester='$idSemester' AND jenis = '$jenis'");		

		if(mysqli_num_rows($cekNilai) > 0){
?>
				 <script> window.alert('Nilai <?php echo $jenis ?> Sudah Ada') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
		
<?php
		 }
		//insert nilai
		else {
			$insert= mysqli_query($connect,"INSERT INTO data_csi VALUES ('','$nilai','$tahun','$idSemester','$idCabang','$jenis')");
		}
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php		
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php 		 }
		}
?>
