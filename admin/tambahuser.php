<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['tambah'])){
			$idCabang = anti_injection($_POST['idCabang']);

			if(!isset($idCabang)){
				$idCabang ='0';
			}
			$idRole= anti_injection($_POST['idRole']);
		 	$username= anti_injection($_POST['Username']);
			$password = anti_injection($_POST['Password']);

				$options = [
    		'cost' => 12
				];
				$hash = password_hash($password, PASSWORD_BCRYPT, $options);
		//cek input double
		$cekUser = mysqli_query($connect, "SELECT id_user FROM user WHERE username='$username' AND id_cabang ='$idCabang'");


		if(mysqli_num_rows($cekUser) > 0){
?>
				<script> window.alert('User Sudah Ada di Cabang Tersebut') </script>
				<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php }

		//insert semua
		else $insert= mysqli_query($connect,"INSERT INTO user VALUES ('','$username','$hash','$idRole','$idCabang')");
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
