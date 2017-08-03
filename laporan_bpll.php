<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database


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
                <h3>Monitoring Beban</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table" value="<?php echo $idcabang; ?>" hidden></i> Table <small>Data Beban Cabang <?php echo $namacabang; ?> </small></h2>

                    <div class="clearfix"></div>
                  </div>
                
                        
               
                  <div class="title_right">
                    <div class="col-md-12 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonleft" >
                      <div class="btn-group  buttonleftfloat " >
	                    <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Triwulan</h5>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <form action="dropdownproses.php" method="POST">
                            <select name= "dropDownListTW" class="select2_single form-control" tabindex="-1">
                                    <option value="0">Pilih Triwulan</option>                            
                                    <option value="1" <?php if ($nilaiTriwulan =='1') echo 'selected'?>>Triwulan 1</option>
                                    <option value="2" <?php if ($nilaiTriwulan == '2') echo 'selected'?>>Triwulan 2</option>
                                    <option value="3" <?php if ($nilaiTriwulan == '3') echo 'selected'?>>Triwulan 3</option>
                                    <option value="4" <?php if ($nilaiTriwulan == '4') echo 'selected'?>>Triwulan 4</option>                                                    
                            </select>
                            <button type="submit" class="btn btn-primary" name="dropdownTWBPLL">Lihat</button>
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
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Download <span class="caret"></span>
                      </button>
                      <ul role="menu" class="dropdown-menu pull-right">
                        <li><a href="#" onClick="doExport('#datatable-keytable', {type: 'xlsx'});" ><img src='xls.png' alt="XLSX" style="width:20px"> Excels</a>
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
                            <th rowspan="2">Total RKAP </th>
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
                          <tr>
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
							$listTW = mysqli_query($connect, "SELECT * FROM beban_realisasi, sub_program WHERE sub_program.id_sp = beban_realisasi.id_sp AND stat_twrl ='1'  AND sub_program.id_cabang = '$idcabang' AND beban_realisasi.jenis ='bpll' AND sub_program.jenis='beban' ");
							while($datalistTW = mysqli_fetch_array($listTW)){
								$idpklist= $datalistTW['id_pk'];
								$idspklist= $datalistTW['id_sp'];
								$tahun= $datalistTW['tahun'];
								$jmlstakhir = mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
								$jmlrealisasi = mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
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
								$datatwreal1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '1' AND jenis ='bpll'"));
								$datatwreal2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '2' AND jenis ='bpll'"));
								$datatwreal3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '3' AND jenis ='bpll'"));
								$datatwreal4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_realisasi WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrl = '4' AND jenis ='bpll'"));
                                //rkap
                $datatwrc1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '1' AND jenis ='bpll'"));
								$datatwrc2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '2' AND jenis ='bpll'"));
								$datatwrc3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '3' AND jenis ='bpll'"));
								$datatwrc4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM beban_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '4' AND jenis ='bpll'"));
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
                                <td><?php echo $totalrkap; ?></td>
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
			<!-- Modal Tambah Program -->
			<div class="modal fade bs-program" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Program</h4>
					</div>

					<div class="modal-body">
					<form action="tambahprogrambeban.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ma">Nomor MA</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name ="nomorMA"type="text" id="ma" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Program Kerja</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name ="programKerja" type="text" id="programKerja" required="required" class="form-control col-md-7 col-xs-12">
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


			<!-- Modal Tambah Subprogram -->
			<div class="modal fade bs-subprogram" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Subprogram</h4>
					</div>
					<div class="modal-body">
					  <form action="tambahsubprogrambeban.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Program Kerja</label>
							<div class="col-md-6 col-sm-6 col-xs-12">

							  <select name ="idprogramkerja" class="select2_single form-control" tabindex="-1">

								<option></option>
								<?php
                                    $programkerja = mysqli_query($connect, "SELECT * FROM program_kerja WHERE id_cabang ='$idcabang'");
                                    while($dataprogram = mysqli_fetch_array($programkerja)){
                                ?>
								<option  value="<?php echo $dataprogram['id_pk'];?>"><?php echo $dataprogram['nama_pk'];?></option>

								<?php }?>
                                <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>

							  </select>
							</div>
						   </div>

						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subProgram">Subrogram Kerja</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name ="subprogramkerja" type="text" id="subProgram" required="required" class="form-control col-md-7 col-xs-12">
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

			<!-- Modal Tambah Rencana -->
			<div class="modal fade bs-rencana" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Rencana</h4>
					</div>
					<div class="modal-body">
					  <form action="tambahrencanabeban.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						   <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Program Kerja</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="programkerja" id="program-list1" class="select2_single form-control" tabindex="-1">
                                    <option value="">---Pilih Program Kerja---</option>
                                    <?php
                                    if ($resultuntukrencana->num_rows > 0) {
                                        // output data of each row
                                        while($row = $resultuntukrencana->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row["id_pk"]; ?>"><?php echo $row["nama_pk"]; ?></option>
                                    <?php
                                        }
                                    }

                                    ?>
								</select>
							</div>
						   </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subProgram">Subprogram Kerja</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							    <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>
								<select name="subprogram" id="subprogram-list" class="select2_single form-control" tabindex="-1">
									<option>---Pilih Subprogram Kerja---</option>
								</select>
							</div>
						  </div>
					      <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <select name= "tahun" class="select2_single form-control" tabindex="-1">
							    <option value="">---Pilih Tahun---</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
							  </select>
							</div>
						  </div><br>
						  <div class="col-md-6">
							  <h4>Triwulan 1</h4>
							  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input name= "rkap1" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
						  </div>
						  <div class="col-md-6">
							  <h4>Triwulan 2</h4>
							  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input name= "rkap2" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
						  </div>
						  <div class="col-md-6">
							  <h4>Triwulan 3</h4>
							  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input name= "rkap3" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
						  </div>
						  <div class="col-md-6">
							  <h4>Triwulan 4</h4>
							  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input name= "rkap4" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
								</div>
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
								<select name="programkerja" id="program-list2" class="select2_single form-control" tabindex="-1">
										<option value="">---Pilih Program Kerja---</option>
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
								<select name="subprogram" id="subprogram-list2" class="select2_single form-control" tabindex="-1">
									<option>---Pilih Subprogram Kerja---</option>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <select name="tahun" class="select2_single form-control" tabindex="-1">
								<option value="">---Pilih Tahun---</option>
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
  float:left;
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
