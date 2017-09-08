<?php
include 'connect.php';
include 'anti_inject.php';

	if(isset($_POST['prosesTanggalLock'])){


		$tanggal = anti_injection($_POST['tanggallocker']);
		list($datestart, $dateend) = explode(' - ', $tanggal);

		list($bulanstart, $tglstart, $tahunstart) = explode('/',$datestart);
		$datestart = $tahunstart."-".$bulanstart."-".$tglstart;

		list($bulanend, $tglend, $tahunend) = explode('/',$dateend);
		$dateend = $tahunend."-".$bulanend."-".$tglend;

/*		$ubahDate = mysqli_query($connect, "UPDATE FROM locker")
*/

		$updateLocker = mysqli_query($connect,"UPDATE locker_realisasilaporan SET start_unggah='$datestart', end_unggah ='$dateend' WHERE id_locker='1' ");

		if($updateLocker){
?>

					<script> window.alert('Pembaharuan Locker Unggah Berhasil') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php
				}else{ ?>
					<script> window.alert('Pembaharuan Locker Gagal Diperbaharui') </script>
					<script>document.location.href="javascript:history.back()";</script>

<?php 		 }

	}
?>
