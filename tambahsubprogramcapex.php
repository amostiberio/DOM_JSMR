<?php
	include 'connect.php';

		if(isset($_POST['tambah'])){
			
		 	$id_pk= $_POST['idprogramkerja'];
			$nama_subpk = $_POST['subprogramkerja'];
		    $idcabang = $_POST['idcabang'];
           
		//cek inputan double di database


            
		$ceknama_subprogramkerja = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sub_program WHERE id_pk = '$id_pk' AND nama_sp ='$nama_subpk' AND jenis ='capex'"));
            
		$cek = $ceknama_subprogramkerja['id_pk']; //id program kerja checker
		$cek2 = $ceknama_subprogramkerja['nama_sp']; //id subprogram kerja checker
            
			if($cek2==$nama_subpk && $cek== $id_pk){ 
				
?>
				<script>window.alert('Nama Sub Program Kerja Sudah Ada Pada Program Kerja') </script>
				<script>document.location.href="javascript:history.back()";</script>
<?php		
            }          
            else{
                    
				$insert= mysqli_query($connect,"INSERT INTO sub_program VALUES ('','$nama_subpk','$id_pk','$idcabang','capex')");
				            
					if($insert){
?>		 				
                    <script> window.alert('Data berhasil Ditambah') </script>
                    <script>document.location.href="javascript:history.back()";</script>
<?php		
					}
                    else{ 
?>
						<script> window.alert('Data Gagal Ditambahkan') </script>
						<script>document.location.href="javascript:history.back()";</script>
<?php 		 		}
			}
		}
?>
