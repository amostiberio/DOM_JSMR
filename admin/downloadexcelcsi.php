<?php 
include "connect.php";

if(isset($_GET['tahun'])){
    $nilaiTahun = $_GET['tahun'];
  
  }else $nilaiTahun = '0';
    
;
/*date_default_timezone_set('Asia/Jakarta');
$catch = date("Y-m-d H:i:s");
$date = date("j F Y H.i.s", strtotime($catch));*/ 

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msdownload");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data Customer Satisfication Index ".$nilaiTahun.".xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

  <?php if ($nilaiTahun != '0') {
                        ?>
 <div align="center"> <p>Data Customer Satisfication Index <?php echo $nilaiTahun;?> </p></div>

                      <table border="1" >
                            <thead  >
                            <strong>
                              <tr bgcolor="#d6dce4" >
                                <th rowspan="4">No</th>
                                <th rowspan="4">Cabang</th>
                                                              
                                <th colspan="4">Tahun <?php echo $nilaiTahun; ?> </th>
                            


                              </tr>
                              <tr bgcolor="#d6dce4">
                                <th colspan="2">Rencana</th>
                                <th colspan="2">Realisasi</th>
                              </tr>
                              <tr bgcolor="#d6dce4">
                                <!-- Rencana -->
                                <th rowspan="1">Semester 1</th>
                                <th rowspan="1">Semester 2</th>
                                <!-- Realisasi -->
                                <th rowspan="1">Semester 1</th>
                                <th rowspan="1">Semester 2</th>
                                
                              </tr>
                              <tr bgcolor="#d6dce4">

                                <th>1</th>
                                <th>2</th>
                                <th>1</th>
                                <th>2</th>
                                
                              </tr>
                              </strong>
                            </thead>
                            <tbody>
                              <?php
                                  $listCabang = mysqli_query($connect, "SELECT * FROM cabang");
                                  $noIterasi = 1;
                                  $iterasiRencanaSms1 = 0;
                                  $iterasiRencanaSms2= 0;
                                  $iterasiRealisasiSms1 = 0;
                                  $iterasiRealisasiSms2 = 0;
                                  $totalAVGRencanaSms1 = 0;
                                  $totalAVGRencanaSms2 = 0;
                                  $totalAVGRealisasiSms1 = 0;
                                  $totalAVGRealisasiSms2= 0;
                                  while($ambilListCabang = mysqli_fetch_array($listCabang)) {
                                    
                                       $ambilIDCabang = $ambilListCabang['id_cabang'];

                                       $selectRencanaSms11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='1' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));
                                       $selectRencanaSms12 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='2' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));

                                        
                                       $selectRencanaSms21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='1'  AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));
                                       $selectRencanaSms22 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='2' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));


                                       $selectRealisasiSms11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='1'  AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));
                                       $selectRealisasiSms12 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='2' AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));
                                     

                                       $selectRealisasiSms21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='1'  AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));
                                       $selectRealisasiSms22 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='2' AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));

                                     
                                     
                              ?><!-- Pembacaan Sms12 = semester 1 triwulan 2 -->
                              <tr>
                                <td><?php echo $noIterasi++; ?> </td>
                                <td><?php echo $ambilListCabang['nama_cabang'];?> </td>
                                <td>
                                <?php $totalRencanaSms1=$selectRencanaSms11['nilai_csi']+$selectRencanaSms12['nilai_csi'];

                                    if($totalRencanaSms1 != 0 ){
                                      echo $totalRencanaSms1;
                                      $iterasiRencanaSms1++;
                                      $totalAVGRencanaSms1+= $totalRencanaSms1;
                                    }
                                ?>
                                </td>
                                <td>
                                <?php $totalRencanaSms2 = $selectRencanaSms21['nilai_csi']+$selectRencanaSms22['nilai_csi'];

                                if($totalRencanaSms2 != 0 ){
                                      echo $totalRencanaSms2;
                                      $iterasiRencanaSms2++;
                                      $totalAVGRencanaSms2+=$totalRencanaSms2;
                                    }

                                ?>                                  
                                </td>
                                <td>
                                <?php $totalRealisasiSms1 = $selectRealisasiSms11['nilai_csi']+$selectRealisasiSms12['nilai_csi'];


                                if($totalRealisasiSms1 != 0){
                                  echo $totalRealisasiSms1;
                                  $iterasiRealisasiSms1++;
                                  $totalAVGRealisasiSms1+=$totalRealisasiSms1;
                                }

                                ?>
                                  
                                </td>
                                <td>
                                <?php $totalRealisasiSms2 = $selectRealisasiSms21['nilai_csi']+$selectRealisasiSms22['nilai_csi'];


                                if($totalRealisasiSms2 != 0){
                                  echo $totalRealisasiSms2;
                                   $iterasiRealisasiSms2++;
                                   $totalAVGRealisasiSms2 += $totalRealisasiSms2;
                                }

                                ?>
                                  
                                </td>
                                
                              </tr>
                              
                              <?php }
                              ?>
                              <tr bgcolor="#d6dce4"> 
                              <td colspan="2">Rata Rata </td>
                              <td><?php echo $totalAVGRencanaSms1/= $iterasiRencanaSms1;?></td>
                              <td><?php echo $totalAVGRencanaSms2/= $iterasiRencanaSms2;?></td>
                              <td><?php echo $totalAVGRealisasiSms1/= $iterasiRealisasiSms1;?></td>
                              <td><?php echo $totalAVGRealisasiSms2/= $iterasiRealisasiSms2;?></td>
                              
                              </tr>
                             
                            </tbody>
                          </table>

            <?php } ?>

<div align="right">
 <p>Jakarta, </p>
 <br>
 
 <p><u>.........</u><br>
 NPP. </p>
<div>



 