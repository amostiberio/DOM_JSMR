<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database


  $iduser = $_SESSION['id_user'];
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
                <h3>Laporan KPI</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Waktu Transaksi 2 SPM Cabang <?php echo $namacabang; ?> </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false"> Rencana SPM <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
						                <li><a data-toggle="modal" data-target=".bs-rencanaspm" >Tambah Rencana SPM</a></li>
	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>

                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                              <tr >
                                <th rowspan="2">Keterangan</th>
                                <th colspan="2">Rencana</th>
                              </tr>
                              <tr>
                                <!-- Rencana -->
                                <th rowspan="1">Semester 1</th>
                                <th rowspan="1">s.d Semester 2</th>


                              </tr>

                            </thead>
                            <tbody>
                              <?php
                              $rencana_spm = mysqli_query($connect, "SELECT * FROM wt_rencana join jenis_subgardu on wt_rencana.id_subgardu = jenis_subgardu.id_subgardu");
                              $nomor = 1;
                              $data_rencana_spm = mysqli_fetch_array($rencana_spm);
                                //ambil data Rencana s1
                                $datarencana_gardu_terbuka_s1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1' AND wt_rencana.id_semester = '1'"));
                                $datarencana_gardu_masuk_tertutup_s1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1' AND wt_rencana.id_semester = '1'"));
                                $datarencana_gardu_keluar_tertutup_s1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1' AND wt_rencana.id_semester = '1'"));
                                $datarencana_gardu_tol_ambil_kartu_s1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2' AND wt_rencana.id_semester = '1'"));
                                $datarencana_gardutol_transaksi_s1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2' AND wt_rencana.id_semester = '1'"));
                                $datarencana_antrian_kendaraan_s1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '9' AND jenis_subgardu.id_jenisgardu='3' AND wt_rencana.id_semester = '1'"));
                                //ambil data Rencana s2
                                $datarencana_gardu_terbuka_s2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1' AND wt_rencana.id_semester = '2'"));
                                $datarencana_gardu_masuk_tertutup_s2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1' AND wt_rencana.id_semester = '2'"));
                                $datarencana_gardu_keluar_tertutup_s2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1' AND wt_rencana.id_semester = '2'"));
                                $datarencana_gardu_tol_ambil_kartu_s2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2' AND wt_rencana.id_semester = '2'"));
                                $datarencana_gardutol_transaksi_s2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2' AND wt_rencana.id_semester = '2'"));
                                $datarencana_antrian_kendaraan_s2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '9' AND jenis_subgardu.id_jenisgardu='3' AND wt_rencana.id_semester = '2'"));


                              ?>
                              <tr>
                                <td><?php echo "Gardu Masuk Sistem Tertutup"?></td>
                                <td><?php echo $datarencana_gardu_masuk_tertutup_s1['nilai'];?></td>
                                <td><?php echo $datarencana_gardu_masuk_tertutup_s2['nilai'];?></td>
                              </tr>
                              <tr>
                                <td><?php echo "Gardu Keluar Sistem Tertutup"?></td>
                                <td><?php echo $datarencana_gardu_keluar_tertutup_s1['nilai'];?></td>
                                <td><?php echo $datarencana_gardu_keluar_tertutup_s2['nilai'];?></td>

                              </tr>
                              <tr>
                                <td><?php echo "Gardu Sistem Terbuka"?></td>
                                <td><?php echo $datarencana_gardu_terbuka_s1['nilai'];?></td>
                                <td><?php echo $datarencana_gardu_terbuka_s2['nilai'];?></td>
                              </tr>
                              <tr>
                                <td><?php echo "Gardu Tol Ambil Kartu"?></td>
                                <td><?php echo $datarencana_gardu_tol_ambil_kartu_s1['nilai']?></td>
                                <td><?php echo $datarencana_gardu_tol_ambil_kartu_s2['nilai']?></td>


                              </tr>
                              <tr>
                                <td><?php echo "Gardu Tol Transaksi"?></td>
                                <td><?php echo $datarencana_gardutol_transaksi_s1['nilai']?></td>
                                <td><?php echo $datarencana_gardutol_transaksi_s2['nilai']?></td>
                              </tr>
                              <tr>
                                <td><?php echo "Jumlah Antrian Kendaraan"?></td>
                                <td><?php echo $datarencana_antrian_kendaraan_s1['nilai'];?></td>
                                <td><?php echo $datarencana_antrian_kendaraan_s2['nilai'];?></td>
                              </tr>
                              <tr>
                                <td>Aksi</td>
                                <td>
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-editrencanaspm"
                                  data-id-semester = "<?php echo $datarencana_gardu_keluar_tertutup_s1['id_semester'];?>"
                                  data-id-gardukeluar ="<?php echo $datarencana_gardu_keluar_tertutup_s1['id_wtrencana'];?>"
                                  data-id-gardumasuk ="<?php echo $datarencana_gardu_masuk_tertutup_s1['id_wtrencana'];?>"
                                  data-id-garduterbuka ="<?php echo $datarencana_gardu_terbuka_s1['id_wtrencana'];?>"
                                  data-id-gardutolambilkartu ="<?php echo $datarencana_gardu_tol_ambil_kartu_s1['id_wtrencana'];?>"
                                  data-id-gardutoltransaksi ="<?php echo $datarencana_gardutol_transaksi_s1['id_wtrencana'];?>"
                                  data-id-jmlpanjangantrian ="<?php echo $datarencana_antrian_kendaraan_s1['id_wtrencana'];?>"
                                  data-gardukeluar ="<?php echo $datarencana_gardu_keluar_tertutup_s1['nilai'];?>"
                                  data-gardumasuk ="<?php echo $datarencana_gardu_masuk_tertutup_s1['nilai'];?>"
                                  data-garduterbuka ="<?php echo $datarencana_gardu_terbuka_s1['nilai']; ?>"
                                  data-gardutolambilkartu ="<?php echo $datarencana_gardu_tol_ambil_kartu_s1['nilai'];?>"
                                  data-gardutoltransaksi ="<?php echo $datarencana_gardutol_transaksi_s1['nilai'];?>"
                                  data-jmlpanjangantrian ="<?php echo $datarencana_antrian_kendaraan_s1['nilai'];?>"
                                  >
                                    Edit
                                  </button>
                                  <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-deleterencanaspm"
                                  data-id-semester ="<?php echo $datarencana_gardu_keluar_tertutup_s1['id_semester'];?>"
                                  >
                                    Delete
                                  </button>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-editrencanaspm"
                                  data-id-semester = "<?php echo $datarencana_gardu_keluar_tertutup_s2['id_semester'];?>"
                                  data-id-gardukeluar ="<?php echo $datarencana_gardu_keluar_tertutup_s2['id_wtrencana'];?>"
                                  data-id-gardumasuk ="<?php echo $datarencana_gardu_masuk_tertutup_s2['id_wtrencana'];?>"
                                  data-id-garduterbuka ="<?php echo $datarencana_gardu_terbuka_s2['id_wtrencana'];?>"
                                  data-id-gardutolambilkartu ="<?php echo $datarencana_gardu_tol_ambil_kartu_s2['id_wtrencana'];?>"
                                  data-id-gardutoltransaksi ="<?php echo $datarencana_gardutol_transaksi_s2['id_wtrencana'];?>"
                                  data-id-jmlpanjangantrian ="<?php echo $datarencana_antrian_kendaraan_s2['id_wtrencana'];?>"
                                  data-gardukeluar ="<?php echo $datarencana_gardu_keluar_tertutup_s2['nilai'];?>"
                                  data-gardumasuk ="<?php echo $datarencana_gardu_masuk_tertutup_s2['nilai'];?>"
                                  data-garduterbuka ="<?php echo $datarencana_gardu_terbuka_s2['nilai']; ?>"
                                  data-gardutolambilkartu ="<?php echo $datarencana_gardu_tol_ambil_kartu_s2['nilai'];?>"
                                  data-gardutoltransaksi ="<?php echo $datarencana_gardutol_transaksi_s2['nilai'];?>"
                                  data-jmlpanjangantrian ="<?php echo $datarencana_antrian_kendaraan_s2['nilai'];?>"
                                  >
                                    Edit
                                  </button>
                                  <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-deleterencanaspm"
                                  data-id-semester ="<?php echo $datarencana_gardu_keluar_tertutup_s2['id_semester'];?>">
                                    Delete
                                  </button>
                                </td>
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
        <!-- Modal Content -->
        <div class="x_content">

          <!-- Modal Tambah Rencana Waktu Transaksi-->
    			<div class="modal fade bs-rencanaspm"  tabindex="-1" role="dialog" aria-hidden="true">
    				<div class="modal-dialog modal-lg">
    				  <div class="modal-content">
    					<div class="modal-header">
    					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    					  </button>
    					  <h4 class="modal-title" id="myModalLabel">Tambah Waktu Transaksi</h4>
    					</div>
    					<div class="modal-body">
                  <form action="tambah_wtrencana.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                    <!-- Dropdown list Semester -->
                     <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name ="idsemester" class="select2_single form-control" tabindex="-1" required="required">
                           <option></option>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Keluar Sistem Tertutup</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "idgardu_keluar" type="text" value="3" hidden>
                        <input name= "gardu_keluar" type="number" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk Sistem Tertutup</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "idgardu_masuk" type="text" value="2" hidden>
                        <input name= "gardu_masuk" type="number" min="0" id="gardu_masuk" required="required" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Sistem Terbuka</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "idgardu_terbuka" type="text" value="1" hidden>
                        <input name= "gardu_terbuka" type="number" min="0" id="gardu_keluar" required="required" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Tol Ambil Kartu</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "idgardu_tol_ambilkartu" type="text" value="5" hidden>
                        <input name= "gardu_tol_ambilkartu" type="number" min="0" id="gardu_terbuka_gto" required="required" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Tol Transaksi</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "idgardu_tol_transaksi" type="text" value="4" hidden>
                        <input name= "gardu_tol_transaksi" type="number" min="0" id="gardu_masuk_gto" required="required" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panjang_antrian">Jumlah Antrian Kendaraan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "idpanjang_antrian" type="text" value="9" hidden>
                        <input name= "panjang_antrian" type="text" min="0" id="panjang_antrian" required="required" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>


    						</div>
    						<div class="modal-footer">
    						  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    						  <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
    						</div>
    					</form>
    				  </div>
    				</div>
    			</div>
          <!-- End of Modal Rencana Tambah Transaksi -->

          <!-- Modal Delete Rencana Waktu Transaksi -->
          <div class="modal fade bs-deleterencanaspm" id="modal_deleterencanaspm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Delete Rencana</h4>
                </div>
                <div class="modal-body">
                  <form action="edit_rencanaspm.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    <div class="alert alert-danger" role="alert">
                      <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
                      <h4> Anda yakin untuk menghapus data rencana ini? </h4>
                    </div>
                    <h2 style="color:red;"></h2>
                    <form action="edit_rencanaspm.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <input name ="edit_idsemester" type="text" id="waktutransaksi1" value="" hidden>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger" name ="deleterencanaspm" >Delete</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <!--End of Modal Delete Rencana Waktu Transaksi -->

          <!-- Modal Edit Rencana Waktu Transaksi-->
          <div class="modal fade bs-editrencanaspm" id="modal_editrencanaspm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Ubah Rencana SPM</h4>
              </div>
              <div class="modal-body">
                  <form action="edit_rencanaspm.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <input name ="edit_idsemester" type="number" id="waktutransaksi1" value="" hidden>
                    <input name ="edit_idgardukeluar" type="number" id="waktutransaksi1" value="" hidden>
                    <input name ="edit_idgardumasuk" type="number" id="waktutransaksi1" value="" hidden>
                    <input name ="edit_idgarduterbuka" type="number" id="waktutransaksi1" value=""hidden>
                    <input name ="edit_idgardutolambilkartu" type="number" id="waktutransaksi1" value="" hidden>
                    <input name ="edit_idgardutoltransaksi" type="number" id="waktutransaksi1" value="" hidden>
                    <input name ="edit_idjmlpanjangantrian" type="number" id="waktutransaksi1" value="" hidden>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Keluar Sistem Tertutup</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name= "edit_gardukeluar" type="number" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk Sistem Tertutup</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_gardumasuk" type="number" min="0" id="gardu_masuk" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Sistem Terbuka</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_garduterbuka" type="number" min="0" id="gardu_keluar" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Tol Ambil Kartu</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_gardutolambilkartu" type="number" min="0" id="gardu_terbuka_gto" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Tol Transaksi</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input name= "edit_gardutoltransaksi" type="number" min="0" id="gardu_masuk_gto" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panjang_antrian">Jumlah Antrian Kendaraan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input name= "edit_jmlpanjangantrian" type="text" min="0" id="panjang_antrian" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" name="editrencanaspm">Simpan</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <!-- End of Modal Edit Rencana Waktu Transaksi -->



    		</div>
        <!-- End of Modal Content -->
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
