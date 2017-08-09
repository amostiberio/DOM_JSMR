<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

  $iduser = $_SESSION['id_user'];

  $resultjs = $connect-> query("SELECT * FROM cabang");

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
                    <h2><i class="fa fa-table"></i> Table <small>Data Lalu-lintas Jam-jaman</small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
						    <li><a data-toggle="modal" data-target=".bs-lalin" >Tambah Lalin Transaksi Tinggi</a></li>
                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">
                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >

                              <tr >
                                <th rowspan="3">No</th>
                                <th rowspan="3">Cabang/Gerbang</th>
								<th rowspan="3">Tahun</th>
                                <th colspan="7">Lalu Lintas Transaksi Tinggi</th>
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
                                $lalin_transaksitinggi = mysqli_query($connect, "SELECT * FROM transaksi_tinggi join cabang on cabang.id_cabang=transaksi_tinggi.id_cabang group by transaksi_tinggi.tahun, transaksi_tinggi.id_cabang");
                                $nomor = 1;
                                while($data_lalintransaksi = mysqli_fetch_array($lalin_transaksitinggi)){
                                   $idcabang = $data_lalintransaksi['id_cabang'];
								   $tahun = $data_lalintransaksi['tahun'];
                                   
                                  //fetching data untuk tabel bagian lalin transaksi tinggi
                                  $data_gerbang_terbuka_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '1'");
                                  $total_gerbang_terbuka_lalin = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_terbuka_lalin)) {
								  $total_gerbang_terbuka_lalin += $num['nilai'];}
                                  $data_gerbang_masuk_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '2'");
                                  $total_gerbang_masuk_lalin = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_masuk_lalin)) {
								  $total_gerbang_masuk_lalin += $num['nilai'];}
                                  $data_gerbang_keluar_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '3'");
                                  $total_gerbang_keluar_lalin = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_keluar_lalin)) {
								  $total_gerbang_keluar_lalin += $num['nilai'];}
                                  $data_gerbang_terbuka_gto_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '4'");
                                  $total_gerbang_terbuka_gto_lalin = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_terbuka_gto_lalin)) {
								  $total_gerbang_terbuka_gto_lalin += $num['nilai'];}
                                  $data_gerbang_masuk_gto_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '5'");
                                  $total_gerbang_masuk_gto_lalin = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_masuk_gto_lalin)) {
								  $total_gerbang_masuk_gto_lalin += $num['nilai'];}
                                  $data_gerbang_keluar_gto_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '6'");
                                  $total_gerbang_keluar_gto_lalin = 0;
								  while ($num = mysqli_fetch_array($data_gerbang_keluar_gto_lalin)) {
								  $total_gerbang_keluar_gto_lalin += $num['nilai'];}
                                  $data_epass_lalin = mysqli_query($connect, "SELECT * FROM transaksi_tinggi WHERE tahun='$tahun' AND id_cabang = '$idcabang' AND id_subgardu = '7'");
                                  $total_epass_lalin = 0;
								  while ($num = mysqli_fetch_array($data_epass_lalin)) {
								  $total_epass_lalin += $num['nilai'];}

                            ?>
                              <tr>
                                <td><?php echo $nomor; $nomor++?></td>
                                <td><a href="cabang_lalin.php?id_cabang=<?php echo $data_lalintransaksi['id_cabang'];?>"><font color="#337ab7"><?php echo $data_lalintransaksi['nama_cabang']?></font></a></td>
								<td><?php echo $data_lalintransaksi['tahun']?></td>
								<td><?php echo $total_gerbang_keluar_lalin?></td>
                                <td><?php echo $total_gerbang_masuk_lalin?></td>
                                <td><?php echo $total_gerbang_terbuka_lalin?></td>
                                <td><?php echo $total_gerbang_keluar_gto_lalin?></td>
                                <td><?php echo $total_gerbang_masuk_gto_lalin?></td>
								<td><?php echo $total_gerbang_terbuka_gto_lalin?></td>
                                <td><?php echo $total_epass_lalin?></td>
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
	<!-- Modal Delete Lalin -->
 				<div class="modal fade bs-delete-modal" id="modal_deletelalin" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <button type="submit" class="btn btn-danger" name ="deletett" >Delete</button>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
			<!-- Modal Edit Lalin -->
			 <div class="modal fade bs-edit-modal" id="modal_editlalin" tabindex="-1" role="dialog" aria-hidden="true">
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
								<input value ="" name= "gardu_terbuka_lalin" type="number" min="0" id="gardu_terbuka_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_masuk_lalin" type="number" min="0" id="gardu_masuk_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Keluar</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_keluar_lalin" type="number" min="0" id="gardu_keluar_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>

							<div>
								<h4><b>Gardu GTO</b></h4>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_lalin">Gardu Terbuka</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_terbuka_gto_lalin" type="number" min="0" id="gardu_terbuka_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto_lalin">Gardu Masuk</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_masuk_gto_lalin" type="number" min="0" id="gardu_masuk_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input value ="" name= "gardu_keluar_gto_lalin" type="number" min="0" id="gardu_keluar_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div><br>

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="epass_gto_lalin">E-Pass</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input name= "epass_lalin" type="text" min="0" id="epass_gto_lalin" required="required" class="form-control col-md-7 col-xs-12">
							  </div>
							</div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name ="edittt" >Save changes</button>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>

			<!-- Modal Tambah Lalin Transaksi Tinggi-->
			<div class="modal fade bs-lalin" tabindex="-1" role="dialog" aria-hidden="true">
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
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cabang">Cabang</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<select required="required" name="cabang" id="cabang-list" class="select2_single form-control" tabindex="-1">
						<option value="">---Pilih Cabang---</option>
						<?php
						if ($resultjs->num_rows > 0) {
							// output data of each row
							while($row = $resultjs -> fetch_assoc()) {
						?>
							<option value="<?php echo $row["id_cabang"]; ?>"><?php echo $row["nama_cabang"]; ?> </option>
						<?php
						}}?>
					</select>
				</div>
			   </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Gerbang</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<select required="required" name="gerbang" id="gerbang-list" class="select2_single form-control" tabindex="-1">
						<option>---Pilih Gerbang---</option>
					</select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input name ="tahun" type="number" id="tahun" required="required" class="form-control col-md-7 col-xs-12">
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
