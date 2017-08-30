<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

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
                <h3>Data Customer Satisfication Index</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Customer Satisfication Index</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <form action="dropdownproses.php" method="POST">
                  <div class='col-sm-2'>
                    <div class="form-group">
                        <div class='input-group date' id='myDatepickerFilter'>
                            <input type='text' class="form-control" name= "tahun" <?php if(isset($_GET['tahun'])){ ?> value="<?php echo $nilaiTahun ;?>" <?php } ?>/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="dropdownTahunCSI">Lihat</button>
                  </form>


                   <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                        <div class="btn-group  buttonrightfloat " >
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilihan <span class="caret"></span>
                        </button>
                        <ul role="menu" class="dropdown-menu pull-right">
                          <li><a data-toggle="modal" data-target=".bs-tambahrencanacsi" >Tambah Rencana CSI</a>
                          </li>
                          <li><a data-toggle="modal" data-target=".bs-tambahrealisasicsi" >Tambah Realisasi CSI</a>
                          </li>
                          <li><a href="downloadexcelcsi.php?tahun=<?php echo $nilaiTahun;?>"" > Unduh Excels <img src='xls.png' alt="XLSX" style="width:20px"></a>
                          </li>
                        </ul>
                       </div>
                      </div>
                    </div>
                   </div>

                  <div class="x_content">
                      <?php if ($nilaiTahun != '0') {
                        ?>
                      <table border="1"  id ="tableCSI" class="table table-striped table-bordered text-center">
                            <thead >
                              <tr >
                                <th rowspan="4">No</th>
                                <th rowspan="4">Cabang</th>

                                <th colspan="4">Tahun <?php echo $nilaiTahun; ?> </th>
                                <th rowspan="4">Aksi</th>


                              </tr>
                              <tr>
                                <th colspan="2">Rencana</th>
								                <th colspan="2">Realisasi</th>
                              </tr>
                              <tr>
                                <!-- Rencana -->
                                <th rowspan="1">Semester 1</th>
                                <th rowspan="1">Semester 2</th>
                                <!-- Realisasi -->
                                <th rowspan="1">Semester 1</th>
                                <th rowspan="1">Semester 2</th>

                              </tr>
                              <tr>

                                <th>(1)</th>
								                <th>(2)</th>
                                <th>(1)</th>
								                <th>(2)</th>

                              </tr>

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

                  									   $cobaRencanaSms11 = mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='1' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'");
                                       $selectRencanaSms11 = mysqli_fetch_array($cobaRencanaSms11);

                  									   $selectRencanaSms12 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='2' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));


                                       $selectRencanaSms21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='1'  AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));
                                       $selectRencanaSms22 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='2' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));


                                       $selectRealisasiSms11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='1'  AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));
                                       $selectRealisasiSms12 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND stat_twrl ='2' AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));


                                       $selectRealisasiSms21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='1'  AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));
                                       $selectRealisasiSms22 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND stat_twrl ='2' AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));



                              if($selectRencanaSms11 OR $selectRencanaSms12 OR $selectRencanaSms21 OR $selectRencanaSms22 OR  $selectRealisasiSms11 OR $selectRealisasiSms12 OR  $selectRealisasiSms21 OR  $selectRealisasiSms22){
                              ?><!-- Pembacaan Sms12 = semester 1 triwulan 2 -->

                              <tr>
                                <td><?php echo $noIterasi++; ?> </td>
                                <td><?php echo $ambilListCabang['nama_cabang'];?> </td>

                                <td>
                                <?php $totalRencanaSms1=$selectRencanaSms11['nilai_csi']+$selectRencanaSms12['nilai_csi'];

                                    if($totalRencanaSms1 != 0 ){
                                      echo $totalRencanaSms1;
                                      $iterasiRencanaSms1++;
                                    }
                                ?>
                                </td>
                                <td>
                                <?php $totalRencanaSms2 = $selectRencanaSms21['nilai_csi']+$selectRencanaSms22['nilai_csi'];

                                if($totalRencanaSms2 != 0 ){
                                      echo $totalRencanaSms2;
                                      $iterasiRencanaSms2++;
                                    }

                                ?>
                                </td>
                                <td>
                                <?php $totalRealisasiSms1 = $selectRealisasiSms11['nilai_csi']+$selectRealisasiSms12['nilai_csi'];


                                if($totalRealisasiSms1 != 0){
                                  echo $totalRealisasiSms1;
                                  $iterasiRealisasiSms1++;
                                }

                                ?>

                                </td>
                                <td>
                                <?php $totalRealisasiSms2 = $selectRealisasiSms21['nilai_csi']+$selectRealisasiSms22['nilai_csi'];


                                if($totalRealisasiSms2 != 0){
                                  echo $totalRealisasiSms2;
                                   $iterasiRealisasiSms2++;
                                }

                                ?>

                                </td>

                                <td>
                                <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-csi"
                                 data-id-rencanasms11="<?php echo $selectRencanaSms11['id_csi'] ?>"
                                 data-id-rencanasms12="<?php echo $selectRencanaSms12['id_csi'] ?>"
                                 data-id-rencanasms21="<?php echo $selectRencanaSms21['id_csi'] ?>"
                                 data-id-rencanasms22="<?php echo $selectRencanaSms22['id_csi'] ?>"
                                 data-id-realisasisms11="<?php echo $selectRealisasiSms11['id_csi'] ?>"
                                 data-id-realisasisms12="<?php echo $selectRealisasiSms12['id_csi'] ?>"
                                 data-id-realisasisms21="<?php echo $selectRealisasiSms21['id_csi'] ?>"
                                 data-id-realisasisms22="<?php echo $selectRealisasiSms22['id_csi'] ?>"


                                 data-nilai-rencanasms11="<?php echo $selectRencanaSms11['nilai_csi']?>"
                                 data-nilai-rencanasms12="<?php echo $selectRencanaSms12['nilai_csi']?>"
                                 data-nilai-rencanasms21="<?php echo $selectRencanaSms21['nilai_csi']?>"
                                 data-nilai-rencanasms22="<?php echo $selectRencanaSms22['nilai_csi']?>"

                                 data-nilai-realisasisms11="<?php echo $selectRealisasiSms11['nilai_csi']?>"
                                 data-nilai-realisasisms12="<?php echo $selectRealisasiSms12['nilai_csi']?>"
                                 data-nilai-realisasisms21="<?php echo $selectRealisasiSms21['nilai_csi']?>"
                                 data-nilai-realisasisms22="<?php echo $selectRealisasiSms22['nilai_csi']?>"
                               >
                                  Ubah
                               </button>



                                </td>
                              </tr>

                              <?php }}
                              ?>
                            </tbody>
                          </table>

            <?php }else {
                      ?> <h2 class="text-center"> Silahkan Pilih Tahun Terlebih Dahulu Untuk Melihat Table </h2>

                    <?php }?>
                  </div>


                </div>
              </div>



              <div class="clearfix"></div>


