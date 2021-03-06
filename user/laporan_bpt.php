<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

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

  $resultuntukrencana = $connect-> query("SELECT * FROM program_kerja WHERE id_cabang = '$idcabang' ");
  $resultuntukrealisasi = $connect-> query("SELECT * FROM program_kerja WHERE id_cabang = '$idcabang' ");

?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include 'templates/head.php' ?>
<!--/head-->


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><i class="fa fa-group"></i> <span>Dashboard DOM</span></a>
            </div>

            <div class="clearfix"></div>

           <!-- menu profile quick info -->
           <?php include'templates/headmenu.php' ?>
            <!-- /menu profile quick info -->


            <br />

             <!-- sidebar menu -->
            <?php include 'templates/sidebarmenu.php' ?>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

          <!-- top navigation -->
        <?php include 'topnavigation.php' ?>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Laporan Beban BPT Cabang <?php echo $namacabang; ?> </h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table" value="<?php echo $idcabang; ?>" hidden></i> Table <small></small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <form action="dropdownproses.php" method="POST">
                  <div class='col-sm-2'>
                    <div class="form-group">
                    <h5 class="control-label col-md-4 col-sm-3 col-xs-12" for="tahun">Tahun</h5>
                        <div class='input-group date ' id='myDatepickerFilter'>

                            <input type='text' class="form-control" name= "tahun" <?php if(isset($_GET['tahun'])){ ?> value="<?php echo $nilaiTahun ;?>" <?php } ?>/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>

                    </div>
                  </div>


                  <div class="title_right">
                    <div class="col-md-12 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonleft" >
                      <div class="btn-group  buttonleftfloat " >
	                    <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Triwulan</h5>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <select name= "dropDownListTW" class="select2_single form-control" tabindex="-1">
                                    <option value="0">Pilih Triwulan</option>
                                    <option value="1" <?php if ($nilaiTriwulan =='1') echo 'selected'?>>Triwulan 1</option>
                                    <option value="2" <?php if ($nilaiTriwulan == '2') echo 'selected'?>>Triwulan 2</option>
                                    <option value="3" <?php if ($nilaiTriwulan == '3') echo 'selected'?>>Triwulan 3</option>
                                    <option value="4" <?php if ($nilaiTriwulan == '4') echo 'selected'?>>Triwulan 4</option>
                            </select>

                            <button type="submit" class="btn btn-primary" name="dropdownTW">Lihat</button>
                          </form>
                        </div>
	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>

                   <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat text-center" >
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Unduh <span class="caret"></span>
                      </button>
                      <ul role="menu" class="dropdown-menu pull-right">
                       <li><a href="downloadlaporanbpt.php?triwulan=<?php echo $nilaiTriwulan;?>&tahun=<?php echo $nilaiTahun;?>" > Unduh Excels <img src='xls.png' alt="XLSX" style="width:20px"></a>
                       </li>

                      </ul>
                      </div>

                      </div>
                    </div>
                   </div>


                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered text-center">
                        <thead>
                          <tr>
                            <th rowspan="2">No. Item</th>
                            <th rowspan="2">MA</th>
                            <th rowspan="2">Program Kerja</th>
                            <th rowspan="2">Sub Program Kerja</th>
                            <th rowspan="2">Total RKAP  <?php if(isset($_GET['tahun'])){
                               echo $nilaiTahun; } ?>


                           </th>
                            <th rowspan="2">Total Status Akhir s.d TW
                                <?php if($nilaiTriwulan > 0 ){echo $nilaiTriwulan;}else {?> 4 <?php }?></th>
                            <th rowspan="2">TOTAL Realisasi s.d TW <?php if($nilaiTriwulan > 0 ){echo $nilaiTriwulan;}
                              else {?> 4 <?php }?></th>
                            <th rowspan="2">Tahun </th>
                              <?php if($nilaiTriwulan > 0 ){
                                for($hitungTW = 1; $hitungTW<= $nilaiTriwulan;$hitungTW++){

                              ?>
                            <th colspan="4">TW <?php echo $hitungTW;?></th>

                              <?php }}else{ ?>
                            <th colspan="4">TW 1</th>
                            <th colspan="4">TW 2</th>
                            <th colspan="4">TW 3</th>
                            <th colspan="4">TW 4</th>
                            <?php } ?>

                          </tr>
                          <tr>
                             <?php if($nilaiTriwulan > 0 ){
                                for($hitungTW = 1; $hitungTW<= $nilaiTriwulan; $hitungTW++){

                              ?>
                                <th>RKAP</th>
                                <th>Revisi RKAP</th>
                                <th>Status Akhir</th>
                                <th>Realisasi</th>

                              <?php }
                                }else{
                              ?>

                                <th>RKAP</th>
                                <th>Revisi RKAP</th>
                                <th>Status Akhir</th>
                                <th>Realisasi</th>
                                <th>RKAP</th>
                                <th>Revisi RKAP</th>
                                <th>Status Akhir</th>
                                <th>Realisasi</th>
                                <th>RKAP</th>
                                <th>Revisi RKAP</th>
                                <th>Status Akhir</th>
                                <th>Realisasi</th>
                                <th>RKAP</th>
                                <th>Revisi RKAP</th>
                                <th>Status Akhir</th>
                                <th>Realisasi</th>


                              <?php } ?>


                          </tr>

                        </thead>
                            <tbody>
                            <?php
                            if($nilaiTahun >0 ){
                              $listTW = mysqli_query($connect, "SELECT * FROM beban_realisasi, sub_program WHERE sub_program.id_sp = beban_realisasi.id_sp AND stat_twrl ='1'  AND sub_program.id_cabang = '$idcabang' AND beban_realisasi.jenis ='bpt' AND sub_program.jenis='beban' AND beban_realisasi.tahun = '$nilaiTahun' ");
                            }else {
                               $listTW = mysqli_query($connect, "SELECT * FROM beban_realisasi, sub_program WHERE sub_program.id_sp = beban_realisasi.id_sp AND stat_twrl ='1'  AND sub_program.id_cabang = '$idcabang' AND beban_realisasi.jenis ='bpt' AND sub_program.jenis='beban'");
                            }

							while($datalistTW = mysqli_fetch_array($listTW)){
  								$idpklist= $datalistTW['id_pk'];
  								$idspklist= $datalistTW['id_sp'];
  								$tahun= $datalistTW['tahun'];
  								$jmlstakhir = mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
  								$jmlrealisasi = mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");

  								$dataprogramkerja = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM program_kerja WHERE id_pk = '$idpklist'"));
  								$datasubprogramkerja= mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sub_program WHERE id_sp = '$idspklist'"));
                                  //realisasi
  								$datatwreal1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '1' AND jenis ='bpt'"));
  								$datatwreal2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '2' AND jenis ='bpt'"));
  								$datatwreal3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '3' AND jenis ='bpt'"));
  								$datatwreal4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '4' AND jenis ='bpt'"));
                                  //rkap
                  $datatwrc1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '1' AND jenis ='bpt'"));
  								$datatwrc2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '2' AND jenis ='bpt'"));
  								$datatwrc3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '3' AND jenis ='bpt'"));
  								$datatwrc4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '4' AND jenis ='bpt'"));

                  $totalrkap = 0;
                  if($nilaiTriwulan > 0){
                      if($nilaiTriwulan >= 1){
                          if($datatwrc1['revisi'] != 0){
                            $totalrkap += $datatwrc1['revisi'];
                          }else{
                            $totalrkap += $datatwrc1['rkap'];
                          }
                        if($nilaiTriwulan >= 2){
                          if($datatwrc2['revisi'] != 0){
                            $totalrkap += $datatwrc2['revisi'];
                          }else{
                            $totalrkap += $datatwrc2['rkap'];
                          }
                          if($nilaiTriwulan >= 3){
                            if($datatwrc3['revisi'] != 0){
                            $totalrkap += $datatwrc3['revisi'];
                            }else{
                            $totalrkap += $datatwrc3['rkap'];
                            }
                            if($nilaiTriwulan >= 4){
                                if($datatwrc4['revisi'] != 0){
                                $totalrkap += $datatwrc4['revisi'];
                                }else{
                                $totalrkap += $datatwrc4['rkap'];
                                }
                            }
                          }
                        }
                      }
                  }else{
                    if($datatwrc1['revisi'] != 0){
                          $totalrkap += $datatwrc1['revisi'];
                          }else{
                          $totalrkap += $datatwrc1['rkap'];
                          }
                    if($datatwrc2['revisi'] != 0){
                          $totalrkap += $datatwrc2['revisi'];
                          }else{
                          $totalrkap += $datatwrc2['rkap'];
                          }
                    if($datatwrc3['revisi'] != 0){
                          $totalrkap += $datatwrc3['revisi'];
                          }else{
                          $totalrkap += $datatwrc3['rkap'];
                          }
                    if($datatwrc4['revisi'] != 0){
                          $totalrkap += $datatwrc4['revisi'];
                          }else{
                          $totalrkap += $datatwrc4['rkap'];
                          }
                  }

                  $totalstatakhir = 0;
                  if($nilaiTriwulan > 0){
                      if($nilaiTriwulan >= 1){
                            if($datatwrc1['revisi'] > 0 ) {
                             $totalstatakhir += abs($datatwrc1['revisi'] - $datatwreal1['realisasi']);
                            }else{
                             $totalstatakhir += abs($datatwrc1['rkap'] - $datatwreal1['realisasi']) ;
                            }


                        if($nilaiTriwulan >= 2){
                              if($datatwrc2['revisi'] > 0 ) {
                                 $totalstatakhir += abs($datatwrc2['revisi'] - $datatwreal2['realisasi']);
                                }else{
                                 $totalstatakhir += abs($datatwrc2['rkap'] - $datatwreal2['realisasi']) ;
                                }
                              if($nilaiTriwulan >= 3){
                                       if($datatwrc3['revisi'] > 0 ) {
                                       $totalstatakhir += abs($datatwrc3['revisi'] - $datatwreal3['realisasi']);
                                       }else{
                                       $totalstatakhir += abs($datatwrc3['rkap'] - $datatwreal3['realisasi']) ;
                                       }
                                       if($nilaiTriwulan >= 4){
                                            if($datatwrc4['revisi'] > 0 ) {
                                            $totalstatakhir += abs($datatwrc4['revisi'] - $datatwreal4['realisasi']);
                                            }else{
                                            $totalstatakhir += abs($datatwrc4['rkap'] - $datatwreal4['realisasi']) ;
                                            }
                            }
                          }
                        }
                      }
                  }else{
                    if($datatwrc1['revisi'] > 0 ) {
                             $totalstatakhir += abs($datatwrc1['revisi'] - $datatwreal1['realisasi']);
                            }else{
                             $totalstatakhir += abs($datatwrc1['rkap'] - $datatwreal1['realisasi']) ;
                            }
                    if($datatwrc2['revisi'] > 0 ) {
                            $totalstatakhir += abs($datatwrc2['revisi'] - $datatwreal2['realisasi']);
                            }else{
                            $totalstatakhir += abs($datatwrc2['rkap'] - $datatwreal2['realisasi']) ;
                    }
                     if($datatwrc3['revisi'] > 0 ) {
                           $totalstatakhir += abs($datatwrc3['revisi'] - $datatwreal3['realisasi']);
                           }else{
                           $totalstatakhir += abs($datatwrc3['rkap'] - $datatwreal3['realisasi']) ;
                           }
                     if($datatwrc4['revisi'] > 0 ) {
                           $totalstatakhir += abs($datatwrc4['revisi'] - $datatwreal4['realisasi']);
                           }else{
                           $totalstatakhir += abs($datatwrc4['rkap'] - $datatwreal4['realisasi']) ;
                           }
                  }

                  $qty1 = 0;
                  $qty2 = 0;
                   $loop1 = 0;
                    $loop2 = 0;
                  if($nilaiTriwulan > 0){


                    while ($num = mysqli_fetch_array($jmlrealisasi)) {
                      if($loop2 < $nilaiTriwulan){
                            $qty2 += $num['realisasi'];
                            $loop2++;
                          }
                      }
                  }else {
                    while ($num = mysqli_fetch_array($jmlrealisasi)) {
                        $qty2 += $num['realisasi'];
                        $loop2++;
                    }
                  }
  							?>
                              <tr>
                                  <td><?php echo $dataprogramkerja['no_item'] ?></td>
                                  <td><?php echo $dataprogramkerja['MA'] ?></td>
                                  <td><?php echo $dataprogramkerja['nama_pk'] ?></td>
                                  <td><?php echo $datasubprogramkerja['nama_sp'] ?></td>
                                  <td><?php echo $totalrkap; ?></td>
                                  <td><?php echo $totalstatakhir;?></td>
                                  <td><?php echo $qty2;?></td>
                                  <td><?php echo $datalistTW['tahun'] ?></td>
                                  <?php if($nilaiTriwulan >= 1 ){ ?>

                                    <td><?php echo $datatwrc1['rkap'] ?></td>
                                    <td><?php if($datatwrc1['revisi'] > 0 ) {echo $datatwrc1['revisi'];} ?></td>
                                    <td><?php
                                        if($datatwrc1['revisi'] > 0 ) {
                                            echo abs($datatwrc1['revisi'] - $datatwreal1['realisasi']);
                                        }else{
                                            echo abs($datatwrc1['rkap'] - $datatwreal1['realisasi']) ;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $datatwreal1['realisasi'] ?></td>

                                  <?php
                                    if($nilaiTriwulan >= 2){ ?>
                                    <td><?php echo $datatwrc2['rkap'] ?></td>
                                    <td><?php if($datatwrc2['revisi'] > 0 ) {echo $datatwrc2['revisi'];} ?></td>
                                    <td><?php
                                        if($datatwrc2['revisi'] > 0 ) {
                                            echo abs($datatwrc2['revisi'] - $datatwreal2['realisasi']);
                                        }else{
                                            echo abs($datatwrc2['rkap'] - $datatwreal2['realisasi']) ;
                                        }
                                    ?></td>
                                    <td><?php echo $datatwreal2['realisasi'] ?></td>
                                  <?php }
                                    if($nilaiTriwulan >= 3){ ?>
                                    <td><?php echo $datatwrc3['rkap'] ?></td>
                                    <td><?php if($datatwrc3['revisi'] > 0 ) {echo $datatwrc3['revisi'];} ?></td>
                                    <td><?php
                                        if($datatwrc3['revisi'] > 0 ) {
                                            echo abs($datatwrc3['revisi'] - $datatwreal3['realisasi']);
                                        }else{
                                            echo abs($datatwrc3['rkap'] - $datatwreal3['realisasi']) ;
                                        }
                                    ?></td>
                                    <td><?php echo $datatwreal3['realisasi'] ?></td>
                                   <?php }
                                    if($nilaiTriwulan >= 4){ ?>
                                    <td><?php echo $datatwrc4['rkap'] ?></td>
                                    <td><?php if($datatwrc4['revisi'] > 0 ) {echo $datatwrc4['revisi'];} ?></td>
                                    <td><?php
                                        if($datatwrc4['revisi'] > 0 ) {
                                            echo abs($datatwrc4['revisi'] - $datatwreal4['realisasi']);
                                        }else{
                                            echo abs($datatwrc4['rkap'] - $datatwreal4['realisasi']) ;
                                        }
                                    ?> </td>
                                    <td><?php echo $datatwreal4['realisasi'] ?></td>
                                  <?php }
                                  }else {
                                  ?>
                                <td><?php echo $datatwrc1['rkap'] ?></td>
                                <td><?php if($datatwrc1['revisi'] > 0 ) {echo $datatwrc1['revisi'];} ?></td>
                                <td><?php
                                        if($datatwrc1['revisi'] > 0 ) {
                                            echo abs($datatwrc1['revisi'] - $datatwreal1['realisasi']);
                                        }else{
                                            echo abs($datatwrc1['rkap'] - $datatwreal1['realisasi']) ;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $datatwreal1['realisasi'] ?></td>

                                <td><?php echo $datatwrc2['rkap'] ?></td>
                                <td><?php if($datatwrc2['revisi'] > 0 ) {echo $datatwrc2['revisi'];} ?></td>
                                <td><?php
                                        if($datatwrc2['revisi'] > 0 ) {
                                            echo abs($datatwrc2['revisi'] - $datatwreal2['realisasi']);
                                        }else{
                                            echo abs($datatwrc2['rkap'] - $datatwreal2['realisasi']) ;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $datatwreal2['realisasi'] ?></td>

                                <td><?php echo $datatwrc3['rkap'] ?></td>
                                <td><?php if($datatwrc3['revisi'] > 0 ) {echo $datatwrc3['revisi'];} ?></td>
                                <td><?php
                                        if($datatwrc3['revisi'] > 0 ) {
                                            echo abs($datatwrc3['revisi'] - $datatwreal3['realisasi']);
                                        }else{
                                            echo abs($datatwrc3['rkap'] - $datatwreal3['realisasi']) ;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $datatwreal3['realisasi'] ?></td>

                                <td><?php echo $datatwrc4['rkap'] ?></td>
                                <td><?php if($datatwrc4['revisi'] > 0 ) { echo $datatwrc4['revisi'];} ?></td>
                                <td><?php
                                        if($datatwrc4['revisi'] > 0 ) {
                                            echo abs($datatwrc4['revisi'] - $datatwreal4['realisasi']);
                                        }else{
                                            echo abs($datatwrc4['rkap'] - $datatwreal4['realisasi']) ;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $datatwreal4['realisasi'] ?></td>

                              <?php }} ?>
                              </tr>
                            </tbody>
                          </table>


                  </div>
                </div>
              </div>



              <div class="clearfix"></div>



            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->

		<div class="x_content">


		</div>


        <!-- footer content -->
<?php include 'templates/footer.php' ?>
        <!-- /footer content -->
      </div>
    </div>
<!-- scripts -->
<?php include 'templates/scripts.php' ?>





<!-- /scripts -->
  </body>
</html>
