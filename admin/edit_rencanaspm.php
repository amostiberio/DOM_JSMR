<?php
	include 'connect.php';
	include 'anti_inject.php';

//proses edit waktu transaksi
		if(isset($_POST['editrencanaspm'])){
			$idsemester = anti_injection($_POST['edit_idsemester']);
			$idgardukeluar = anti_injection($_POST['edit_idgardukeluar']);
			$idgardumasuk = anti_injection($_POST['edit_idgardumasuk']);
			$idgarduterbuka = anti_injection($_POST['edit_idgarduterbuka']);
			$idgardutolambilkartu = anti_injection($_POST['edit_idgardutolambilkartu']);
			$idgardutoltransaksi = anti_injection($_POST['edit_idgardutoltransaksi']);
			$idjmlpanjangantrian = anti_injection($_POST['edit_idjmlpanjangantrian']);


			$datagardukeluar = anti_injection($_POST['edit_gardukeluar']);
			$datagardumasuk = anti_injection($_POST['edit_gardumasuk']);
			$datagarduterbuka = anti_injection($_POST['edit_garduterbuka']);
			$datagardutolambilkartu = anti_injection($_POST['edit_gardutolambilkartu']);
			$datagardutoltransaksi = anti_injection($_POST['edit_gardutoltransaksi']);
			$datajmlpanjangantrian = anti_injection($_POST['edit_jmlpanjangantrian']);

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
					$idsemester = anti_injection($_POST['edit_idsemester']);

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
