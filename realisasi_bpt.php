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

  $resultuntukrealisasi = $connect-> query("SELECT * FROM program_kerja WHERE id_cabang = '$idcabang' AND jenis = 'bpt' ");

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
                <h3>Monitoring Beban</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Beban Cabang <?php echo $namacabang; ?> </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
	                      <li><a data-toggle="modal" data-target=".bs-realisasi" >Tambah Realisasi</a>
	                      </li>

	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">
					  <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
						<thead>
						  <tr>
							<th rowspan="2">Program Kerja</th>
							<th rowspan="2">Sub Program Kerja</th>
							<th rowspan="2">Total Status Akhir s.d TW 4</th>
							<th rowspan="2">TOTAL Realisasi s.d TW 4</th>
							<th rowspan="2">Tahun </th>
							<th colspan="2">TW 1</th>
							<th colspan="2">TW 2</th>
							<th colspan="2">TW 3</th>
							<th colspan="2">TW 4</th>
						  </tr>
						  <tr>
							<th >Status Akhir</th>
							<th >Realisasi</th>
							<th >Status Akhir</th>
							<th >Realisasi</th>
							<th >Status Akhir</th>
							<th >Realisasi</th>
							<th >Status Akhir</th>
							<th >Realisasi</th>
						  </tr>
						</thead>
						<tbody>
							<?php
							$listTW = mysqli_query($connect, "SELECT * FROM beban_realisasi, sub_program WHERE sub_program.id_sp = beban_realisasi.id_sp AND stat_twrl ='1'  AND sub_program.id_cabang = '$idcabang' AND beban_realisasi.jenis ='bpt' AND sub_program.jenis='beban' ");
							while($datalistTW = mysqli_fetch_array($listTW)){
								$idpklist= $datalistTW['id_pk'];
								$idspklist= $datalistTW['id_sp'];
								$tahun= $datalistTW['tahun'];
								$jmlstakhir = mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
								$jmlrealisasi = mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
								$qty1 = 0;
								$qty2 = 0;
								while ($num = mysqli_fetch_array($jmlstakhir)) {
									$qty1 += $num['stat_akhir'];}
								while ($num = mysqli_fetch_array($jmlrealisasi)) {
									$qty2 += $num['realisasi'];}
								$dataprogramkerja = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM program_kerja WHERE id_pk = '$idpklist'"));
								$datasubprogramkerja= mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sub_program WHERE id_sp = '$idspklist'"));
								$datatwreal1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '1'"));
								$datatwreal2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '2'"));
								$datatwreal3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '3'"));
								$datatwreal4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '4'"));
							?>
						  <tr>
							<td><?php echo $dataprogramkerja['nama_pk'] ?></td>
							<td><?php echo $datasubprogramkerja['nama_sp'] ?></td>
							<td><?php echo $qty1;?></td>
							<td><?php echo $qty2;?></td>
							<td><?php echo $datalistTW['tahun'] ?></td>
							<td><?php echo $datatwreal1['stat_akhir'] ?></td>
							<td><?php echo $datatwreal1['realisasi'] ?></td>
							<td><?php echo $datatwreal2['stat_akhir'] ?></td>
							<td><?php echo $datatwreal2['realisasi'] ?></td>
							<td><?php echo $datatwreal3['stat_akhir'] ?></td>
							<td><?php echo $datatwreal3['realisasi'] ?></td>
							<td><?php echo $datatwreal4['stat_akhir'] ?></td>
							<td><?php echo $datatwreal4['realisasi'] ?></td>
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
			<!-- Modal Tambah Realisasi -->
			<div class="modal fade bs-realisasi" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Realisasi</h4>
					</div>
					<div class="modal-body">
					  <form action="tambahrealisasibeban.php" method="POST" id="demo-form2"  class="form-horizontal form-label-left">
						   <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Program Kerja</label>
							<input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select required="required" name="programkerja" id="program-list2" class="select2_single form-control" tabindex="-1">
										<option value="">Pilih Program Kerja</option>
										<?php
										if ($resultuntukrealisasi->num_rows > 0) {
											// output data of each row
											while($row = $resultuntukrealisasi -> fetch_assoc()) {
										?>
											<option value="<?php echo $row["id_pk"]; ?>"><?php echo $row["nama_pk"]; ?></option>
										<?php
										}}?>
								</select>
							</div>
						   </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subProgram">Subprogram Kerja</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select required="required" name="subprogram" id="subprogram-list2" class="select2_single form-control" tabindex="-1">
									<option>Pilih Subprogram Kerja</option>
								</select>
							</div>
						  </div>
						  <input name ="jenis" type="text" id="jenis" value="bpt" hidden>

						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <select required="required" name="tahun" class="select2_single form-control" tabindex="-1">
								<option value="">Pilih Tahun</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
							  </select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sttwrl">Triwulan</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <div class="radio">
								<label>
								  <input type="radio" value="1" name="sttwrl"> TW 1
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" value="2" name="sttwrl"> TW 2
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" value="3" name="sttwrl"> TW 3
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" value="4" name="sttwrl"> TW 4
								</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_akhir">Status Akhir</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name="stakhir" type="number" min="0" id="status_akhir" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="realisasi">Realisasi</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name="realisasi" type="number" min="0" id="realisasi" required="required" class="form-control col-md-7 col-xs-12">
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
