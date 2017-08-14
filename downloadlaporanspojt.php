<?php 
include "connect.php";
include('akses.php'); //untuk memastikan dia sudah login

if(isset($_GET['tahun'])){
    $nilaiTahun = $_GET['tahun'];
  
  }else $nilaiTahun = '0';
    
if(isset($_GET['triwulan'])){
    $nilaiTriwulan = $_GET['triwulan'];
  
  }else $nilaiTriwulan = '0';
  
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
header("Content-Disposition: attachment; filename=Data Laporan Capex SPOJT ".$nilaiTahun." Cabang ".$namacabang.".xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

 <div align="center"> <p>Data Laporan Beban SPOJT Tahun <?php if($nilaiTahun >0 ) { echo $nilaiTahun;} ?> <?php if($nilaiTriwulan == 0){?> Semua Triwulan <?php  }else ?> Triwulan <?php {echo $nilaiTriwulan;} ?> </p></div>

              <table border="1" id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                        <thead>
                          <tr bgcolor="#ddebf7">
                            <th rowspan="2">Program Kerja</th>
                            <th rowspan="2">Sub Program Kerja</th>
                            <th rowspan="2">Total RKAP <?php if(isset($_GET['tahun'])){
                               echo $nilaiTahun; } ?>
                            </th>
                            <th rowspan="2">Total Status Akhir s.d TW 
                                <?php if($nilaiTriwulan > 0 ){echo $nilaiTriwulan;}else {?> 4 <?php }?></th>
                            <th rowspan="2">TOTAL Realisasi s.d TW <?php if($nilaiTriwulan > 0 ){echo $nilaiTriwulan;}else {?> 4 <?php }?></th>
                            <th rowspan="2">Tahun </th>
                            <?php if($nilaiTriwulan > 0 ){
                                for($hitungTW = 1; $hitungTW<= $nilaiTriwulan;$hitungTW++){
                                  
                              ?>
                               <th colspan="3">TW <?php echo $hitungTW;?></th>
                                
                              <?php }}else{ ?>
                            <th colspan="3">TW 1</th>
                            <th colspan="3">TW 2</th>
                            <th colspan="3">TW 3</th>
                            <th colspan="3">TW 4</th>
                            <?php } ?>
                            
                          </tr>
                          <tr bgcolor="#ddebf7">
                             <?php if($nilaiTriwulan > 0 ){
                                for($hitungTW = 1; $hitungTW<= $nilaiTriwulan; $hitungTW++){
                                  
                              ?>
                                <th>RKAP</th>
                                <th >Status Akhir</th>
                                <th >Realisasi</th>
                                
                              <?php }
                                }else{
                              ?>
                              
                                <th>RKAP</th>
                                <th >Status Akhir</th>
                                <th >Realisasi</th>
                                <th>RKAP</th>
                                <th >Status Akhir</th>
                                <th >Realisasi</th>
                                <th>RKAP</th>
                                <th >Status Akhir</th>
                                <th >Realisasi</th>
                                <th>RKAP</th>
                                <th >Status Akhir</th>
                                <th >Realisasi</th>

                              
                              <?php } ?> 
                            
                            
                          </tr>
                          
                        </thead>
                            <tbody>
                            <?php
                            if($nilaiTahun >0 ){
                              $listTW = mysqli_query($connect, "SELECT * FROM capex_realisasi, sub_program WHERE sub_program.id_sp = capex_realisasi.id_sp AND stat_twrl ='1'  AND sub_program.id_cabang = '$idcabang' AND capex_realisasi.jenis ='spojt' AND sub_program.jenis='capex' AND tahun = '$nilaiTahun' ");
                            }else {
                               $listTW = mysqli_query($connect, "SELECT * FROM capex_realisasi, sub_program WHERE sub_program.id_sp = capex_realisasi.id_sp AND stat_twrl ='1'  AND sub_program.id_cabang = '$idcabang' AND capex_realisasi.jenis ='spojt' AND sub_program.jenis='capex' ");
                            }
              
              while($datalistTW = mysqli_fetch_array($listTW)){
                $idpklist= $datalistTW['id_pk'];
                $idspklist= $datalistTW['id_sp'];
                $tahun= $datalistTW['tahun'];
                $jmlstakhir = mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
                $jmlrealisasi = mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
                $qty1 = 0; 
                  $qty2 = 0;

                  if($nilaiTriwulan > 0){
                    $loop1 = 0;
                    $loop2 =0;

                    while ($num = mysqli_fetch_array($jmlstakhir)) {
                       if($loop1 < $nilaiTriwulan){
                        $qty1 += $num['stat_akhir'];
                        $loop1++;
                       }
                    }
                    while ($num = mysqli_fetch_array($jmlrealisasi)) {
                      if($loop2 < $nilaiTriwulan){
                        $qty2 += $num['realisasi'];}
                        $loop2++;
                       }
                       
                  }else {

                    while ($num = mysqli_fetch_array($jmlstakhir)) {                       
                        $qty1 += $num['stat_akhir'];                       
                    }
                    while ($num = mysqli_fetch_array($jmlrealisasi)) {                      
                        $qty2 += $num['realisasi'];                       
                    }
                  }

                  if($nilaiTriwulan > 0){
                    $loop1 = 0;
                    $loop2 =0;

                    while ($num = mysqli_fetch_array($jmlstakhir)) {
                       if($loop1 < $nilaiTriwulan){
                        $qty1 += $num['stat_akhir'];
                        $loop1++;
                       }
                    }
                    while ($num = mysqli_fetch_array($jmlrealisasi)) {
                      if($loop2 < $nilaiTriwulan){
                        $qty2 += $num['realisasi'];}
                        $loop2++;
                       }
                       
                  }else {

                    while ($num = mysqli_fetch_array($jmlstakhir)) {                       
                        $qty1 += $num['stat_akhir'];                       
                    }
                    while ($num = mysqli_fetch_array($jmlrealisasi)) {                      
                        $qty2 += $num['realisasi'];                       
                    }
                  }
                $dataprogramkerja = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM program_kerja WHERE id_pk = '$idpklist'"));
                $datasubprogramkerja= mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sub_program WHERE id_sp = '$idspklist'"));
                                //realisasi
                $datatwreal1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '1' AND jenis ='spojt'"));
                $datatwreal2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '2' AND jenis ='spojt'"));
                $datatwreal3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '3' AND jenis ='spojt'"));
                $datatwreal4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '4' AND jenis ='spojt'"));
                                //rkap
                $datatwrc1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '1' AND jenis ='spojt'"));
                $datatwrc2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '2' AND jenis ='spojt'"));
                $datatwrc3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '3' AND jenis ='spojt'"));
                $datatwrc4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '4' AND jenis ='spojt'"));
                $totalrkap = 0;
                  if($nilaiTriwulan > 0){
                      if($nilaiTriwulan >= 1){
                        $totalrkap += $datatwrc1['rkap'];
                        if($nilaiTriwulan >= 2){
                          $totalrkap += $datatwrc2['rkap'];
                          if($nilaiTriwulan >= 3){
                            $totalrkap += $datatwrc3['rkap'];
                            if($nilaiTriwulan >= 4){
                              $totalrkap += $datatwrc4['rkap'];
                            }
                          }
                        }
                      }
                  }else{
                    $totalrkap = $datatwrc1['rkap']+ $datatwrc2['rkap'] + $totalrkap += $datatwrc3['rkap'] + $datatwrc4['rkap'];
                  }
              ?>
                              <tr>
                                <td><?php echo $dataprogramkerja['nama_pk'] ?></td>
                                <td><?php echo $datasubprogramkerja['nama_sp'] ?></td>
                                <td><?php echo $totalrkap; ?> </td>
                                <td><?php echo $qty1;?></td>
                                <td><?php echo $qty2;?></td>
                                <td><?php echo $datalistTW['tahun'] ?></td>
                                <?php if($nilaiTriwulan >= 1 ){ ?>
                                 
                                    <td><?php echo $datatwrc1['rkap'] ?></td>
                                    <td><?php echo $datatwreal1['stat_akhir'] ?></td>
                                    <td><?php echo $datatwreal1['realisasi'] ?></td>

                                <?php 
                                    if($nilaiTriwulan >= 2){ ?>
                                    <td><?php echo $datatwrc2['rkap'] ?></td>
                                    <td><?php echo $datatwreal2['stat_akhir'] ?></td>
                                    <td><?php echo $datatwreal2['realisasi'] ?></td>
                                <?php }
                                    if($nilaiTriwulan >= 3){ ?>
                                    <td><?php echo $datatwrc3['rkap'] ?></td>
                                    <td><?php echo $datatwreal3['stat_akhir'] ?></td>
                                    <td><?php echo $datatwreal3['realisasi'] ?></td>    
                                 <?php } 
                                    if($nilaiTriwulan >= 4){ ?>
                                    <td><?php echo $datatwrc4['rkap'] ?></td>
                                    <td><?php echo $datatwreal4['stat_akhir'] ?></td>
                                    <td><?php echo $datatwreal4['realisasi'] ?></td>
                                <?php }}else {
                                  ?>
                                <td><?php echo $datatwrc1['rkap'] ?></td>
                                <td><?php echo $datatwreal1['stat_akhir'] ?></td>
                                <td><?php echo $datatwreal1['realisasi'] ?></td>                                  
                                <td><?php echo $datatwrc2['rkap'] ?></td>
                                <td><?php echo $datatwreal2['stat_akhir'] ?></td>
                                <td><?php echo $datatwreal2['realisasi'] ?></td>
                                <td><?php echo $datatwrc3['rkap'] ?></td>
                                <td><?php echo $datatwreal3['stat_akhir'] ?></td>
                                <td><?php echo $datatwreal3['realisasi'] ?></td>
                                <td><?php echo $datatwrc4['rkap'] ?></td>
                                <td><?php echo $datatwreal4['stat_akhir'] ?></td>
                                <td><?php echo $datatwreal4['realisasi'] ?></td>
                              
                              <?php }} ?>
                              </tr>
                            </tbody>
                          </table>

            

<div align="right">
 <p>Jakarta, </p>
 <br>
 
 <p><u>.........</u><br>
 NPP. </p>
<div>



 