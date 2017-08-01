<?php
	include 'connect.php';
        
		if(isset($_POST['tambah'])){
			$ma=$_POST['nomorMA'];
		 	$nama_pk=$_POST['programKerja'];
			$idcabang = $_POST['idcabang'];
		
		 //cek input double
		$cekma = mysqli_query($connect, "SELECT MA FROM program_kerja WHERE MA = '$ma' AND jenis ='capex' ");
		$ceknama_pk = mysqli_query($connect, "SELECT nama_pk FROM program_kerja WHERE nama_pk = '$nama_pk' AND id_cabang ='$idcabang' AND jenis ='capex'");		

		if(mysqli_num_rows($cekma) > 0){
?>
				<script> window.alert('Nomor MA Sudah Ada') </script>
				<script>document.location.href="javascript:history.back()";</script>
		
<?php }
		
		elseif(mysqli_num_rows($ceknama_pk) > 0){
?>
				<script> window.alert('Nama Program Kerja Sudah Ada') </script>
				<script>document.location.href="javascript:history.back()";</script>
		
<?php }

		//insert semua
		else $insert= mysqli_query($connect,"INSERT INTO program_kerja VALUES ('','$ma','$nama_pk','$idcabang','capex')");
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
