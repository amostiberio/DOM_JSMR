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


  //ambil informasi jenis sub gardu
  $gardu = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM jenis_subgardu"));

  $idgerbang= mysqli_fetch_array(mysqli_query($connect,"SELECT id_gerbang FROM gerbang"));

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


                   <div class="title_right">
                    <div class="col-md-12 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonleft" >
                      <div class="btn-group  buttonleftfloat " >
                      <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</h5>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                          <form action="dropdownproses.php" method="POST">
                            <select name= "tahun" class="select2_single form-control" tabindex="-1">
                                    <option value="0">Pilih Tahun</option>                            
                                    <option value="2015" <?php if ($nilaiTahun =='2015') echo 'selected'?>>2015</option>
                                    <option value="2016" <?php if ($nilaiTahun == '2016') echo 'selected'?>>2016</option>
                                    <option value="2017" <?php if ($nilaiTahun == '2017') echo 'selected'?>>2017</option>
                                    <option value="2018" <?php if ($nilaiTahun == '2018') echo 'selected'?>>2018</option>                                                    
                            </select>
                            <button type="submit" class="btn btn-primary" name="dropdownTahun">Lihat</button>
                          </form>
                        </div>
                      
                      </div>

                      </div>
                    </div>
                   </div>
                   <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                        <div class="btn-group  buttonrightfloat " >                      
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Tambah<span class="caret"></span>
                        </button>
                        <ul role="menu" class="dropdown-menu pull-right">
                          <li><a data-toggle="modal" data-target=".bs-tambahrencanacsi" >Tambah Rencana CSI</a>
                          </li>
                          <li><a data-toggle="modal" data-target=".bs-tambahrealisasicsi" >Tambah Realisasi CSI</a>
                          </li>
                          
                        </ul>
                       </div>
                      </div>
                    </div>
                   </div>

                  <div class="x_content">
                      <?php if ($nilaiTahun != '0') {
                        ?>
                      <table id="datatable-keytable"  class="table table-striped table-bordered text-center">
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
                                  $noIterasi= 1;
                                  while($ambilListCabang = mysqli_fetch_array($listCabang)){
                                    
                                      $ambilIDCabang = $ambilListCabang['id_cabang'];


                                      $selectRencanaSms1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));

                                      $selectRencanaSms2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND jenis = 'Rencana' AND tahun = '$nilaiTahun'"));

                                      $selectRealisasiSms1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '1' AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));

                                      $selectRealisasiSms2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM data_csi WHERE id_cabang = '$ambilIDCabang' AND id_semester = '2' AND jenis = 'Realisasi' AND tahun = '$nilaiTahun'"));

                                     
                              ?>
                              <tr>
                                <td><?php echo $noIterasi++; ?> </td>
                                <td><?php echo $ambilListCabang['nama_cabang'];?> </td>
                                <td><?php echo $selectRencanaSms1['nilai_csi'];?></td>
                                <td><?php echo $selectRencanaSms2['nilai_csi'];?></td>
                                <td><?php echo $selectRealisasiSms1['nilai_csi'];?></td>
                                <td><?php echo $selectRealisasiSms2['nilai_csi']; ?></td>
                                <td>
                                <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-csi" 
                               data-id-rencanasms1="<?php echo $selectRencanaSms1['id_csi'] ?>"
                               data-id-rencanasms2="<?php echo $selectRencanaSms2['id_csi'] ?>" 
                               data-id-realisasisms1="<?php echo $selectRealisasiSms1['id_csi'] ?>" 
                               data-id-realisasisms2="<?php echo $selectRealisasiSms2['id_csi'] ?>" 

                               data-nilai-rencanasms1="<?php echo $selectRencanaSms1['nilai_csi']?>"
                               data-nilai-rencanasms2="<?php echo $selectRencanaSms2['nilai_csi']?>"
                               data-nilai-realisasisms1="<?php echo $selectRealisasiSms1['nilai_csi']?>" 
                               data-nilai-realisasisms2="<?php echo $selectRealisasiSms2['nilai_csi']?>"                                   
                               >
                                  Edit
                               </button>  
                                
                                                                  
                                  
                                </td>
                              </tr>
                              
                              <?php }?>
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
                    <select  name= "tahun" required="required" class="select2_single form-control" tabindex="-1">
                      <option value="">Pilih Tahun</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                    </select>
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

                <!-- field Jenis Gardu Reguluer-->
               
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Nilai Rencana</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "nilai" type="number"  step="any" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
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
                    <select  name= "tahun" required="required" class="select2_single form-control" tabindex="-1">
                      <option value="">Pilih Tahun</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                    </select>
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
                          <h4 class="modal-title" id="myModalLabel">Edit CSI</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdatacsi.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                            <input name ="idrencanasms1" type="number"  value=""  hidden>
                            <input name ="idrencanasms2" type="number"  value="" hidden>
                            <input name ="idrealisasisms1" type="number"  value="" hidden>
                            <input name ="idrealisasisms2" type="text"  value="" hidden>


                            <div class="col-md-6">
                              <h4>Rencana</h4>
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Semester 1</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRencanaSms1" type="number" step="any" min="0" id="rkap" class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <h4>Realisasi</h4>
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Semester 1</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRealisasiSms1" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">                             
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Semester 2</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRencanaSms2" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                            <div class="col-md-6">                             
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">Semester 2</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value ="" name= "nilaiRealisasiSms2" type="number" step="any" min="0" id="rkap"  class="form-control col-md-7 col-xs-12">
                              </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name ="editrencanabeban" >Save changes</button>
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
