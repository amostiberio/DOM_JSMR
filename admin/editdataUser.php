<?php
	include 'connect.php';
        
		if(isset($_POST['editUser'])){
			
			$username = $_POST['Username'];
			$password = $_POST['Password'];
		
		
		$updateUser = mysqli_query($connect,"UPDATE user SET username ='$username' WHERE password ='$password'");		
		
				if($updateUser){
?>

					<script> window.alert('Pembaharuan Data User Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
	
 
		if(isset($_POST['deleteUser'])){
			$idUserCabang = $_POST['idUserCabang'];
				

		$deleteUser = mysqli_query($connect,"DELETE FROM user WHERE id_user ='$idUserCabang'");		
		
				if($deleteUser){
?>

					<script> window.alert('Penghapusan User Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('User Gagal Dihapus') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
	




		if(isset($_POST['editrealisasibeban'])){
			
			$idtwrl1 = $_POST['editidtwrl1'];	
			$idtwrl2 = $_POST['editidtwrl2'];
			$idtwrl3 = $_POST['editidtwrl3'];
			$idtwrl4 = $_POST['editidtwrl4'];							
			$sttwrl = $_POST['sttwrl'];
			$stakhir = $_POST['stakhir'];
			$realisasi = $_POST['realisasi'];

		
			$updatetwrc = mysqli_query($connect,"UPDATE beban_realisasi SET stat_akhir ='$stakhir' , realisasi='$realisasi' WHERE id_twrl = '$idtwrl1' AND stat_twrl ='$sttwrl'");
		
				if($updatetwrc){
?>

					<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>
				

<?php 
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>				
					<script>document.location.href="javascript:history.back()";</script>


<?php 		 }
		}
	
 		if(isset($_POST['deleterealisasibeban'])){
			$idtwrl1 = $_POST['editidtwrl1'];
			$idtwrl2 = $_POST['editidtwrl2'];
			$idtwrl3 = $_POST['editidtwrl3'];
			$idtwrl4 = $_POST['editidtwrl4'];		
		
		$deletetwrc1 = mysqli_query($connect,"DELETE FROM beban_realisasi WHERE id_twrl='$idtwrl1'");		
		$deletetwrc2 = mysqli_query($connect,"DELETE FROM beban_realisasi  WHERE id_twrl='$idtwrl2'");
		$deletetwrc3 = mysqli_query($connect,"DELETE FROM beban_realisasi  WHERE id_twrl='$idtwrl3'");
		$deletetwrc4 = mysqli_query($connect,"DELETE FROM beban_realisasi  WHERE id_twrl='$idtwrl4'");
				if($deletetwrc1 AND $deletetwrc2 AND $deletetwrc3 && $deletetwrc4){
?>

					<script> window.alert('Penghapusan Nilai Rencana Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('Data Gagal Dihapus') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
	




?>
