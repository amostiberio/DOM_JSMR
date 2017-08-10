<?php
	include 'connect.php';
        
		if(isset($_POST['tambah'])){
			$idCabang = $_POST['idCabang'];
			if(!isset($idCabang)){
				$idCabang ='0';
			}
			$idRole=$_POST['idRole'];
		 	$username=$_POST['Username'];
			$password = $_POST['Password'];
		//cek input double
		$cekUser = mysqli_query($connect, "SELECT id_user FROM user WHERE username='$username' AND id_cabang ='$idCabang'");
			

		if(mysqli_num_rows($cekUser) > 0){
?>
				<script> window.alert('User Sudah Ada di Cabang Tersebut') </script>
				<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
		
<?php }

		//insert semua
		else $insert= mysqli_query($connect,"INSERT INTO user VALUES ('','$username','$password','$idRole','$idCabang')");
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
