<?php 
include "connect.php";

if(isset($_GET['tahun'])){
    $nilaiTanggal = $_GET['tahun'];
  
  }else $nilaiTanggal = '0';
    
;
/*date_default_timezone_set('Asia/Jakarta');
$catch = date("Y-m-d H:i:s");
$date = date("j F Y H.i.s", strtotime($catch));*/ 

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msdownload");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data Status Laporan Bulanan Percabang ".$nilaiTanggal.".xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

  <?php if ($nilaiTanggal != '0') {
                        ?>
 <div align="center"> <p>Data Status Laporan Bulanan Percabang Tahun <?php echo $nilaiTanggal;?> </p></div>
                     <table border="1"  id ="tableLaporanBulanan" class="table table-striped table-bordered text-center">
                            <thead >
                            <tr bgcolor="#d6dce4">
                          
                                <th rowspan="2">No</th>
                                <th rowspan="2">Cabang</th>
                                <th colspan="12">Laporan Bulanan Tahun <?php echo $nilaiTanggal; ?> </th>
                               
                             </tr>
                             
                            <tr bgcolor="#d6dce4" >
                          
                                <th >Januari</th>
                                <th >Februari</th>
                                <th >Maret</th>
                                <th >April</th>
                                <th >Mei</th>
                                <th >Juni</th>
                                <th >Juli</th>
                                <th >Agustus</th>
                                <th >September</th>
                                <th >Oktober</th>
                                <th >November</th>
                                <th >Desember</th>
                             </tr>

                            </thead>
                            <tbody>
                              <?php
                                  $iterasinomor=1;
                                  $listCabang = mysqli_query($connect, "SELECT * FROM cabang");
                              
                                  while($ambilListCabang = mysqli_fetch_array($listCabang)) {   
                                    
                                       $nama_cabang = $ambilListCabang['nama_cabang'];
                                       $id_cabang = $ambilListCabang['id_cabang'];

                                       $ambilDataLaporanBulanan1= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='1'"));
                                       $ambilDataLaporanBulanan2= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='2'"));
                                       $ambilDataLaporanBulanan3= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='3'"));
                                       $ambilDataLaporanBulanan4= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='4'"));
                                       $ambilDataLaporanBulanan5= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='5'"));
                                       $ambilDataLaporanBulanan6= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='6'"));
                                       $ambilDataLaporanBulanan7= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='7'"));
                                       $ambilDataLaporanBulanan8= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='8'"));
                                       $ambilDataLaporanBulanan9= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='9'"));
                                       $ambilDataLaporanBulanan10= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='10'"));
                                       $ambilDataLaporanBulanan11= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='11'"));
                                       $ambilDataLaporanBulanan12= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='12'"));
                              
                              ?>

                              <tr>
                              <td><?php echo $iterasinomor++;?> </td>
                              <td><?php echo $nama_cabang;?> </td>

                              <?php 
                              if($ambilDataLaporanBulanan1){
                                 if($ambilDataLaporanBulanan1['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan2){
                                 if($ambilDataLaporanBulanan2['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan3){
                                 if($ambilDataLaporanBulanan3['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan4){
                                 if($ambilDataLaporanBulanan4['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan5){
                                 if($ambilDataLaporanBulanan5['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan6){
                                 if($ambilDataLaporanBulanan6['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              

                              <?php 
                              if($ambilDataLaporanBulanan7){
                                 if($ambilDataLaporanBulanan7['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan8){
                                 if($ambilDataLaporanBulanan8['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan9){
                                 if($ambilDataLaporanBulanan9['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php 
                              if($ambilDataLaporanBulanan10){
                                 if($ambilDataLaporanBulanan10['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>
                             <?php 
                              if($ambilDataLaporanBulanan11){
                                 if($ambilDataLaporanBulanan11['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                             <?php 
                              if($ambilDataLaporanBulanan12){
                                 if($ambilDataLaporanBulanan12['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>
                              </tr>
                              
                              <?php }
                              ?>
                            </tbody>
                          </table>

                    

            <?php } ?>

<div align="right">
 <p>Jakarta, </p>
 <br>
 
 <p><u>.........</u><br>
 NPP. </p>
<div>



 