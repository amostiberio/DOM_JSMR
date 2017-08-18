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
	header("Content-Disposition: attachment; filename=Laporan Jumlah SDM Cabang ".$namacabang." Tahun ".$nilaiTahun.".xls");}
else{
	header("Content-Disposition: attachment; filename=Laporan Jumlah SDM Cabang ".$namacabang.".xls");}
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

 <div align="center"> <p>Jumlah SDM Cabang <?php echo $namacabang?> </p></div>

                       <table border="1" id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                              <tr >
                                <th rowspan="2">No</th>
                                <th rowspan="2">Gerbang</th>
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
                                $jumlah_sdm = mysqli_query($connect, "SELECT * FROM pengumpul_tol join jenis_karyawan join gerbang on gerbang.id_gerbang=pengumpul_tol.id_gerbang WHERE pengumpul_tol.tahun='$nilaiTahun' AND pengumpul_tol.id_cabang = '$idcabang' group by pengumpul_tol.tahun, pengumpul_tol.id_gerbang");
							  }else{
                                $jumlah_sdm = mysqli_query($connect, "SELECT * FROM pengumpul_tol join jenis_karyawan join gerbang on gerbang.id_gerbang=pengumpul_tol.id_gerbang WHERE pengumpul_tol.id_cabang = '$idcabang' group by pengumpul_tol.tahun, pengumpul_tol.id_gerbang");								
							  }                                $nomor = 1; $total1 =0; $total2 =0; $total3 =0; $total4 =0; $total5 =0; $total6 =0; $total7 =0; $total8=0;
                                while($data_jumlahsdm = mysqli_fetch_array($jumlah_sdm)){
                                  $idgerbanglist = $data_jumlahsdm['id_gerbang'];
                                  $total = 0;
                                  $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));
                                  $data_kepalagerbangtol = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '5'"));
                                  $data_kspt = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '6'"));
                                  $data_kryjasamarga = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '1'"));
                                  $data_kryjlj = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '2'"));
                                  $data_kryjlo= mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '3'"));
                                  $data_sakitpermanen = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '4'"));
                                  $data_tugt = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pengumpul_tol, jenis_karyawan WHERE pengumpul_tol.id_gerbang = '$idgerbanglist' AND pengumpul_tol.id_karyawan = '7'"));
                                  ?>
                              <tr>
								<td><?php echo $nomor; $nomor++ ?></td>
                                <td><?php echo $data_gerbang['nama_gerbang']?></td>
								<td><?php echo $data_jumlahsdm['tahun']?></td>
                                <td><?php $total1+=$data_kepalagerbangtol['jumlah'];
									echo $data_kepalagerbangtol['jumlah']?></td>
								<td><?php $total2+=$data_kspt['jumlah'];
									echo $data_kspt['jumlah']?></td>
								<td><?php $total3+=$data_kryjasamarga['jumlah'];
									echo $data_kryjasamarga['jumlah']?></td>
								<td><?php $total4+=$data_kryjlj['jumlah'];
									echo $data_kryjlj['jumlah']?></td>
								<td><?php $total5+=$data_kryjlo['jumlah'];
									echo $data_kryjlo['jumlah']?></td>
								<td><?php $total6+=$data_sakitpermanen['jumlah'];
									echo $data_sakitpermanen['jumlah']?></td>
								<td><?php echo $total+=($data_kryjasamarga['jumlah']+$data_kryjlj['jumlah']+ $data_kryjlo['jumlah']+$data_sakitpermanen['jumlah']);
									$total7+=$total;?></td>
								<td><?php $total8+=$data_tugt['jumlah'];
									echo $data_tugt['jumlah']?></td>
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



 