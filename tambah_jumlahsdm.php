<?php
	include 'connect.php';

		if(isset($_POST['tambah'])){
			$idcabang = $_POST['idcabang'];
		 	$idgerbang= $_POST['idgerbang'];
			$tahun= $_POST['tahun'];

			$idkpl_gerbangtol = $_POST['idkpl_gerbangtol'];
      $kpl_gerbangtol = $_POST['kpl_gerbangtol'];

      $idkspt = $_POST['idkspt'];
      $kspt = $_POST['kspt'];

      $idkry_jasamarga = $_POST['idkry_jasamarga'];
      $kry_jasamarga = $_POST['kry_jasamarga'];

      $idkry_jlj = $_POST['idkry_jlj'];
      $kry_jlj = $_POST['kry_jlj'];

      $idkry_jlo = $_POST['idkry_jlo'];
      $kry_jlo = $_POST['kry_jlo'];

      $idsakit_permanen = $_POST['idsakit_permanen'];
      $sakit_permanen = $_POST['sakit_permanen'];


      $idtugt = $_POST['idtugt'];
      $tugt = $_POST['tugt'];


		}

			//insert data
			$insert_jumlahsdm = mysqli_query($connect,"INSERT INTO pengumpul_tol VALUES
      ('','$tahun','$kpl_gerbangtol','$idkpl_gerbangtol','$idgerbang', '$idcabang'),
	  ('','$tahun','$kspt', '$idkspt', '$idgerbang','$idcabang'),
      ('','$tahun','$kry_jasamarga', '$idkry_jasamarga', '$idgerbang','$idcabang'),
	  ('','$tahun','$kry_jlj','$idkry_jlj', '$idgerbang', '$idcabang'),
      ('','$tahun','$kry_jlo', '$idkry_jlo', '$idgerbang', '$idcabang'),
      ('','$tahun','$sakit_permanen', '$idsakit_permanen','$idgerbang', '$idcabang'),
      ('','$tahun','$tugt','$idtugt', '$idgerbang', '$idcabang')");


			if($insert_jumlahsdm){
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
