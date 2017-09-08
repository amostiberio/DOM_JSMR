<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['editUser'])){

			$username = anti_injection($_POST['Username']);
			$password = anti_injection($_POST['Password']);


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
			$idUserCabang = anti_injection($_POST['idUserCabang']);


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

			$idtwrl1 = anti_injection($_POST['editidtwrl1']);
			$idtwrl2 = anti_injection($_POST['editidtwrl2']);
			$idtwrl3 = anti_injection($_POST['editidtwrl3']);
			$idtwrl4 = anti_injection($_POST['editidtwrl4']);
			$sttwrl = anti_injection($_POST['sttwrl']);
			$stakhir = anti_injection($_POST['stakhir']);
			$realisasi = anti_injection($_POST['realisasi']);


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
			$idtwrl1 = anti_injection($_POST['editidtwrl1']);
			$idtwrl2 = anti_injection($_POST['editidtwrl2']);
			$idtwrl3 = anti_injection($_POST['editidtwrl3']);
			$idtwrl4 = anti_injection($_POST['editidtwrl4']);

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
