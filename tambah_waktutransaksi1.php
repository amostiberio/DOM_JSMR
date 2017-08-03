<?php
	include 'connect.php';

		if(isset($_POST['tambah'])){
			$idcabang = $_POST['idcabang'];
		 	$idgerbang= $_POST['idgerbang'];

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
      ('','$gardu_terbuka','$idgerbang','$idgardu_terbuka', '$idcabang'),
			('','$gardu_masuk','$idgerbang','$idgardu_masuk', '$idcabang'),
      ('','$gardu_keluar','$idgerbang','$idgardu_keluar', '$idcabang'),
			('','$gardu_terbuka_gto','$idgerbang','$idgardu_terbuka_gto', '$idcabang'),
      ('','$gardu_masuk_gto','$idgerbang','$idgardu_masuk_gto', '$idcabang'),
      ('','$gardu_keluar_gto','$idgerbang','$idgardu_keluar_gto', '$idcabang')");

      $insert_panjangantrian= mysqli_query($connect,"INSERT INTO panjang_antrian VALUES ('','$panjang_antrian','$idgerbang')");

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
