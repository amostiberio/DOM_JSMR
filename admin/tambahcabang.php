<?php
	include 'connect.php';
        
		if(isset($_POST['tambah'])){
			$namaCabang = $_POST['Cabang'];

		//cek input double
		$cekCabang = mysqli_query($connect, "SELECT id_user FROM cabang WHERE nama_cabang='$namaCabang'");
		
		if(mysqli_num_rows($cekCabang) > 0){
?>
				<script> window.alert('Cabang <?php echo $namaCabang; ?> Sudah Terdaftar') </script>
				<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
		
<?php }

		//insert semua
		else $insert= mysqli_query($connect,"INSERT INTO user VALUES ('','$namaCabang')");
		if($insert){
?>		 		<script> window.alert('Data berhasil Ditambah') </script>
				
<?php		
		}else{ ?>
			<script> window.alert('Data Gagal Ditambahkan') </script>
			 
<?php 		 }
		}
?>
