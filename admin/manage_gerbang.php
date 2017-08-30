<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database
if (isset($_GET['id'])){
  $id_cabang = $_GET['id'];
};
  $iduser = $_SESSION['id_user'];

 $resultjs = $connect-> query("SELECT * FROM cabang");


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
                <h3>Management Gerbang</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Gerbang<?php echo $namacabang;?> </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">

                        <li><a data-toggle="modal" data-target=".bs-gerbang">Tambah Gerbang</a></li>


	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered text-center" >
                            <thead >
                                <?php $namaCabang=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM cabang WHERE id_cabang='$id_cabang'"));?>
                                <th>No</th>
                                <th>Cabang <?php echo $namaCabang['nama_cabang']?></th>
                								<th>Aksi</th>


                            </thead>
                            <tbody>
                            <?php
                            $listGerbang = mysqli_query($connect, "SELECT * FROM gerbang WHERE id_cabang='$id_cabang'");
                            $qty=1;
                            while($dataListGerbang = mysqli_fetch_array($listGerbang)){
                                $idGerbang = $dataListGerbang['id_gerbang'];
                                $namaGerbang = $dataListGerbang['nama_gerbang'];



                                ?>
                              <tr >
                                <td><?php echo $qty++; ?></td>
                                <td><?php echo $namaGerbang; ?></td>
                								<td>
                								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal"
                                        data-id-gerbang =  "<?php echo $idGerbang;?>"
                                        data-namagerbang ="<?php echo $namaGerbang; ?>">
                								 Ubah
                								</button>
                                <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal"
                								        data-id-gerbang ="<?php echo $idGerbang; ?>">
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
				<!-- Modal Delete Gerbang -->
 				<div class="modal fade bs-delete-modal" id="modal_deletegerbang" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Gerbang</h4>
              </div>
              <div class="modal-body text-center">
                <form action="edit_gerbang.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                  <div class="alert alert-danger" role="alert">
                    <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
                    <h4> Anda yakin untuk menghapus data gerbang ini? </h4>
                  </div>
                  <h2 style="color:red;"></h2>
                  <input name ="edit_idgerbang" type="text"  required="required" class="form-control col-md-7 col-xs-12" hidden>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" name ="deletegerbang" >Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Modal Delete Gerbang -->

        <!-- Modal Edit Gerbang -->
        <div class="modal fade bs-edit-modal" id="modal_editgerbang" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Gerbang</h4>
              </div>
              <div class="modal-body">
                <form action="edit_gerbang.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <input name ="edit_idgerbang" type="number" id="gerbang" value="" hidden>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Nama Gerbang</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input name ="edit_namagerbang" type="text" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" name ="editgerbang" >Simpan Perubahan</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End of Modal Edit Gerbang -->

          <!-- Modal Tambah Gerbang-->
          <div class="modal fade bs-gerbang" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Tambah Gerbang</h4>
                </div>
                <div class="modal-body">
                  <form action="tambah_gerbang.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programKerja">Gerbang</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name ="gerbang" type="text"  required="required" class="form-control col-md-7 col-xs-12">
                        <input name ="idcabang" type="text" id="idcabang" value="<?php echo $id_cabang; ?>" hidden>
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
          <!-- End ofModal Tambah Gerbang-->





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
