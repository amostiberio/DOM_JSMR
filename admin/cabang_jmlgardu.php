<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

  $getidcabang = $_GET['id_cabang'];
  $cabang =  mysqli_query($connect,"SELECT * FROM cabang WHERE id_cabang = '$getidcabang'");
  $data_cabang = mysqli_fetch_array($cabang);
  $iduser = $_SESSION['id_user'];

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
                    <h2><i class="fa fa-table"></i> Table <small>Jumlah Gardu Tersedia Cabang <?php echo $data_cabang['nama_cabang']?></small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >

                              <tr >
                                <th rowspan="3">No</th>
                                <th rowspan="3">Cabang/Gerbang</th>
								<th rowspan="3">Tahun</th>
                                <th colspan="7">Jumlah Gardu Tersedia</th>
                                <th rowspan="3">Aksi</th>
                              </tr>
                              <tr>
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
                              </tr>

                            </thead>
                            <tbody>
                              <?php
                                $jmlgardu = mysqli_query($connect, "SELECT * FROM jml_gardutersedia join gerbang on gerbang.id_gerbang=jml_gardutersedia.id_gerbang WHERE jml_gardutersedia.id_cabang='$getidcabang' group by jml_gardutersedia.tahun, jml_gardutersedia.id_gerbang");
                                $nomor = 1;
                                while($data_jmlgardu = mysqli_fetch_array($jmlgardu)){
                                   $idgerbanglist = $data_jmlgardu['id_gerbang'];
                                   $idsubgardulist = $data_jmlgardu['id_subgardu'];
								   $tahun = $data_jmlgardu['tahun'];

                                   //fething data dari tabel gerbang
                                   $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));

                                  //fetching data untuk tabel bagian jumlah gardu tersedia
                                  $data_gerbang_terbuka_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                  $data_gerbang_masuk_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                  $data_gerbang_keluar_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                  $data_gerbang_terbuka_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                                  $data_gerbang_masuk_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                  $data_gerbang_keluar_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                  $data_epass_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '8' AND jenis_subgardu.id_jenisgardu='3'"));

                            ?>
                              <tr>
                                <td><?php echo $nomor; $nomor++?></td>
                                <td><?php echo $data_gerbang['nama_gerbang']?></td>
								<td><?php echo $data_jmlgardu['tahun'];?></td>
                                <td><?php echo $data_gerbang_keluar_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_terbuka_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_tersedia['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tersedia['nilai']?></td>
								<td><?php echo $data_gerbang_terbuka_gto_tersedia['nilai']?></td>
                                <td><?php echo $data_epass_tersedia['nilai']?></td>
								<td>
								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-data1="<?php echo $data_gerbang_terbuka_tersedia['nilai']?>"
                                 data-data2="<?php echo $data_gerbang_masuk_tersedia['nilai']?>"
                                 data-data3="<?php echo $data_gerbang_keluar_tersedia['nilai']?>"
                                 data-data4="<?php echo $data_gerbang_terbuka_gto_tersedia['nilai']?>"
                                 data-data5="<?php echo $data_gerbang_masuk_gto_tersedia['nilai']?>"
								 data-data6="<?php echo $data_gerbang_keluar_gto_tersedia['nilai']?>"
                                 data-data7="<?php echo $data_epass_tersedia['nilai']?>">Edit</button>																 
								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>">Delete</button>	
								 </td>
                              </tr>
                              <?php }?>
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
	<!-- Modal Delete Jml Gardu -->
 				<div class="modal fade bs-delete-modal" id="modal_deletejmlgardu" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Delete Rencana</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdelete.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" ">
                         <div class="alert alert-danger" role="alert">
						   <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
								<h4> Anda yakin untuk menghapus data ini? </h4>
						  </div>
                          <h2 style="color:red;"></h2>
                          <form action="editdelete.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
							  <input name="idgerbang" type="text" id="id" value="" hidden>						
							  <input name="tahun" type="text" id="tahun" value="" hidden>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger" name ="deletejg" >Delete</button>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
				  
			<!-- Modal Edit Jml Gardu -->
			 <div class="modal fade bs-edit-modal" id="modal_editjmlgardu" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Rencana</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdelete.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
							  <input name="idgerbang" type="text" id="id" value="" hidden>					  
							  <input name="tahun" type="text" id="tahun" value="" hidden>
							<div>
								<h4><b>Gardu Reguler</b></h4>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Terbuka</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_terbuka_tersedia" type="number" min="0" id="gardu_terbuka_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_masuk_tersedia" type="number" min="0" id="gardu_masuk_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Keluar</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_keluar_tersedia" type="number" min="0" id="gardu_keluar_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>

							<div>
								<h4><b>Gardu GTO</b></h4>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_tersedia">Gardu Terbuka</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_terbuka_gto_tersedia" type="number" min="0" id="gardu_terbuka_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_tersedia">Gardu Masuk</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_masuk_gto_tersedia" type="number" min="0" id="gardu_masuk_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_keluar_gto_tersedia" type="number" min="0" id="gardu_keluar_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div><br>

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="epass_gto_tersedia">E-Pass</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input name= "epass_tersedia" type="text" min="0" id="epass_gto_tersedia" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name ="editjg" >Save changes</button>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
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
