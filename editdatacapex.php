<?php
	include 'connect.php';
        
		if(isset($_POST['editrencanacapex'])){
			$idtwrc1 = $_POST['editidtwrc1'];
			$idtwrc2 = $_POST['editidtwrc2'];
			$idtwrc3 = $_POST['editidtwrc3'];
			$idtwrc4 = $_POST['editidtwrc4'];
			$datatwrc1 = $_POST['edittwrc1'];
			$datatwrc2 = $_POST['edittwrc2'];
			$datatwrc3 = $_POST['edittwrc3'];	
			$datatwrc4 = $_POST['edittwrc4'];

	
			$cekcapex = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc1'"));
			$idspcapex = $cekcapex['id_sp'];
			$tahuncapex = $cekcapex['tahun'];
		    $cekrealisasi = mysqli_query($connect,"SELECT id_twrc FROM capex_rencana,capex_realisasi WHERE id capex_realisasi.id_sp = '$idspcapex' AND capex_realisasi.tahun = '$tahuncapex' ");

		if($cekrealisasi){
?> 		    <script> window.alert('Nilai Realisasi telah Di isi, tidak bisa memperbaharui Nilai Rencana') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php
		} else {
		
		$updatetwrc1 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc1' WHERE id_twrc='$idtwrc1'");		
		$updatetwrc2 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc2' WHERE id_twrc='$idtwrc2'");
		$updatetwrc3 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc3' WHERE id_twrc='$idtwrc3'");
		$updatetwrc4 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc4' WHERE id_twrc='$idtwrc4'");
				if($updatetwrc1 AND $updatetwrc2 AND $updatetwrc4 && $updatetwrc4){
?>

					<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }
		}
	}
 
		if(isset($_POST['deleterencanacapex'])){
			$idtwrc1 = $_POST['editidtwrc1'];
			$idtwrc2 = $_POST['editidtwrc2'];
			$idtwrc3 = $_POST['editidtwrc3'];
			$idtwrc4 = $_POST['editidtwrc4'];		

			$cekcapex = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc1'"));
			$idspcapex = $cekcapex['id_sp'];
			$tahuncapex = $cekcapex['tahun'];
		    $cekrealisasi = mysqli_query($connect,"SELECT id_twrc FROM capex_rencana,capex_realisasi WHERE id capex_realisasi.id_sp = '$idspcapex' AND capex_realisasi.tahun = '$tahuncapex' ");

		if($cekrealisasi){
?> 		    <script> window.alert('Nilai Realisasi telah Di isi, tidak bisa menghapus Nilai Rencana') </script>
			<script>document.location.href="javascript:history.back()";</script>
<?php
		} else {
		
		$deletetwrc1 = mysqli_query($connect,"DELETE FROM capex_rencana WHERE id_twrc='$idtwrc1'");		
		$deletetwrc2 = mysqli_query($connect,"DELETE FROM capex_rencana  WHERE id_twrc='$idtwrc2'");
		$deletetwrc3 = mysqli_query($connect,"DELETE FROM capex_rencana  WHERE id_twrc='$idtwrc3'");
		$deletetwrc4 = mysqli_query($connect,"DELETE FROM capex_rencana  WHERE id_twrc='$idtwrc4'");
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
	}




		if(isset($_POST['editrealisasicapex'])){
			
			$idtwrl1 = $_POST['editidtwrl1'];	
			$idtwrl2 = $_POST['editidtwrl2'];
			$idtwrl3 = $_POST['editidtwrl3'];
			$idtwrl4 = $_POST['editidtwrl4'];							
			$sttwrl = $_POST['sttwrl'];
			$stakhir = $_POST['stakhir'];
			$realisasi = $_POST['realisasi'];

		
			$updatetwrc = mysqli_query($connect,"UPDATE capex_realisasi SET stat_akhir ='$stakhir' , realisasi='$realisasi' WHERE id_twrl = '$idtwrl1' AND stat_twrl ='$sttwrl'");
		
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
	
 		if(isset($_POST['deleterealisasicapex'])){
			$idtwrl1 = $_POST['editidtwrl1'];
			$idtwrl2 = $_POST['editidtwrl2'];
			$idtwrl3 = $_POST['editidtwrl3'];
			$idtwrl4 = $_POST['editidtwrl4'];		
		
		$deletetwrc1 = mysqli_query($connect,"DELETE FROM capex_realisasi WHERE id_twrl='$idtwrl1'");		
		$deletetwrc2 = mysqli_query($connect,"DELETE FROM capex_realisasi  WHERE id_twrl='$idtwrl2'");
		$deletetwrc3 = mysqli_query($connect,"DELETE FROM capex_realisasi  WHERE id_twrl='$idtwrl3'");
		$deletetwrc4 = mysqli_query($connect,"DELETE FROM capex_realisasi  WHERE id_twrl='$idtwrl4'");
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
