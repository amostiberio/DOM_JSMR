<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database


  $iduser = $_SESSION['id_user'];

  //ambil informasi user id dan cabang id dari table user
  $user = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM user WHERE id_user = '$iduser' "));
  $idcabang = $user['id_cabang'];

  //ambil informasi user id dan cabang id dari table cabang
  $cabang =  mysqli_fetch_array(mysqli_query($connect,"SELECT nama_cabang FROM cabang WHERE id_cabang = '$idcabang'"));
  $namacabang = $cabang['nama_cabang'];

  $resultuntukrencana = $connect-> query("SELECT * FROM program_kerja WHERE id_cabang = '$idcabang' AND jenis = 'bpt' ");

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
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
                            <li><a data-toggle="modal" data-target=".bs-gerbang" >Tambah Gerbang</a></li>
						                <li><a data-toggle="modal" data-target=".bs-transaksitinggi" >Tambah Lalin Transaksi Tinggi</a></li>
                            <li><a data-toggle="modal" data-target=".bs-jmlgardutersedia" >Tambah Jumlah Gardu Tersedia</a></li>
                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                                <?php
                                  $lalin_transaksitinggi = mysqli_query($connect, "SELECT * FROM transaksi_tinggi join jml_gardutersedia join gerbang on gerbang.id_gerbang=transaksi_tinggi.id_gerbang=jml_gardutersedia.id_gerbang WHERE transaksi_tinggi.id_cabang = '$idcabang' AND jml_gardutersedia.id_cabang='$idcabang' group by transaksi_tinggi.id_gerbang AND jml_gardutersedia.id_gerbang");
                                  $nomor = 1;
                                  while($data_lalintransaksi = mysqli_fetch_array($lalin_transaksitinggi)){
                                     $idgerbanglist = $data_lalintransaksi['id_gerbang'];
                                     $idsubgardulist = $data_lalintransaksi['id_subgardu'];

                                     //fething data dari tabel gerbang
                                     $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));

                                    //fetching data untuk tabel bagian lalin transaksi tinggi
                                     $data_gerbang_terbuka_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                     $data_gerbang_masuk_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                     $data_gerbang_keluar_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                     $data_gerbang_terbuka_gto_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                                     $data_gerbang_masuk_gto_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                     $data_gerbang_keluar_gto_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                     $data_epass_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '7' AND jenis_subgardu.id_jenisgardu='3'"));

                                    //fetching data untuk tabel bagian jumlah gardu tersedia
                                    $data_gerbang_terbuka_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));

                                    $data_gerbang_masuk_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_keluar_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_terbuka_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_gerbang_masuk_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_gerbang_keluar_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_epass_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '8' AND jenis_subgardu.id_jenisgardu='3'"));

                              ?>
                              <tr >
                                <th rowspan="3">No</th>
                                <th rowspan="3">Cabang/Gerbang</th>
                                <th colspan="7">Lalu Lintas Transaksi Tinggi</th>
                                <th colspan="7">Jumlah Gardu Tersedia</th>
                                <th rowspan="3">Aksi</th>
                              </tr>
                              <tr>
                                <th colspan="3">Reguler</th>
								                <th colspan="3">GTO</th>
                                <th rowspan="2">E-Pass</th>
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
                                <th rowspan="1">Gardu Keluar</th>
                                <th rowspan="1">Gardu Masuk</th>
                                <th colspan="1">Gardu Terbuka</th>
                                <th rowspan="1">Gardu Keluar</th>
                                <th rowspan="1">Gardu Masuk</th>
                                <th colspan="1">Gardu Terbuka</th>
                              </tr>
                              <?php }?>
                            </thead>
                            <tbody>

                              <tr>
                                <td><?php echo $nomor; $nomor++?></td>
                                <td><?php echo $data_gerbang['nama_gerbang']?></td>
                                <td><?php echo $data_gerbang_terbuka_lalin['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_lalin['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_lalin['nilai']?></td>
								                <td><?php echo $data_gerbang_terbuka_gto_lalin['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_lalin['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_lalin['nilai']?></td>
                                <td><?php echo $data_epass_lalin['nilai']?></td>
                                <td><?php echo $data_gerbang_terbuka_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_tersedia['nilai']?></td>
								                <td><?php echo $data_gerbang_terbuka_gto_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_tersedia['nilai']?></td>
                                <td><?php echo $data_epass_tersedia['nilai']?></td>
								                <td><button type="button" class="btn btn-round btn-primary">Primary</button></td>
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
    <!-- Modal Tambah Gerbang -->
      <div class="modal fade bs-gerbang" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Gerbang</h4>
					</div>

					<div class="modal-body">
					<form action="tambah_gerbang.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>
                        <input name ="jenis" type="text" id="jenis" value="spojt" hidden>

						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ma">Nama Gerbang</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name ="gerbang"type="text" id="gerbang" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>
      <!-- End of Modal Tambah Gerbang -->

					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					  <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
					</div>
					 </form>
				  </div>

				</div>
			</div>


			<!-- Modal Tambah Lalin Transaksi Tingg-->
			<div class="modal fade bs-transaksitinggi" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Lalin Transaksi Tinggi</h4>
					</div>
					<div class="modal-body">
              <form action="tambah_transaksitinggi.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Gerbang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name ="idgerbang" class="select2_single form-control" tabindex="-1" required="required">
                      <option></option>
                      <?php
                                      $gerbang= mysqli_query($connect, "SELECT * FROM gerbang WHERE id_cabang ='$idcabang'");
                                      $idgerbang = ['id_gerbang'];
                                      while($datagerbang = mysqli_fetch_array($gerbang)){
                                  ?>
                  <option  value="<?php echo $datagerbang['id_gerbang'];?>"><?php echo $datagerbang['nama_gerbang'];?></option>

                  <?php }?>
                                  <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>

                  </select>
                </div>
                 </div>


                <div>
                    <h4><b>Gardu Reguler</b></h4>
                </div>

							  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka_lalin" type="text" value="1" hidden>
                    <input name= "gardu_terbuka_lalin" type="number" min="0" id="gardu_terbuka_lalin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk_lalin" type="text" value="2" hidden>
                    <input name= "gardu_masuk_lalin" type="number" min="0" id="gardu_masuk_lalin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Keluar</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_keluar_lalin" type="text" value="3" hidden>
                    <input name= "gardu_keluar_lalin" type="number" min="0" id="gardu_keluar_lalin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div>
                    <h4><b>Gardu GTO</b></h4>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_lalin">Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka_gto_lalin" type="text" value="4" hidden>
                    <input name= "gardu_terbuka_gto_lalin" type="number" min="0" id="gardu_terbuka_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_lalin">Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk_gto_lalin" type="text" value="5" hidden>
                    <input name= "gardu_masuk_gto_lalin" type="number" min="0" id="gardu_masuk_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_keluar_gto_lalin" type="text" value="6" hidden>
                    <input name= "gardu_keluar_gto_lalin" type="number" min="0" id="gardu_keluar_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div><br>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="epass_gto_lalin">E-Pass</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idepass_lalin" type="text" value="7" hidden>
                    <input name= "epass_lalin" type="text" min="0" id="epass_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
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
      <!-- End of Modal Tambah Lalin Transaksi Tinggi-->

      <!-- Modal Jumlah Gardu Tersedia-->
      <div class="modal fade bs-jmlgardutersedia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Tambah Jumlah Gardu Tersedia</h4>
          </div>
          <div class="modal-body">
              <form action="tambah_gardutersedia.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Gerbang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name ="idgerbang" class="select2_single form-control" tabindex="-1" required="required">
                      <option></option>
                      <?php
                                      $gerbang= mysqli_query($connect, "SELECT * FROM gerbang WHERE id_cabang ='$idcabang'");
                                      $idgerbang = ['id_gerbang'];
                                      while($datagerbang = mysqli_fetch_array($gerbang)){
                                  ?>
                  <option  value="<?php echo $datagerbang['id_gerbang'];?>"><?php echo $datagerbang['nama_gerbang'];?></option>

                  <?php }?>
                                  <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>

                  </select>
                </div>
                 </div>


                <div>
                    <h4><b>Gardu Reguler</b></h4>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_tersedia">Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka_tersedia" type="text" value="1" hidden>
                    <input name= "gardu_terbuka_tersedia" type="number" min="0" id="gardu_terbuka_tersedia" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_masuk_tersedia">Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk_tersedia" type="text" value="2" hidden>
                    <input name= "gardu_masuk_tersedia" type="number" min="0" id="gardu_masuk_tersedia" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_tersedia">Gardu Keluar</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_keluar_tersedia" type="text" value="3" hidden>
                    <input name= "gardu_keluar_tersedia" type="number" min="0" id="gardu_keluar_tersedia" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div>
                    <h4><b>Gardu GTO</b></h4>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_tersedia">Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka_gto_tersedia" type="text" value="4" hidden>
                    <input name= "gardu_terbuka_gto_tersedia" type="number" min="0" id="gardu_terbuka_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_tersedia">Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk_gto_tersedia" type="text" value="5" hidden>
                    <input name= "gardu_masuk_gto_tersedia" type="number" min="0" id="gardu_masuk_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_keluar_gto_tersedia" type="text" value="6" hidden>
                    <input name= "gardu_keluar_gto_tersedia" type="number" min="0" id="gardu_keluar_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div><br>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="epass_gto_tersedia">E-Pass</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idepass_tersedia" type="text" value="8" hidden>
                    <input name= "epass_tersedia" type="text" min="0" id="epass_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
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
      <!--End of Modal Tambah Lalin Transaksi Tingg-->

		</div>

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
