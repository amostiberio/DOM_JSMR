<?php
	include 'connect.php';

//proses edit waktu transaksi semester 1
		if(isset($_POST['editwaktutransaksis1'])){
			$idgerbangterbukas1 = $_POST['edit_idgerbangterbukas1'];
			$idgerbangmasuks1 = $_POST['edit_idgerbangmasuks1'];
			$idgerbangkeluars1 = $_POST['edit_idgerbangkeluars1'];
			$idgerbangterbukagtos1 = $_POST['edit_idgerbang_gto_terbukas1'];
			$idgerbangmasukgtos1 = $_POST['edit_idgerbang_gto_masuks1'];
			$idgerbangkeluargtos1 = $_POST['edit_idgerbang_gto_keluars1'];
			$idpanjangantrians1 = $_POST['edit_idpanjang_antrians1'];

			$datagerbangterbukas1 = $_POST['edit_gerbangterbukas1'];
			$datagerbangmasuks1 = $_POST['edit_gerbangmasuks1'];
			$datagerbangkeluars1 = $_POST['edit_gerbangkeluars1'];
			$datagerbangterbukagtos1 = $_POST['edit_gerbang_gto_terbukas1'];
			$datagerbangmasukgtos1 = $_POST['edit_gerbang_gto_masuks1'];
			$datagerbangkeluargtos1 = $_POST['edit_gerbang_gto_keluars1'];
			$datapanjangantrians1 = $_POST['edit_panjang_antrians1'];


			$updategerbangterbukas1 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangterbukas1' WHERE id_waktutrans='$idgerbangterbukas1'");
			$updategerbangmasuks1 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangmasuks1' WHERE id_waktutrans='$idgerbangmasuks1'");
			$updategerbangkeluars1 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangkeluars1' WHERE id_waktutrans='$idgerbangkeluars1'");
			$updategerbangterbukagtos1 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangterbukagtos1' WHERE id_waktutrans='$idgerbangterbukagtos1'");
			$updategerbangmasukgtos1 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangmasukgtos1' WHERE id_waktutrans='$idgerbangmasukgtos1'");
			$updategerbangkeluargtos1 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangkeluargtos1' WHERE id_waktutrans='$idgerbangkeluargtos1'");
			$updatepanjangantrians1 = mysqli_query($connect,"UPDATE panjang_antrian SET panjang_antrian ='$datapanjangantrians1' WHERE id_pa='$idpanjangantrians1'");

			if($updategerbangterbukas1 AND $updategerbangmasuks1 AND $updategerbangkeluars1 AND $updategerbangterbukagtos1 AND $updategerbangmasukgtos1 AND $updategerbangkeluargtos1 AND $updatepanjangantrians1){
?>
				<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
			else{ ?>
				<script> window.alert('Data Gagal Diperbaharui') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
		}

//proses delete waktu transaksi semester 1
		if(isset($_POST['deletewaktutransaksi'])){
			$idgerbang = $_POST['edit_idgerbang'];
			$idsemester1 = $_POST['edit_idsemester1'];
			$idtws1 = $_POST['edit_idtws1'];

			$deletewaktutransaksi = mysqli_query($connect,"DELETE FROM waktu_transaksi WHERE id_gerbang='$idgerbang' AND id_semester='$idsemester1' AND id_tw='$idtws1'");
			$deletepanjangantrian = mysqli_query($connect,"DELETE FROM panjang_antrian WHERE id_gerbang='$idgerbang' AND id_semester='$idsemester1' AND id_tw='$idtws1'");
			if($deletewaktutransaksi AND $deletepanjangantrian){

?>
				<script> window.alert('Penghapusan Nilai Rencana Berhasil') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
			else{
?>
				<script> window.alert('Data Gagal Dihapus') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
		}
//proses edit waktu transaksi semester 2
		if(isset($_POST['editwaktutransaksis2'])){
			$idgerbangterbukas2 = $_POST['edit_idgerbangterbukas2'];
			$idgerbangmasuks2 = $_POST['edit_idgerbangmasuks2'];
			$idgerbangkeluars2 = $_POST['edit_idgerbangkeluars2'];
			$idgerbangterbukagtos2 = $_POST['edit_idgerbang_gto_terbukas2'];
			$idgerbangmasukgtos2 = $_POST['edit_idgerbang_gto_masuks2'];
			$idgerbangkeluargtos2 = $_POST['edit_idgerbang_gto_keluars2'];
			$idpanjangantrians2 = $_POST['edit_idpanjang_antrians2'];

			$datagerbangterbukas2 = $_POST['edit_gerbangterbukas2'];
			$datagerbangmasuks2 = $_POST['edit_gerbangmasuks2'];
			$datagerbangkeluars2 = $_POST['edit_gerbangkeluars2'];
			$datagerbangterbukagtos2 = $_POST['edit_gerbang_gto_terbukas2'];
			$datagerbangmasukgtos2 = $_POST['edit_gerbang_gto_masuks2'];
			$datagerbangkeluargtos2 = $_POST['edit_gerbang_gto_keluars2'];
			$datapanjangantrians2 = $_POST['edit_panjang_antrians2'];


			$updategerbangterbukas2 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangterbukas2' WHERE id_waktutrans='$idgerbangterbukas2'");
			$updategerbangmasuks2 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangmasuks2' WHERE id_waktutrans='$idgerbangmasuks2'");
			$updategerbangkeluars2 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangkeluars2' WHERE id_waktutrans='$idgerbangkeluars2'");
			$updategerbangterbukagtos2 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangterbukagtos2' WHERE id_waktutrans='$idgerbangterbukagtos2'");
			$updategerbangmasukgtos2 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangmasukgtos2' WHERE id_waktutrans='$idgerbangmasukgtos2'");
			$updategerbangkeluargtos2 = mysqli_query($connect,"UPDATE waktu_transaksi SET nilai ='$datagerbangkeluargtos2' WHERE id_waktutrans='$idgerbangkeluargtos2'");
			$updatepanjangantrians2 = mysqli_query($connect,"UPDATE panjang_antrian SET panjang_antrian ='$datapanjangantrians2' WHERE id_pa='$idpanjangantrians2'");

			if($updategerbangterbukas2 AND $updategerbangmasuks2 AND $updategerbangkeluars2 AND $updategerbangterbukagtos2 AND $updategerbangmasukgtos2 AND $updategerbangkeluargtos2 AND $updatepanjangantrians2){

?>
				<script> window.alert('Pembaharuan Nilai Rencana Berhasil') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
			else{
?>
			<script> window.alert('Data Gagal Diperbaharui') </script>
			<script>document.location.href="javascript:history.back()";</script>

<?php
			}
		}
//proses delete waktu transaksi semester 2
		if(isset($_POST['deletewaktutransaksis2'])){
			$idgerbang = $_POST['edit_idgerbang'];
			$idsemester2 = $_POST['edit_idsemester2'];
			$idtws2 = $_POST['edit_idtws2'];


			$deletewaktutransaksi = mysqli_query($connect,"DELETE FROM waktu_transaksi WHERE id_gerbang='$idgerbang' AND id_semester='$idsemester2' AND id_tw='$idtws2'");
			$deletepanjangantrian = mysqli_query($connect,"DELETE FROM panjang_antrian WHERE id_gerbang='$idgerbang' AND id_semester='$idsemester2' AND id_tw='$idtws2'");
			if($deletewaktutransaksi AND $deletepanjangantrian){
?>
				<script> window.alert('Penghapusan Nilai Rencana Berhasil') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
			else{
?>
				<script> window.alert('Data Gagal Dihapus') </script>
				<script>document.location.href="javascript:history.back()";</script>

<?php
			}
		}
?>
