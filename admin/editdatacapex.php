<?php
	include 'connect.php';
	include 'anti_inject.php';

		if(isset($_POST['editrencanacapex'])){
			$idtwrc1 = anti_injection($_POST['editidtwrc1']);
			$idtwrc2 = anti_injection($_POST['editidtwrc2']);
			$idtwrc3 = anti_injection($_POST['editidtwrc3']);
			$idtwrc4 = anti_injection($_POST['editidtwrc4']);
			$datatwrc1 = anti_injection($_POST['edittwrc1']);
			$datatwrc2 = anti_injection($_POST['edittwrc2']);
			$datatwrc3 = anti_injection($_POST['edittwrc3']);
			$datatwrc4 = anti_injection($_POST['edittwrc4']);


			$cekcapex = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc1'"));
			$idspcapex = $cekcapex['id_sp'];
			$tahuncapex = $cekcapex['tahun'];
		    $cekrealisasi = mysqli_query($connect,"SELECT id_twrc FROM capex_rencana,capex_realisasi WHERE capex_realisasi.id_sp = '$idspcapex' AND capex_realisasi.tahun = '$tahuncapex' ");

		if($cekrealisasi){
?> 		    <script> window.alert('Nilai Realisasi telah diisi, tidak bisa memperbaharui Nilai Rencana') </script>
			<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
		} else {

		$updatetwrc1 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc1' WHERE id_twrc='$idtwrc1'");
		$updatetwrc2 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc2' WHERE id_twrc='$idtwrc2'");
		$updatetwrc3 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc3' WHERE id_twrc='$idtwrc3'");
		$updatetwrc4 = mysqli_query($connect,"UPDATE capex_rencana SET rkap ='$datatwrc4' WHERE id_twrc='$idtwrc4'");
				if($updatetwrc1 AND $updatetwrc2 AND $updatetwrc4 && $updatetwrc4){
?>

					<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php 		 }
		}
	}

		if(isset($_POST['deleterencanacapex'])){
			$idtwrc1 = anti_injection($_POST['editidtwrc1']);
			$idtwrc2 = anti_injection($_POST['editidtwrc2']);
			$idtwrc3 = anti_injection($_POST['editidtwrc3']);
			$idtwrc4 = anti_injection($_POST['editidtwrc4']);

			$cekcapex = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc1'"));
			$idspcapex = $cekcapex['id_sp'];
			$tahuncapex = $cekcapex['tahun'];
		    $cekrealisasi = mysqli_query($connect,"SELECT id_twrc FROM capex_rencana,capex_realisasi WHERE capex_realisasi.id_sp = '$idspcapex' AND capex_realisasi.tahun = '$tahuncapex' ");

		if($cekrealisasi){
?> 		    <script> window.alert('Nilai Realisasi telah diisi, tidak bisa menghapus Nilai Rencana') </script>
			<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
		} else {

		$deletetwrc1 = mysqli_query($connect,"DELETE FROM capex_rencana WHERE id_twrc='$idtwrc1'");
		$deletetwrc2 = mysqli_query($connect,"DELETE FROM capex_rencana  WHERE id_twrc='$idtwrc2'");
		$deletetwrc3 = mysqli_query($connect,"DELETE FROM capex_rencana  WHERE id_twrc='$idtwrc3'");
		$deletetwrc4 = mysqli_query($connect,"DELETE FROM capex_rencana  WHERE id_twrc='$idtwrc4'");
				if($deletetwrc1 AND $deletetwrc2 AND $deletetwrc3 && $deletetwrc4){
?>

					<script> window.alert('Penghapusan Nilai Rencana Berhasil') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php
				}else{ ?>
					<script> window.alert('Data Gagal Dihapus') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php 		 }
		}
	}




		if(isset($_POST['editrealisasicapex'])){

			$idtwrl1 = anti_injection($_POST['editidtwrl1']);
			$idtwrl2 = anti_injection($_POST['editidtwrl2']);
			$idtwrl3 = anti_injection($_POST['editidtwrl3']);
			$idtwrl4 = anti_injection($_POST['editidtwrl4']);
			$twrl1 = anti_injection($_POST['edittwrl1']);
			$twrl2 = anti_injection($_POST['edittwrl2']);
			$twrl3 = anti_injection($_POST['edittwrl3']);
			$twrl4 = anti_injection($_POST['edittwrl4']);


			$updatetwrl1 = mysqli_query($connect,"UPDATE capex_realisasi SET realisasi='$twrl1' WHERE id_twrl = '$idtwrl1' AND stat_twrl ='1'");
			$updatetwrl2 = mysqli_query($connect,"UPDATE capex_realisasi SET realisasi='$twrl2' WHERE id_twrl = '$idtwrl2' AND stat_twrl ='2'");
			$updatetwrl3 = mysqli_query($connect,"UPDATE capex_realisasi SET realisasi='$twrl3' WHERE id_twrl = '$idtwrl3' AND stat_twrl ='3'");
			$updatetwrl4 = mysqli_query($connect,"UPDATE capex_realisasi SET realisasi='$twrl4' WHERE id_twrl = '$idtwrl4' AND stat_twrl ='4'");


				if($updatetwrl1 OR $updatetwrl2 OR $updatetwrl3 OR $updatetwrl4){
?>

					<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>


<?php
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>


<?php 		 }
		}

 		if(isset($_POST['deleterealisasicapex'])){
			$idtwrl1 = anti_injection($_POST['editidtwrl1']);
			$idtwrl2 = anti_injection($_POST['editidtwrl2']);
			$idtwrl3 = anti_injection($_POST['editidtwrl3']);
			$idtwrl4 = anti_injection($_POST['editidtwrl4']);

		$deletetwrc1 = mysqli_query($connect,"DELETE FROM capex_realisasi WHERE id_twrl='$idtwrl1'");
		$deletetwrc2 = mysqli_query($connect,"DELETE FROM capex_realisasi  WHERE id_twrl='$idtwrl2'");
		$deletetwrc3 = mysqli_query($connect,"DELETE FROM capex_realisasi  WHERE id_twrl='$idtwrl3'");
		$deletetwrc4 = mysqli_query($connect,"DELETE FROM capex_realisasi  WHERE id_twrl='$idtwrl4'");
				if($deletetwrc1 AND $deletetwrc2 AND $deletetwrc3 && $deletetwrc4){
?>

					<script> window.alert('Penghapusan Nilai Rencana Berhasil') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php
				}else{ ?>
					<script> window.alert('Data Gagal Dihapus') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php 		 }
		}



