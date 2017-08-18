<?php 
include "connect.php";
include('akses.php'); //untuk memastikan dia sudah login

 if(isset($_GET['tahun'])){
    $nilaiTahun = $_GET['tahun'];
  
  }else $nilaiTahun = '0';
  $iduser = $_SESSION['id_user'];

  $resultjs = $connect-> query("SELECT * FROM cabang");

  //ambil informasi jenis sub gardu
  $gardu = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM jenis_subgardu"));

  $idgerbang= mysqli_fetch_array(mysqli_query($connect,"SELECT id_gerbang FROM gerbang"));

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msdownload");
// Mendefinisikan nama file ekspor "hasil-export.xls"
if($nilaiTahun > 0){
	header("Content-Disposition: attachment; filename=Laporan Jumlah SDM Tahun ".$nilaiTahun.".xls");}
else{
	header("Content-Disposition: attachment; filename=Laporan Jumlah SDM.xls");}
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

 <div align="center"> <p>Jumlah SDM</p></div>

                       <table border="1" id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                              <tr >
                                <th rowspan="2">No</th>
                                <th rowspan="2">Cabang</th>
								<th rowspan="2">Tahun</th>
                                <th rowspan="2">Kepala Gerbang Tol</th>
                                <th rowspan="2">KSPT</th>
                                <th colspan="5">Pengumpul Tol</th>
                                <th rowspan="2">TUGT</th>
                              </tr>
                              <tr>
                                <th colspan="1">Karyawan Jasamarga</th>
								<th colspan="1">Karyawan JLJ</th>
                                <th rowspan="1">Karyawan JLO</th>
                                <th colspan="1">Sakit Permanen</th>
								<th colspan="1">Total</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
							  if($nilaiTahun > 0){
                                $jumlah_sdm = mysqli_query($connect, "SELECT * FROM pengumpul_tol join jenis_karyawan join cabang on cabang.id_cabang=pengumpul_tol.id_cabang WHERE pengumpul_tol.tahun='$nilaiTahun' group by pengumpul_tol.tahun, pengumpul_tol.id_cabang");
							  }else{
                                $jumlah_sdm = mysqli_query($connect, "SELECT * FROM pengumpul_tol join jenis_karyawan join cabang on cabang.id_cabang=pengumpul_tol.id_cabang group by pengumpul_tol.tahun, pengumpul_tol.id_cabang");
							  }							  
                                $nomor = 1; $total1 =0; $total2 =0; $total3 =0; $total4 =0; $total5 =0; $total6 =0; $total7 =0; $total8=0;
                                while($data_jumlahsdm = mysqli_fetch_array($jumlah_sdm)){
                                  $idcabang = $data_jumlahsdm['id_cabang'];
								  $tahun = $data_jumlahsdm['tahun'];
                                  $total = 0;
								  $data_kepalagerbangtol = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '5'");
								  $total_kepalagerbangtol = 0;
								  while ($num = mysqli_fetch_array($data_kepalagerbangtol)) {
									$total_kepalagerbangtol += $num['jumlah'];}
								  $data_kspt = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '6'");
                                  $total_kspt = 0;
								  while ($num = mysqli_fetch_array($data_kspt)) {
									$total_kspt += $num['jumlah'];}
                                  $data_kryjasamarga = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '1'");
                                  $total_kryjasamarga = 0;
								  while ($num = mysqli_fetch_array($data_kryjasamarga)) {
									$total_kryjasamarga += $num['jumlah'];}
                                  $data_kryjlj = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '2'");
                                  $total_kryjlj = 0;
								  while ($num = mysqli_fetch_array($data_kryjlj)) {
									$total_kryjlj += $num['jumlah'];}
                                  $data_kryjlo= mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '3'");
                                  $total_kryjlo= 0;
								  while ($num = mysqli_fetch_array($data_kryjlo)) {
									$total_kryjlo += $num['jumlah'];}
                                  $data_sakitpermanen = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '4'");
                                  $total_sakitpermanen = 0;
								  while ($num = mysqli_fetch_array($data_sakitpermanen)) {
									$total_sakitpermanen += $num['jumlah'];}
                                  $data_tugt = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '7'");
                                  $total_tugt = 0;
								  while ($num = mysqli_fetch_array($data_tugt)) {
									$total_tugt += $num['jumlah'];}
                                  ?>
                              <tr>
								<td><?php echo $nomor; $nomor++ ?></td>
                                <td><?php echo $data_jumlahsdm['nama_cabang']?></td>
								<td><?php echo $data_jumlahsdm['tahun']?></td>
                                <td><?php $total1+=$total_kepalagerbangtol;
									echo $total_kepalagerbangtol?></td>
								<td><?php $total2+=$total_kspt;
									echo $total_kspt?></td>
								<td><?php $total3+=$total_kryjasamarga;
									echo $total_kryjasamarga?></td>
								<td><?php $total4+=$total_kryjlj;
									echo $total_kryjlj?></td>
								<td><?php $total5+=$total_kryjlo;
									echo $total_kryjlo?></td>
								<td><?php $total6+=$total_sakitpermanen;
									echo $total_sakitpermanen?></td>
								<td><?php echo $total+=($total_kryjasamarga+$total_kryjlj+ $total_kryjlo+$total_sakitpermanen);
									$total7+=$total;?></td>
								<td><?php $total8+=$total_tugt;
									echo $total_tugt?></td>
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
								<td><?php echo $total8?></td>
                             </tr>
                            </tbody>
                          </table>

            

<div align="right">
 <p>Jakarta, </p>
 <br>
 
 <p><u>.........</u><br>
 NPP. </p>
<div>



 