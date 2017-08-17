<?php
	include 'connect.php';

		if(isset($_POST['editgerbang'])){

			$idgerbang = $_POST['edit_idgerbang'];
			$namagerbang = $_POST['edit_namagerbang'];


		$updategerbang = mysqli_query($connect,"UPDATE gerbang SET nama_gerbang ='$namagerbang' WHERE id_gerbang ='$idgerbang'");

				if($updategerbang){
?>

					<script> window.alert('Pembaharuan Data Gerbang Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}


		if(isset($_POST['deletegerbang'])){

			$idgerbang = $_POST['edit_idgerbang'];


		$deletegerbang = mysqli_query($connect,"DELETE FROM gerbang WHERE id_gerbang ='$idgerbang'");

				if($deletegerbang){
		?>

					<script> window.alert('Data Gerbang Berhasil Dihapus') </script>
					<script>document.location.href="javascript:history.back()";</script>

		<?php
				}else{ ?>
					<script> window.alert('Data Gagal Dihapus') </script>
					<script>document.location.href="javascript:history.back()";</script>

		<?php 		 }
		}

?>
