<?php
	include 'connect.php';

//proses edit waktu transaksi
		if(isset($_POST['editrencanaspm'])){
			$idsemester = $_POST['edit_idsemester'];
			$idgardukeluar = $_POST['edit_idgardukeluar'];
			$idgardumasuk = $_POST['edit_idgardumasuk'];
			$idgarduterbuka = $_POST['edit_idgarduterbuka'];
			$idgardutolambilkartu = $_POST['edit_idgardutolambilkartu'];
			$idgardutoltransaksi = $_POST['edit_idgardutoltransaksi'];
			$idjmlpanjangantrian = $_POST['edit_idjmlpanjangantrian'];


			$datagardukeluar = $_POST['edit_gardukeluar'];
			$datagardumasuk = $_POST['edit_gardumasuk'];
			$datagarduterbuka = $_POST['edit_garduterbuka'];
			$datagardutolambilkartu = $_POST['edit_gardutolambilkartu'];
			$datagardutoltransaksi = $_POST['edit_gardutoltransaksi'];
			$datajmlpanjangantrian = $_POST['edit_jmlpanjangantrian'];

			$updategardukeluar = mysqli_query($connect,"UPDATE wt_rencana SET nilai ='$datagardukeluar' WHERE id_wtrencana='$idgardukeluar' AND id_semester='$idsemester'");
			$updategardumasuk = mysqli_query($connect,"UPDATE wt_rencana SET nilai ='$datagardumasuk' WHERE id_wtrencana='$idgardumasuk' AND id_semester='$idsemester'");
			$updategarduterbuka = mysqli_query($connect,"UPDATE wt_rencana SET nilai ='$datagarduterbuka' WHERE id_wtrencana='$idgarduterbuka' AND id_semester='$idsemester'");
			$updategardutolambilkartu = mysqli_query($connect,"UPDATE wt_rencana SET nilai ='$datagardutolambilkartu' WHERE id_wtrencana='$idgardutolambilkartu' AND id_semester='$idsemester'");
			$updategardutoltransaksi = mysqli_query($connect,"UPDATE wt_rencana SET nilai ='$datagardutoltransaksi' WHERE id_wtrencana='$idgardutoltransaksi' AND id_semester='$idsemester'");
			$updatejmlpanjangantrian = mysqli_query($connect,"UPDATE wt_rencana SET nilai ='$datajmlpanjangantrian' WHERE id_wtrencana='$idjmlpanjangantrian' AND id_semester='$idsemester'");

			if($updategardukeluar AND $updategardumasuk AND $updategarduterbuka AND $updategardutolambilkartu AND $updategardutoltransaksi AND $updatejmlpanjangantrian){
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

		//proses delete rencana spm
				if(isset($_POST['deleterencanaspm'])){
					$idsemester = $_POST['edit_idsemester'];

					$deleterencanaspm = mysqli_query($connect,"DELETE FROM wt_rencana WHERE id_semester='$idsemester'");
					if($deleterencanaspm){

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