if(isset($_POST['updaterencanacapex'])){
			$idtwrc1 = anti_injection($_POST['editidtwrc1']);
			$idtwrc2 = anti_injection($_POST['editidtwrc2']);
			$idtwrc3 = anti_injection($_POST['editidtwrc3']);
			$idtwrc4 = anti_injection($_POST['editidtwrc4']);
			$datatwrc1 = anti_injection($_POST['edittwrc1']);
			$datatwrc2 = anti_injection($_POST['edittwrc2']);
			$datatwrc3 = anti_injection($_POST['edittwrc3']);
			$datatwrc4 = anti_injection($_POST['edittwrc4']);

			$twrc1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc1'"));
			$twrc2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc2'"));
			$twrc3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc3'"));
			$twrc4 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc4'"));

			if($datatwrc1 == $twrc1['rkap']){
				$datatwrc1 = 0;
			}
			if($datatwrc2 == $twrc2['rkap']){
				$datatwrc2 = 0;
			}
			if($datatwrc3 == $twrc3['rkap']){
				$datatwrc3 = 0;
			}
			if($datatwrc4 == $twrc4['rkap']){
				$datatwrc4 = 0;
			}
			$cekcapex = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM capex_rencana WHERE id_twrc = '$idtwrc1'"));
			$idspcapex = $cekcapex['id_sp'];
			$tahuncapex = $cekcapex['tahun'];
		    $cekrealisasi = mysqli_query($connect,"SELECT id_twrc FROM capex_rencana,capex_realisasi WHERE id capex_realisasi.id_sp = '$idspcapex' AND capex_realisasi.tahun = '$tahuncapex' ");

		if($cekrealisasi){
?> 		    <script> window.alert('Nilai Realisasi telah Di isi, tidak bisa memperbaharui Nilai Rencana') </script>
			<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>
<?php
		} else {

		$updatetwrc1 = mysqli_query($connect,"UPDATE capex_rencana SET revisi ='$datatwrc1' WHERE id_twrc='$idtwrc1'");
		$updatetwrc2 = mysqli_query($connect,"UPDATE capex_rencana SET revisi ='$datatwrc2' WHERE id_twrc='$idtwrc2'");
		$updatetwrc3 = mysqli_query($connect,"UPDATE capex_rencana SET revisi ='$datatwrc3' WHERE id_twrc='$idtwrc3'");
		$updatetwrc4 = mysqli_query($connect,"UPDATE capex_rencana SET revisi ='$datatwrc4' WHERE id_twrc='$idtwrc4'");
				if($updatetwrc1 AND $updatetwrc2 AND $updatetwrc4 && $updatetwrc4){
?>

					<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php
				}else{ ?>
					<script> window.alert('Data Gagal Diperbaharui') </script>
					<script>document.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";</script>

<?php 		 }
		}
	}

?>
