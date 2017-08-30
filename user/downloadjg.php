<?php 
include "connect.php";
include('akses.php'); //untuk memastikan dia sudah login

if(isset($_GET['tahun'])){
    $nilaiTahun = $_GET['tahun'];
  
  }else $nilaiTahun = '0';

  $iduser = $_SESSION['id_user'];

  //ambil informasi user id dan cabang id dari table user
  $user = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM user WHERE id_user = '$iduser' "));
  $idcabang = $user['id_cabang'];

  //ambil informasi user id dan cabang id dari table cabang
  $cabang =  mysqli_fetch_array(mysqli_query($connect,"SELECT nama_cabang FROM cabang WHERE id_cabang = '$idcabang'"));
  $namacabang = $cabang['nama_cabang'];


// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msdownload");
// Mendefinisikan nama file ekspor "hasil-export.xls"
if($nilaiTahun > 0){
	header("Content-Disposition: attachment; filename=Laporan Jumlah Gardu Cabang ".$namacabang." Tahun ".$nilaiTahun.".xls");}
else{
	header("Content-Disposition: attachment; filename=Laporan Jumlah Gardu Cabang ".$namacabang.".xls");}
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

 <div align="center"> <p>Jumlah Gardu Cabang <?php echo $namacabang?> </p></div>

                       <table border="1" id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >

                              <tr >
                                <th rowspan="3">No</th>
                                <th rowspan="3">Gerbang</th>
								<th rowspan="3">Tahun</th>
                                <th colspan="7">Jumlah Gardu Tersedia</th>
                              </tr>
                              <tr>
                                <th colspan="3">Reguler</th>
								<th colspan="3">GTO</th>
                                <th rowspan="2">E-Pass</th>
                              </tr>
                              <tr>

                                <th rowspan="1">Gardu Keluar</th>
                                <th rowspan="1">Gardu Masuk</th>
                                <th colspan="1">Gardu Terbuka</th>
                                <th rowspan="1">Gardu Keluar</th>
                                <th rowspan="1">Gardu Masuk</th>
                                <th colspan="1">Gardu Terbuka</th>
                              </tr>

                            </thead>
                            <tbody>
                              <?php
								if($nilaiTahun > 0){
                                 $jmlgardu = mysqli_query($connect, "SELECT * FROM jml_gardutersedia join gerbang on gerbang.id_gerbang=jml_gardutersedia.id_gerbang WHERE jml_gardutersedia.tahun='$nilaiTahun' AND jml_gardutersedia.id_cabang='$idcabang' group by jml_gardutersedia.tahun, jml_gardutersedia.id_gerbang");

							  }else{
                                $jmlgardu = mysqli_query($connect, "SELECT * FROM jml_gardutersedia join gerbang on gerbang.id_gerbang=jml_gardutersedia.id_gerbang WHERE jml_gardutersedia.id_cabang='$idcabang' group by jml_gardutersedia.tahun, jml_gardutersedia.id_gerbang");}
								$nomor = 1; $total1 =0; $total2 =0; $total3 =0; $total4 =0; $total5 =0; $total6 =0; $total7 =0; 
                                while($data_jmlgardu = mysqli_fetch_array($jmlgardu)){
                                   $idgerbanglist = $data_jmlgardu['id_gerbang'];
                                   $idsubgardulist = $data_jmlgardu['id_subgardu'];
								   $tahun = $data_jmlgardu['tahun'];

                                   //fething data dari tabel gerbang
                                   $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));

                                   //fetching data untuk tabel bagian jumlah gardu tersedia
                                  $data_gerbang_terbuka_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '1'");
                                  $total_gerbang_terbuka_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_terbuka_tersedia)) {
								  $total_gerbang_terbuka_tersedia += $num['nilai'];}
                                  $data_gerbang_masuk_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '2'");
                                  $total_gerbang_masuk_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_masuk_tersedia)) {
								  $total_gerbang_masuk_tersedia += $num['nilai'];}
                                  $data_gerbang_keluar_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '3'");
                                  $total_gerbang_keluar_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_keluar_tersedia)) {
								  $total_gerbang_keluar_tersedia += $num['nilai'];}
                                  $data_gerbang_terbuka_gto_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '4'");
                                  $total_gerbang_terbuka_gto_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_terbuka_gto_tersedia)) {
								  $total_gerbang_terbuka_gto_tersedia += $num['nilai'];}
                                  $data_gerbang_masuk_gto_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '5'");
                                  $total_gerbang_masuk_gto_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_masuk_gto_tersedia)) {
								  $total_gerbang_masuk_gto_tersedia += $num['nilai'];}
                                  $data_gerbang_keluar_gto_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '6'");
                                  $total_gerbang_keluar_gto_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_keluar_gto_tersedia)) {
								  $total_gerbang_keluar_gto_tersedia += $num['nilai'];}
                                  $data_epass_tersedia = mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '8'");
                                  $total_epass_tersedia = 0;
								  while ($num = mysqli_fetch_array($data_epass_tersedia)) {
								  $total_epass_tersedia += $num['nilai'];}
                            ?>
                              <tr>
                                <td><?php echo $nomor; $nomor++?></td>
                                <td><?php echo $data_jmlgardu['nama_gerbang']?></td>
								<td><?php echo $data_jmlgardu['tahun'];?></td>
                                <td><?php $total1+=$total_gerbang_keluar_tersedia;
									echo $total_gerbang_keluar_tersedia?></td>
								<td><?php $total2+=$total_gerbang_masuk_tersedia;
									echo $total_gerbang_masuk_tersedia?></td>
								<td><?php $total3+=$total_gerbang_terbuka_tersedia;
									echo $total_gerbang_terbuka_tersedia?></td>
								<td><?php $total4+=$total_gerbang_keluar_gto_tersedia;
									echo $total_gerbang_keluar_gto_tersedia?></td>
								<td><?php $total5+=$total_gerbang_masuk_gto_tersedia;
									echo $total_gerbang_masuk_gto_tersedia?></td>
							    <td><?php $total6+=$total_gerbang_terbuka_gto_tersedia;
									echo $total_gerbang_terbuka_gto_tersedia?></td>
								<td><?php $total7+=$total_epass_tersedia;
									echo $total_epass_tersedia?></td>
                              </tr>
                              <?php }?>
                              <tr>
                                <td colspan='3'>Total</td>
                                <td><?php echo $total1?></td>
                                <td><?php echo $total2?></td>
                                <td><?php echo $total3?></td>
                                <td><?php echo $total4?></td>
                                <td><?php echo $total5?></td>
								<td><?php echo $total6?></td>
                                <td><?php echo $total7?></td>
                              </tr>
                            </tbody>
                          </table>

            

<div align="right">
 <p>Jakarta, </p>
 <br>
 
 <p><u>.........</u><br>
 NPP. </p>
<div>



 