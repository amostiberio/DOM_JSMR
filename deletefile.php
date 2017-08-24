<?php
	include 'connect.php';

if(isset($_POST['delete_lj'])){
			$id = $_POST['id'];	
		
		$delete = mysqli_query($connect,"DELETE FROM lalin_jj WHERE id_lalinjj='$id'");
				if($delete){
?>

					<script> window.alert('Penghapusan File Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('File Gagal Dihapus') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
?>