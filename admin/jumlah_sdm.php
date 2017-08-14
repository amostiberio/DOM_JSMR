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
                <h3>Jumlah SDM</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small></small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
                            <li><a data-toggle="modal" data-target=".bs-pengumpultol" >Tambah Jumlah Pulantol</a></li>
						</ul>
	                    </div>
                      </div>
					  <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
						<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Download <span class="caret"></span>
                      </button>
                      <ul role="menu" class="dropdown-menu pull-right">
                       <li><a href="downloadjs.php" > Download Excels <img src='xls.png' alt="XLSX" style="width:20px"></a>
                       </li>
					   </ul>
	                    </div>
                      </div>
                    </div>
                   </div>
                  <div class="x_content">
                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                              <tr >
                                <th rowspan="2">No</th>
                                <th rowspan="2">Cabang</th>
								<th rowspan="2">Tahun</th>
                                <th rowspan="2">Kepala Gerbang Tol</th>
                                <th rowspan="2">KSPT</th>
                                <th colspan="5">Pengumpul Tol</th>
                                <th rowspan="2">TUGT</th>
                              </tr>
                              <tr>
                                <th colspan="1">Karyawan Jasamarga</th>
								<th colspan="1">Karyawan JLJ</th>
                                <th rowspan="1">Karyawan JLO</th>
                                <th colspan="1">Sakit Permanen</th>
								<th colspan="1">Total</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                                $jumlah_sdm = mysqli_query($connect, "SELECT * FROM pengumpul_tol join jenis_karyawan join cabang on cabang.id_cabang=pengumpul_tol.id_cabang group by pengumpul_tol.tahun, pengumpul_tol.id_cabang");
                                $nomor = 1; $total1 =0; $total2 =0; $total3 =0; $total4 =0; $total5 =0; $total6 =0; $total7 =0; $total8=0;
                                while($data_jumlahsdm = mysqli_fetch_array($jumlah_sdm)){
                                  $idcabang = $data_jumlahsdm['id_cabang'];
								  $tahun = $data_jumlahsdm['tahun'];
                                  $total = 0;
								  $data_kepalagerbangtol = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '5'");
								  $total_kepalagerbangtol = 0;
								  while ($num = mysqli_fetch_array($data_kepalagerbangtol)) {
									$total_kepalagerbangtol += $num['jumlah'];}
								  $data_kspt = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '6'");
                                  $total_kspt = 0;
								  while ($num = mysqli_fetch_array($data_kspt)) {
									$total_kspt += $num['jumlah'];}
                                  $data_kryjasamarga = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '1'");
                                  $total_kryjasamarga = 0;
								  while ($num = mysqli_fetch_array($data_kryjasamarga)) {
									$total_kryjasamarga += $num['jumlah'];}
                                  $data_kryjlj = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '2'");
                                  $total_kryjlj = 0;
								  while ($num = mysqli_fetch_array($data_kryjlj)) {
									$total_kryjlj += $num['jumlah'];}
                                  $data_kryjlo= mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '3'");
                                  $total_kryjlo= 0;
								  while ($num = mysqli_fetch_array($data_kryjlo)) {
									$total_kryjlo += $num['jumlah'];}
                                  $data_sakitpermanen = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '4'");
                                  $total_sakitpermanen = 0;
								  while ($num = mysqli_fetch_array($data_sakitpermanen)) {
									$total_sakitpermanen += $num['jumlah'];}
                                  $data_tugt = mysqli_query($connect, "SELECT * FROM pengumpul_tol WHERE tahun='$tahun' AND pengumpul_tol.id_cabang = '$idcabang' AND pengumpul_tol.id_karyawan = '7'");
                                  $total_tugt = 0;
								  while ($num = mysqli_fetch_array($data_tugt)) {
									$total_tugt += $num['jumlah'];}
                                  ?>
                              <tr>
								<td><?php echo $nomor; $nomor++ ?></td>
                                <td><a href="cabang_jmlsdm.php?id_cabang=<?php echo $data_jumlahsdm['id_cabang'];?>"><font color="#337ab7"><?php echo $data_jumlahsdm['nama_cabang']?></font></a></td>
								<td><?php echo $data_jumlahsdm['tahun']?></td>
                                <td><?php $total1+=$total_kepalagerbangtol;
									echo $total_kepalagerbangtol?></td>
								<td><?php $total2+=$total_kspt;
									echo $total_kspt?></td>
								<td><?php $total3+=$total_kryjasamarga;
									echo $total_kryjasamarga?></td>
								<td><?php $total4+=$total_kryjlj;
									echo $total_kryjlj?></td>
								<td><?php $total5+=$total_kryjlo;
									echo $total_kryjlo?></td>
								<td><?php $total6+=$total_sakitpermanen;
									echo $total_sakitpermanen?></td>
								<td><?php echo $total+=($total_kryjasamarga+$total_kryjlj+ $total_kryjlo+$total_sakitpermanen);
									$total7+=$total;?></td>
								<td><?php $total8+=$total_tugt;
									echo $total_tugt?></td>
							 </tr>
                              <?php }?>
                             <tr>
                                <td colspan='3'>Total</td>
                                <td><?php echo $total1?></td>
                                <td><?php echo $total2?></td>
                                <td><?php echo $total3?></td>
                                <td><?php echo $total4?></td>
                                <td><?php echo $total5?></td>
								<td><?php echo $total6?></td>
                                <td><?php echo $total7?></td>
								<td><?php echo $total8?></td>
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
		
    <!-- Modal Tambah Pengumpul Tol-->
  <div class="modal fade bs-pengumpultol" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Jumlah Pulantol</h4>
      </div>
      <div class="modal-body">
          <form action="tambah_jumlahsdm.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
                <input name= "tahun" type="number" id="tahun" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kpl_gerbangtol">Kepala Gerbang Tol</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idkpl_gerbangtol" type="text" value="5" hidden>
                <input name= "kpl_gerbangtol" type="number" min="0" id="kpl_gerbangtol" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kspt">KSPT</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idkspt" type="text" value="6" hidden>
                <input name= "kspt" type="number" min="0" id="kspt" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kry_jasamarga">Karyawan Jasamarga</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idkry_jasamarga" type="text" value="1" hidden>
                <input name= "kry_jasamarga" type="number" min="0" id="kry_jasamarga" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kry_jlj">Karyawan JLJ</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idkry_jlj" type="text" value="2" hidden>
                <input name= "kry_jlj" type="number" min="0" id="kry_jlj" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kry_jlo">Karyawan JLO</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idkry_jlo" type="text" value="3" hidden>
                <input name= "kry_jlo" type="number" min="0" id="kry_jlo" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sakit_permanen">Sakit Permanen</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idsakit_permanen" type="text" value="4" hidden>
                <input name= "sakit_permanen" type="number" min="0" id="sakit_permanen" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tugt">TUGT</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name= "idtugt" type="text" value="7" hidden>
                <input name= "tugt" type="number" min="0" id="tugt" required="required" class="form-control col-md-7 col-xs-12">
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
  <!-- End of Modal Tambah Pengumpul Tol-->

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
