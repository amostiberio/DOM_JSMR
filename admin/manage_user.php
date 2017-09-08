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

  $resultuntukrencana = $connect-> query("SELECT * FROM program_kerja WHERE jenis = 'bpt' ");

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
                <h3>Management User Cabang</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data User dari Semua Cabang </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
                        <li><a data-toggle="modal" data-target=".bs-user" >Tambah User</a>
                        </li>



	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered text-center" >
                            <thead >

                                <th>Cabang</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Jumlah Program Kerja</th>
                								<th>Aksi</th>


                            </thead>
                            <tbody>
                            <?php
                            $listUser = mysqli_query($connect, "SELECT * FROM user ");
                            while($dataListUser = mysqli_fetch_array($listUser)){
                                $idUserCabang = $dataListUser['id_user'];
                                $idUserRole = $dataListUser['id_role'];
                                $idCabangUser = $dataListUser['id_cabang'];

                                $userDataCabang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM cabang WHERE id_cabang = '$idCabangUser'"));

                								$namaCabangUser = $userDataCabang['nama_cabang'];
                                if(!isset($namaCabangUser)){
                                    $namaCabangUser = 'All';
                                }
                                $userName = $dataListUser['username'];
                                $password = $dataListUser['password'];

                                $userRole = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM user_role WHERE id_role ='$idUserRole' "));
                                $totalPK = mysqli_fetch_row(mysqli_query($connect,"SELECT * FROM program_kerja WHERE id_cabang ='$idCabangUser'"));
                                if(!isset($totalPK)){
                                    $totalPK = '0';
                                }
                                ?>
                              <tr >
                                <td><?php echo $namaCabangUser; ?></td>
                                <td><?php echo $userName; ?></td>
                                <td><?php echo $userRole['role']; ?></td>
                                <td><?php echo $totalPK[0]; ?></td>
                								<td>
                								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal"
                								data-username ="<?php echo $userName; ?>"
                							  data-password ="<?php echo $password; ?>"
                								 >
                								 Ubah
                								 </button>
                								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal"
                                 data-id-user = "<?php echo $idUserCabang;?>"
                								>
                								 Hapus
                								 </button>
                								 </td>
                              </tr>
                              <?php
                                  }
                              ?>
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
				<!-- Modal Delete User -->
 				<div class="modal fade bs-delete-modal" id="modal_deleteUser" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Hapus Rencana</h4>
                        </div>
                        <div class="modal-body text-center">
                        <form action="editdataUser.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" ">
                         <div class="alert alert-danger" role="alert">
		 				               <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>

								              <h4> Anda yakin untuk menghapus data rencana ini? </h4>
						              </div>
                          <h2 style="color:red;"></h2>
                          <input name ="idUserCabang" type="text"  required="required" class="form-control col-md-7 col-xs-12" hidden>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger" name ="deleteUser" >Hapus</button>
                        </div>
						            </form>
                      </div>
                    </div>
                  </div>
			<!-- Modal Edit User -->
			 <div class="modal fade bs-edit-modal" id="modal_EditUser" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Ubah Data User</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdataUser.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ma">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name ="Username" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>

                        </div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name ="Password" type="text"  required="required" class="form-control col-md-7 col-xs-12" hidden>
                          </div>
                        </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" name ="editUser" >Save changes</button>
                        </div>
						          </form>
                      </div>
                    </div>
                  </div>
			<!-- Modal Tambah User -->
			<div class="modal fade bs-user" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
					</div>

				    <div class="modal-body">
					       <form action="tambahuser.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Role</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <select name ="idRole" id="listUserRole" class="select2_single form-control" tabindex="-1" required="required">

                            <option value=''>Pilih Role</option>
                            <?php
                                  $dataRole = mysqli_query($connect, "SELECT * FROM user_role");
                                   while($ambilDataRole = mysqli_fetch_array($dataRole)){
                                            ?>
                                           <option  value="<?php echo $ambilDataRole['id_role'];?>"><?php echo $ambilDataRole['role'];?>
                                           </option>

                            <?php }?>


                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Cabang</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <select name ="idCabang" id="cabangUserRole" class="select2_single form-control" tabindex="-1" required="required">

                            <option value='' >Pilih Cabang</option>
                            <option value='0' >All (only Admin)</option>
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
          							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ma">Username</label>
          							<div class="col-md-6 col-sm-6 col-xs-12">
          							  <input name ="Username" type="text" required="required" class="form-control col-md-7 col-xs-12">
          							</div>

          						  </div>
          						  <div class="form-group">
          							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Password</label>
            							<div class="col-md-6 col-sm-6 col-xs-12">
            							  <input name ="Password" type="text"  required="required" class="form-control col-md-7 col-xs-12">
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




			<!-- Modal Tambah Cabang -->
      <div class="modal fade bs-cabang" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Tambah Cabang</h4>
          </div>

            <div class="modal-body">
                 <form action="tambahcabang.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Cabang</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name ="Cabang" type="text"  required="required" class="form-control col-md-7 col-xs-12">
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
