<?php
	include 'connect.php';

		if(isset($_POST['tambah'])){
			$idcabang = $_POST['idcabang'];
		 	$idgerbang= $_POST['idgerbang'];
			$idsemester= $_POST['idsemester'];
			$tahun = $_POST['tahun'];
			$idgardu_terbuka = $_POST['idgardu_terbuka'];
      $gardu_terbuka = $_POST['gardu_terbuka'];

      $idgardu_masuk = $_POST['idgardu_masuk'];
      $gardu_masuk = $_POST['gardu_masuk'];

      $idgardu_keluar = $_POST['idgardu_keluar'];
      $gardu_keluar = $_POST['gardu_keluar'];

      $idgardu_terbuka_gto = $_POST['idgardu_terbuka_gto'];
      $gardu_terbuka_gto = $_POST['gardu_terbuka_gto'];

      $idgardu_masuk_gto = $_POST['idgardu_masuk_gto'];
      $gardu_masuk_gto = $_POST['gardu_masuk_gto'];

      $idgardu_keluar_gto = $_POST['idgardu_keluar_gto'];
      $gardu_keluar_gto = $_POST['gardu_keluar_gto'];


      $panjang_antrian = $_POST['panjang_antrian'];



		}

			//insert data
			$insert_waktutransaksi= mysqli_query($connect,"INSERT INTO waktu_transaksi VALUES
      ('','$gardu_terbuka', '$tahun', '$idgerbang','$idgardu_terbuka', '$idcabang', '$idsemester'),
			('','$gardu_masuk', '$tahun' ,'$idgerbang','$idgardu_masuk', '$idcabang', '$idsemester'),
      ('','$gardu_keluar', '$tahun' ,'$idgerbang','$idgardu_keluar', '$idcabang', '$idsemester'),
			('','$gardu_terbuka_gto', '$tahun' ,'$idgerbang','$idgardu_terbuka_gto', '$idcabang', '$idsemester'),
      ('','$gardu_masuk_gto', '$tahun' ,'$idgerbang','$idgardu_masuk_gto', '$idcabang', '$idsemester'),
      ('','$gardu_keluar_gto','$tahun', '$idgerbang','$idgardu_keluar_gto', '$idcabang','$idsemester')");

      $insert_panjangantrian= mysqli_query($connect,"INSERT INTO panjang_antrian VALUES ('','$panjang_antrian','$tahun', '$idgerbang', '$idsemester', '$idcabang')");

			if($insert_waktutransaksi AND $insert_panjangantrian){
?>
				<script> window.alert('Data berhasil Ditambah') </script>
        <script>document.location.href="javascript:history.back()";</script>
<?php
			}else{
?>
				<script> window.alert('Data Gagal Ditambahkan') </script>
        <script>document.location.href="javascript:history.back()";</script>
<?php
			}

?>
