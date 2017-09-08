<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idcabang = anti_injection($_POST['idcabang']);
			$noitem= anti_injection($_POST['nomorItem']);
			$ma= anti_injection($_POST['nomorMA']);
		 	$nama_pk= anti_injection($_POST['programKerja']);
			$jenis = anti_injection($_POST['jenis']);
		 //cek input double
		$cekma = mysqli_query($connect, "SELECT MA FROM program_kerja WHERE MA = '$ma' AND jenis ='$jenis' ");
		$ceknama_pk = mysqli_query($connect, "SELECT nama_pk FROM program_kerja WHERE nama_pk = '$nama_pk' AND id_cabang ='$idcabang' AND jenis ='$jenis'");

		if(mysqli_num_rows($cekma) > 0){
?>
				<script> window.alert('Nomor MA Sudah Ada') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php }

		elseif(mysqli_num_rows($ceknama_pk) > 0){
?>
				<script> window.alert('Nama Program Kerja Sudah Ada') </script>
				 <script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php }

		//insert semua
		else $insert= mysqli_query($connect,"INSERT INTO program_kerja VALUES ('','$noitem','$ma','$nama_pk','$idcabang','$jenis')");
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