<!-- Modal Tambah Data CSI RENCANA-->
<div class="modal fade bs-tambahrencanacsi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Tambah Data Nilai Rencana CSI</h4>
          </div>
          <div class="modal-body">
              <form action="process_csi.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <!-- Dropdown list Gerbang -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Cabang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name= "idcabang" class="select2_single form-control" tabindex="-1" required="required">
                      <option value="">Pilih Cabang</option>
                      <?php
                          $dataCabang= mysqli_query($connect, "SELECT * FROM cabang");

                          while($ambilCabang = mysqli_fetch_array($dataCabang)){
                      ?>
                      <option  value="<?php echo $ambilCabang['id_cabang'];?>"><?php echo $ambilCabang['nama_cabang'];?></option>

                      <?php
                          }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- End of Dropdown list Gerbang -->

                <!-- Dropdown list Tahun -->
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepickerFormRencanaCSI'>
                            <input type='text' class="form-control" name= "tahun" placeholder="Pilih Tahun"  />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                  </div>

                  <!-- Dropdown list Tahun -->

                <!-- Dropdown list Semester -->
                 <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name ="idsemester" class="select2_single form-control" tabindex="-1" required="required">
                       <option value="">Pilih Semester</option>
                       <?php
                          $semester= mysqli_query($connect, "SELECT * FROM semester ");
                          $idsemester = ['id_semester'];
                          while($datasemester = mysqli_fetch_array($semester)){
                       ?>
                       <option  value="<?php echo $datasemester['id_semester'];?>"><?php echo $datasemester['semester'];?></option>
                       <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!-- Dropdown list Semester -->

              <!-- Dropdown list Triwulan -->
               <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Triwulan</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name ="triwulan" class="select2_single form-control" tabindex="-1" required="required">
                       <option value="">Pilih Triwulan</option>

                       <option  value="1">Triwulan Pertama</option>
                       <option  value="2">Triwulan Kedua</option>

                      </select>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Nilai Rencana</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "nilai" type="number"   placeholder="Isi Nilai Rencana"  step="any" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input name ="jenis" type="text"  value="Rencana" hidden>
                <!-- End of field Jenis Gardu Reguluer-->


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="tambahRencanaCSI">Simpan</button>
            </div>
          </form>
          </div>
        </div>
      </div>
<!-- / Modal Tambah Data CSI RENCANA-->

<!-- Modal Tambah Data CSI Realisasi-->
<div class="modal fade bs-tambahrealisasicsi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Tambah Data Nilai Realisasi CSI</h4>
          </div>
          <div class="modal-body">
              <form action="process_csi.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <!-- Dropdown list Gerbang -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Cabang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name= "idcabang" class="select2_single form-control" tabindex="-1" required="required">
                      <option value="">Pilih Cabang</option>
                      <?php
                          $dataCabang= mysqli_query($connect, "SELECT * FROM cabang");

                          while($ambilCabang = mysqli_fetch_array($dataCabang)){
                      ?>
                      <option  value="<?php echo $ambilCabang['id_cabang'];?>"><?php echo $ambilCabang['nama_cabang'];?></option>

                      <?php
                          }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- End of Dropdown list Gerbang -->

                <!-- Dropdown list Tahun -->

                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepickerFormRealisasiCSI'>
                            <input type='text' class="form-control" name= "tahun"  />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                  </div>
                  <!-- Dropdown list Tahun -->

                <!-- Dropdown list Semester -->
                 <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name ="idsemester" class="select2_single form-control" tabindex="-1" required="required">
                       <option value="">Pilih Semester</option>
                       <?php
                          $semester= mysqli_query($connect, "SELECT * FROM semester ");
                          $idsemester = ['id_semester'];
                          while($datasemester = mysqli_fetch_array($semester)){
                       ?>
                       <option  value="<?php echo $datasemester['id_semester'];?>"><?php echo $datasemester['semester'];?></option>
                       <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!-- Dropdown list Semester -->

                   <!-- Dropdown list Triwulan -->
               <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Triwulan</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name ="triwulan" class="select2_single form-control" tabindex="-1" required="required">
                       <option value="">Pilih Triwulan</option>

                       <option  value="1">Triwulan Pertama</option>
                       <option  value="2">Triwulan Kedua</option>

                      </select>
                    </div>
                  </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Nilai Realisasi</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "nilai" type="number" step="any" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input name ="jenis" type="text"  value="Realisasi" hidden>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="tambahRealisasiCSI">Simpan</button>
            </div>
          </form>
          </div>
        </div>
      </div>


      <!-- /Modal Tambah Realisasi CSI -->


<!--  Modal Edit CSI-->

<div class="modal fade bs-edit-csi" id="modal_editcsi" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Ubah CSI</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdatacsi.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <input name ="idrencanasms11" type="number"  value="" hidden >
                            <input name ="idrencanasms12" type="number"  value="" hidden >
                            <input name ="idrencanasms21" type="number"  value="" hidden>
                            <input name ="idrencanasms22" type="number"  value="" hidden>
                            <input name ="idrealisasisms11" type="number"  value="" hidden>
                            <input name ="idrealisasisms12" type="number"  value="" hidden>
                            <input name ="idrealisasisms21" type="number"  value="" hidden>
                            <input name ="idrealisasisms22" type="number"  value="" hidden>


                            <div class="col-md-6">
                              <h4>Rencana</h4>
                              <h6 style="margin-left:30px;">Semester 1</h6>
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 1</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRencanaSms11" type="number" step="any" min="0" id="rkap" class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <h4>Realisasi</h4>
                              <h6 style="margin-left:30px;">Semester 1</h6>
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 1</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRealisasiSms11" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 2</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRencanaSms12" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 2</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRealisasiSms12" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <h6 style="margin-left:30px;">Semester 2</h6>
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 1</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRencanaSms21" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <h6 style="margin-left:30px;">Semester 2</h6>
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 1</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRealisasiSms21" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">

                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 2</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRencanaSms22" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Triwulan 2</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRealisasiSms22" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary" name ="editrencanabeban" >Simpan Perubahan</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
<!-- /Modal Edit CSI -->


            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->

<style>
.table th {
   vertical-align: middle ; text-align: center ;"
}
.buttonright {
  width:60%;
  display:inline;
  overflow: auto;
  white-space: nowrap;
  margin:0px auto;
}
.buttonrightfloat {
  float:right;
  margin-right: 10px;
}
</style>
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
