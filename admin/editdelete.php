<?php
include 'connect.php';
include 'anti_inject.php';

if(isset($_POST['deletelaporan'])){
	$idrl = anti_injection($_POST['id_realisasi']);
	$delete = mysqli_query($connect,"DELETE FROM realisasi_laporan WHERE id_realisasi='$idrl'");
	if($delete){
?>
		<script> window.alert('Penghapusan Laporan Berhasil') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php
	}else{ ?>
		<script> window.alert('Penghapusan Laporan Gagal') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php 	}
	}

if(isset($_POST['deletett'])){
	$idgerbang = anti_injection($_POST['idgerbang']);
	$tahun = anti_injection($_POST['tahun']);
	$tw = anti_injection($_POST['tw']);
	$delete = mysqli_query($connect,"DELETE FROM transaksi_tinggi WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw'");
	if($delete){
?>
		<script> window.alert('Penghapusan Data Berhasil') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php
	}else{ ?>
		<script> window.alert('Penghapusan Data Gagal') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php 	}
	}

	if(isset($_POST['edittt'])){
	$idgerbang = anti_injection($_POST['idgerbang']);
	$tahun = anti_injection($_POST['tahun']);
	$tw = anti_injection($_POST['tw']);
	$data1 = anti_injection($_POST['gardu_terbuka_lalin']);
	$data2 = anti_injection($_POST['gardu_masuk_lalin']);
	$data3 = anti_injection($_POST['gardu_keluar_lalin']);
	$data4 = anti_injection($_POST['gardu_terbuka_gto_lalin']);
	$data5 = anti_injection($_POST['gardu_masuk_gto_lalin']);
	$data6 = anti_injection($_POST['gardu_keluar_gto_lalin']);
	$data7 = anti_injection($_POST['epass_lalin']);

	$update1 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data1' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='1'");
	$update2 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data2' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='2'");
	$update3 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data3' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='3'");
	$update4 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data4' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='4'");
	$update5 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data5' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='5'");
	$update6 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data6' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='6'");
	$update7 = mysqli_query($connect,"UPDATE transaksi_tinggi SET nilai ='$data7' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='7'");

	if($update1 AND $update2 AND $update3 AND $update4 AND $update5 AND $update6 AND $update7){
?>
		<script> window.alert('Data berhasil Diubah') </script>
		<script>document.location.href="javascript:history.back()";</script>
	<?php
	}else{
	?>
		<script> window.alert('Data Gagal Diubah') </script>
		<script>document.location.href="javascript:history.back()";</script>
	<?php
		}
	}

	if(isset($_POST['deletejg'])){
	$idgerbang = anti_injection($_POST['idgerbang']);
	$tahun = anti_injection($_POST['tahun']);
	$tw = anti_injection($_POST['tw']);
	$delete = mysqli_query($connect,"DELETE FROM jml_gardutersedia WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw'");
	if($delete){
?>
		<script> window.alert('Penghapusan Data Berhasil') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php
	}else{ ?>
		<script> window.alert('Penghapusan Data Gagal') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php 	}
	}

	if(isset($_POST['editjg'])){
	$idgerbang = anti_injection($_POST['idgerbang']);
	$tahun = anti_injection($_POST['tahun']);
	$tw = anti_injection($_POST['tw']);
	$data1 = anti_injection($_POST['gardu_terbuka_tersedia']);
	$data2 = anti_injection($_POST['gardu_masuk_tersedia']);
	$data3 = anti_injection($_POST['gardu_keluar_tersedia']);
	$data4 = anti_injection($_POST['gardu_terbuka_gto_tersedia']);
	$data5 = anti_injection($_POST['gardu_masuk_gto_tersedia']);
	$data6 = anti_injection($_POST['gardu_keluar_gto_tersedia']);
	$data7 = anti_injection($_POST['epass_tersedia']);

	$update1 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data1' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='1'");
	$update2 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data2' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='2'");
	$update3 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data3' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='3'");
	$update4 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data4' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='4'");
	$update5 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data5' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='5'");
	$update6 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data6' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='6'");
	$update7 = mysqli_query($connect,"UPDATE jml_gardutersedia SET nilai ='$data7' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND tw='$tw' AND id_subgardu='8'");

	if($update1 AND $update2 AND $update3 AND $update4 AND $update5 AND $update6 AND $update7){
?>
		<script> window.alert('Data berhasil Diubah') </script>
		<script>document.location.href="javascript:history.back()";</script>
	<?php
	}else{
	?>
		<script> window.alert('Data Gagal Diubah') </script>
		<script>document.location.href="javascript:history.back()";</script>
	<?php
		}
	}

	if(isset($_POST['deletejs'])){
	$idgerbang = anti_injection($_POST['idgerbang']);
	$tahun = anti_injection($_POST['tahun']);
	$delete = mysqli_query($connect,"DELETE FROM pengumpul_tol WHERE id_gerbang='$idgerbang' AND tahun='$tahun'");
	if($delete){
?>
		<script> window.alert('Penghapusan Data Berhasil') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php
	}else{ ?>
		<script> window.alert('Penghapusan Data Gagal') </script>
		<script>document.location.href="javascript:history.back()";</script>
<?php 	}
	}

	if(isset($_POST['editjs'])){
	$idgerbang = anti_injection($_POST['idgerbang']);
	$tahun = anti_injection($_POST['tahun']);
	$data1 = anti_injection($_POST['kpl_gerbangtol']);
	$data2 = anti_injection($_POST['kspt']);
	$data3 = anti_injection($_POST['kry_jasamarga']);
	$data4 = anti_injection($_POST['kry_jlj']);
	$data5 = anti_injection($_POST['kry_jlo']);
	$data6 = anti_injection($_POST['sakit_permanen']);
	$data7 = anti_injection($_POST['tugt']);

	$update1 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data1' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='5'");
	$update2 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data2' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='6'");
	$update3 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data3' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='1'");
	$update4 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data4' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='2'");
	$update5 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data5' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='3'");
	$update6 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data6' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='4'");
	$update7 = mysqli_query($connect,"UPDATE pengumpul_tol SET jumlah ='$data7' WHERE id_gerbang='$idgerbang' AND tahun='$tahun' AND id_karyawan='7'");

	if($update1 AND $update2 AND $update3 AND $update4 AND $update5 AND $update6 AND $update7){
?>
		<script> window.alert('Data berhasil Diubah') </script>
		<script>document.location.href="javascript:history.back()";</script>
	<?php
	}else{
	?>
		<script> window.alert('Data Gagal Diubah') </script>
		<script>document.location.href="javascript:history.back()";</script>
	<?php
		}
	}
