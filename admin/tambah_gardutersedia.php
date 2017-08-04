<?php
	include 'connect.php';

		if(isset($_POST['tambah'])){
			$idcabang = $_POST['idcabang'];
		 	$idgerbang= $_POST['idgerbang'];

			$idgardu_terbuka_tersedia = $_POST['idgardu_terbuka_tersedia'];
      $gardu_terbuka_tersedia = $_POST['gardu_terbuka_tersedia'];

      $idgardu_masuk_tersedia = $_POST['idgardu_masuk_tersedia'];
      $gardu_masuk_tersedia = $_POST['gardu_masuk_tersedia'];

      $idgardu_keluar_tersedia = $_POST['idgardu_keluar_tersedia'];
      $gardu_keluar_tersedia = $_POST['gardu_keluar_tersedia'];

      $idgardu_terbuka_gto_tersedia = $_POST['idgardu_terbuka_gto_tersedia'];
      $gardu_terbuka_gto_tersedia = $_POST['gardu_terbuka_gto_tersedia'];

      $idgardu_masuk_gto_tersedia = $_POST['idgardu_masuk_gto_tersedia'];
      $gardu_masuk_gto_tersedia = $_POST['gardu_masuk_gto_tersedia'];

      $idgardu_keluar_gto_tersedia = $_POST['idgardu_keluar_gto_tersedia'];
      $gardu_keluar_gto_tersedia = $_POST['gardu_keluar_gto_tersedia'];


      $idepass_tersedia = $_POST['idepass_tersedia'];
      $epass_tersedia = $_POST['epass_tersedia'];





		}

			//insert data
			$insert_gardutersedia = mysqli_query($connect,"INSERT INTO jml_gardutersedia VALUES
      ('','$gardu_terbuka_tersedia','$idgardu_terbuka_tersedia','$idgerbang', '$idcabang'),
			('','$gardu_masuk_tersedia', '$idgardu_masuk_tersedia', '$idgerbang','$idcabang'),
      ('','$gardu_keluar_tersedia', '$idgardu_keluar_tersedia', '$idgerbang','$idcabang'),
			('','$gardu_terbuka_gto_tersedia','$idgardu_terbuka_gto_tersedia', '$idgerbang', '$idcabang'),
      ('','$gardu_masuk_gto_tersedia', '$idgardu_masuk_gto_tersedia', '$idgerbang', '$idcabang'),
      ('','$gardu_keluar_gto_tersedia', '$idgardu_keluar_gto_tersedia','$idgerbang', '$idcabang'),
      ('','$epass_tersedia','$idepass_tersedia', '$idgerbang', '$idcabang')");


			if($insert_gardutersedia){
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
