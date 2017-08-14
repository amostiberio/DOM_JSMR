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

  $resultuntukrencana = $connect-> query("SELECT * FROM program_kerja WHERE jenis = 'spjt' ");

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
                <h3>Monitoring Capex</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Capex Cabang <?php echo $namacabang; ?> </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <form action="dropdownproses.php" method="POST">
                  <div class='col-sm-10'>                    
                    <div class="form-group col-md-3 col-sm-3 col-xs-12">
                    <h5 class="control-label col-md-4 col-sm-4 col-xs-12" for="tahun">Tahun</h5>
                        <div class='input-group date ' id='myDatepickerFilter'>

                            <input type='text' class="form-control" name= "tahun" <?php if(isset($_GET['tahun'])){ ?> value="<?php echo $nilaiTahun ;?>" <?php } ?>/>
                            <span style="margin-right:10px;" class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                             
                        </div>
                    

                      
                    </div>
                    <button  type="submit" class="btn btn-primary" name="dropdownTahunRencanaSpjt">Lihat</button>
                  </div>
                  </form> 

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
	                      <li><a data-toggle="modal" data-target=".bs-program">Tambah Program</a>
	                      </li>
	                      <li><a data-toggle="modal" data-target=".bs-subprogram" >Tambah Subprogram</a>
	                       </li>
						            <li><a data-toggle="modal" data-target=".bs-rencana" >Tambah Rencana</a>
	                      </li>

	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered text-center">
                            <thead >
                              <tr >
                                <th rowspan="2">Cabang</th>
                                <th rowspan="2">Program Kerja</th>
                                <th rowspan="2">Sub Program Kerja</th>
                                <th rowspan="2">Total RKAP</th>
                                <th rowspan="2">Tahun</th>
                                <th colspan="1">TW 1</th>
                								<th colspan="1">TW 2</th>
                								<th colspan="1">TW 3</th>
                								<th colspan="1">TW 4</th>                								
                								<th rowspan="2">Aksi</th>

                              </tr>
                              <tr>
                                <th>RKAP</th>
                								<th>RKAP</th>
                								<th>RKAP</th>
                								<th>RKAP</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($nilaiTahun > 0 ){
                            $listTW = mysqli_query($connect, "SELECT * FROM capex_rencana, sub_program WHERE sub_program.id_sp = capex_rencana.id_sp AND stat_twrc = '1' AND capex_rencana.jenis ='spjt' AND sub_program.jenis='capex' AND capex_rencana.tahun ='$nilaiTahun' ");


                            }else{
                            $listTW = mysqli_query($connect, "SELECT * FROM capex_rencana, sub_program WHERE sub_program.id_sp = capex_rencana.id_sp AND stat_twrc = '1' AND capex_rencana.jenis ='spjt' AND sub_program.jenis='capex' ");
                            }

    
                            while($datalistTW = mysqli_fetch_array($listTW)){
                                
              								$idpklist = $datalistTW['id_pk'];
              								$idspklist = $datalistTW['id_sp'];
              								$tahun= $datalistTW['tahun'];
              								$jmlrkap = mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun'");
              								$qty= 0;
              								while ($num = mysqli_fetch_array($jmlrkap)) {
              									$qty += $num['rkap'];}
              								$dataprogramkerja = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM program_kerja WHERE id_pk = '$idpklist'"));
              								$datasubprogramkerja= mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sub_program WHERE id_sp = '$idspklist'"));
                              $idcabang= $dataprogramkerja['id_cabang'];
                              $cabang = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM cabang WHERE id_cabang ='$idcabang'"));
                       
              								$datatwrc1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '1'"));
              								$datatwrc2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '2'"));
              								$datatwrc3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '3'"));
              								$datatwrc4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM capex_rencana WHERE id_sp = '$idspklist' AND tahun = '$tahun' AND stat_twrc = '4'"));
                            ?>
                              <tr>
                                <td><?php echo $cabang['nama_cabang']?></td>
                                <td><?php echo $dataprogramkerja['nama_pk'] ?></td>
                                <td><?php echo $datasubprogramkerja['nama_sp'] ?></td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $datalistTW['tahun'] ?></td>
                                <td><?php echo $datatwrc1['rkap'] ?></td>
                                <td><?php echo $datatwrc2['rkap'] ?></td>
                                <td><?php echo $datatwrc3['rkap'] ?></td>
                								<td><?php echo $datatwrc4['rkap'] ?></td>
                								<td>
                								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal" 
                								 data-id-twrc1 ="<?php echo $datatwrc1['id_twrc'];?>" 
                								 data-id-twrc2 ="<?php echo $datatwrc2['id_twrc'];?>" 
                								 data-id-twrc3 ="<?php echo $datatwrc3['id_twrc'];?>" 
                								 data-id-twrc4 ="<?php echo $datatwrc4['id_twrc'];?>"
                								 data-twrc1="<?php echo $datatwrc1['rkap'] ?>" data-twrc2="<?php echo $datatwrc2['rkap'] ?>" data-twrc3="<?php echo $datatwrc3['rkap'] ?>" data-twrc4="<?php echo $datatwrc1['rkap'] ?>">
                								 Edit
                								 </button>																 
                								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
                								 data-id-twrc1 ="<?php echo $datatwrc1['id_twrc'];?>" 
                								 data-id-twrc2 ="<?php echo $datatwrc2['id_twrc'];?>" 
                								 data-id-twrc3 ="<?php echo $datatwrc3['id_twrc'];?>" 
                								 data-id-twrc4 ="<?php echo $datatwrc4['id_twrc'];?>">
                								 Delete
                								 </button>
                								 </td>
                              </tr>
                              <?php } ?>
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

		<!-- Modal Delete Rencana -->
 				<div class="modal fade bs-delete-modal" id="modal_deleterencana" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Delete Rencana</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdatacapex.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" ">
                         <div class="alert alert-danger" role="alert">
          		 				 <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
          								  
          								  <h4> Anda yakin untuk menghapus data rencana ini? </h4>
          						</div>
                          <h2 style="color:red;"></h2>
                          <form action="editdatacapex.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          						    <input name ="editidtwrc1" type="text" id="jenis" value="" hidden>						
          						    <input name ="editidtwrc2" type="text" id="jenis" value="" hidden>
          					      <input name ="editidtwrc3" type="text" id="jenis" value="" hidden>
          					      <input name ="editidtwrc4" type="text" id="jenis" value="" hidden>
						 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger" name ="deleterencanacapex" >Delete</button>
                        </div>
					           	</form>
                      </div>
                    </div>
                  </div>
			<!-- Modal Edit Rencana -->
			 <div class="modal fade bs-edit-modal" id="modal_editrencana" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Rencana</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdatacapex.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                          <h4>Rencana Hanya bisa diedit jika Data Realisasi belum di isi.</h4>
                          <form action="editrencanabeban.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            						  <input name ="editidtwrc1" type="text" id="jenis" value="" hidden >
            						  <input name ="editidtwrc2" type="text" id="jenis" value="" hidden>
            					      <input name ="editidtwrc3" type="text" id="jenis" value="" hidden>
            					      <input name ="editidtwrc4" type="text" id="jenis" value="" hidden>


            						  <div class="col-md-6">
            							  <h4>Triwulan 1</h4>
            							  <div class="form-group">
            								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
            								<div class="col-md-6 col-sm-6 col-xs-12">
            								  <input value ="" name= "edittwrc1" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
            								</div>
            							  </div>
            						  </div>
            						  <div class="col-md-6">
            							  <h4>Triwulan 2</h4>
            							  <div class="form-group">
            								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
            								<div class="col-md-6 col-sm-6 col-xs-12">
            								  <input value ="" name= "edittwrc2" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
            								</div>
            							  </div>
            						  </div>
            						  <div class="col-md-6">
            							  <h4>Triwulan 3</h4>
            							  <div class="form-group">
            								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
            								<div class="col-md-6 col-sm-6 col-xs-12">
            								  <input value ="" name= "edittwrc3" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
            								</div>
            							  </div>
            						  </div>
            						  <div class="col-md-6">
            							  <h4>Triwulan 4</h4>
            							  <div class="form-group">
            								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rkap">RKAP</label>
            								<div class="col-md-6 col-sm-6 col-xs-12">
            								  <input value ="" name= "edittwrc4" type="number" min="0" id="rkap" required="required" class="form-control col-md-7 col-xs-12">
            								</div>
            							  </div>
            						  </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name ="editrencanacapex" >Save changes</button>
                        </div>
						          </form>
                      </div>
                    </div>
                  </div>
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
					<form action="tambahprogramcapex.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                     
              <input name ="jenis" type="text" id="jenis" value="spjt" hidden>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Cabang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <select name ="idcabang" class="select2_single form-control" tabindex="-1" required="required">

                    <option></option>
                    <?php
                          $dataCabang = mysqli_query($connect, "SELECT * FROM cabang");
                           while($ambilDataCabang = mysqli_fetch_array($dataCabang)){
                                    ?>
                                   <option  value="<?php echo $ambilDataCabang['id_cabang'];?>"><?php echo $ambilDataCabang['nama_cabang'];?>                                             
                                   </option>

                    <?php }?>
                              

                    </select>
                  </div>
                </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ma">Nomor MA</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input name ="nomorMA" type="text" id="ma" required="required" class="form-control col-md-7 col-xs-12">
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
					  <form action="tambahsubprogramcapex.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Nama Cabang</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <select name ="idcabang" id="list-cabangspjt1" class="select2_single form-control" tabindex="-1" required="required">

                            <option value=""> Pilih Cabang</option>
                            <?php
                                  $dataCabang = mysqli_query($connect, "SELECT * FROM cabang");
                                   while($ambilDataCabang = mysqli_fetch_array($dataCabang)){
                                            ?>
                                           <option  value="<?php echo $ambilDataCabang['id_cabang'];?>"><?php echo $ambilDataCabang['nama_cabang'];?>                                             
                                           </option>

                            <?php }?>
                                      

                            </select>
                          </div>
                        </div>
        						  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Program Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name ="idprogramkerja" id="program-listsemua1" class="select2_single form-control" tabindex="-1" required="required">

                               <option>Pilih Program Kerja</option>
                              

                              </select>
                           </div>
                         </div>

      						  <div class="form-group">
      							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subProgram">Subrogram Kerja</label>
      							<div class="col-md-6 col-sm-6 col-xs-12">
      							  <input name ="subprogramkerja" type="text" id="subProgram" required="required" class="form-control col-md-7 col-xs-12" required="required">
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
					  <form action="tambahrencanacapex.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Nama Cabang</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <select name ="idcabang" id="list-cabangspjt2" class="select2_single form-control" tabindex="-1" required="required">

                            <option value=""> Pilih Cabang</option>
                            <?php
                                  $dataCabang = mysqli_query($connect, "SELECT * FROM cabang");
                                   while($ambilDataCabang = mysqli_fetch_array($dataCabang)){
                                            ?>
                                           <option  value="<?php echo $ambilDataCabang['id_cabang'];?>"><?php echo $ambilDataCabang['nama_cabang'];?>                                             
                                           </option>

                            <?php }?>
                                      

                            </select>
                          </div>
                        </div>
                     <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Program Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <select name ="programkerja" id="program-listsemua2" class="select2_single form-control" tabindex="-1" required="required">

                               <option>Pilih Program Kerja</option>
                              

                              </select>
                           </div>
                         </div>
              
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subProgram">Subprogram Kerja</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name ="jenis" type="text" id="jenis" value="bpt" hidden>
                          
                        <select required="required" name="subprogram" id="subprogram-list" class="select2_single form-control" tabindex="-1">
                          <option>Pilih Subprogram Kerja</option>
                        </select>
                      </div>
                      </div>
				     		 <input name ="jenis" type="text" id="jenis" value="spjt" hidden>

						  
					      <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='myDatepickerFormMonitoring'>
                                    <input type='text' class="form-control" name= "tahun"  />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                </div>
                          </div>


                          <br>
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
