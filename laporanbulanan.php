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
                <h3>Laporan Bulanan</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Laporan Bulanan Cabang <?php echo $namacabang; ?> </small></h2>
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

                    <button  type="submit" class="btn btn-primary" name="dropdownTahunLaporanBulanan">Lihat</button>
                    <button type="submit" class="btn btn-danger" name="clearTahunLaporanBulanan">Hapus Filter</button>
                  </div>
                  </form>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
						  <div class="btn-group  buttonrightfloat " >
							<button type="button" data-toggle="modal" data-target=".bs-unggah" class="btn btn-primary">Unggah Laporan</button>
						  </div>
                      </div>
                    </div>
                   </div>
                  <div class="x_content">
					<table id="datatable-keytable"  class="table table-striped table-bordered text-center">
						<thead >
						  <tr >
							<th>Nama File</th>
							<th>Tanggal</th>
							<th>Tipe File</th>
							<th>Waktu Unggah</th>
							<th>Unduh File</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						if($nilaiTahun >0 ){
								$laporan = mysqli_query($connect, "SELECT * FROM realisasi_laporan WHERE tahun = '$nilaiTahun'");

						}else{
								$laporan = mysqli_query($connect, "SELECT * FROM realisasi_laporan");

						}
						while($datalaporan = mysqli_fetch_array($laporan)){
						$ambilBulan = $datalaporan['bulan'];
							if($ambilBulan=='1'){
								$bulan= 'Januari';
							}
							if($ambilBulan=='2'){
								$bulan= 'Februari';
							}
							if($ambilBulan=='3'){
								$bulan= 'Maret';
							}
							if($ambilBulan=='4'){
								$bulan= 'April';
							}
							if($ambilBulan=='5'){
								$bulan= 'Mei';
							}
							if($ambilBulan=='6'){
								$bulan= 'Juni';
							}
							if($ambilBulan=='7'){
								$bulan= 'Juli';
							}
							if($ambilBulan=='8'){
								$bulan= 'Agustus';
							}
							if($ambilBulan=='9'){
								$bulan= 'September';
							}
							if($ambilBulan=='10'){
								$bulan= 'Oktober';
							}
							if($ambilBulan=='11'){
								$bulan= 'November';
							}
							if($ambilBulan=='12'){
								$bulan= 'Desember';
							}
						?>
						  <tr>
							<td><?php echo $datalaporan['nama_file']?></td>
							<td><?php echo $bulan; ?> <?php echo $datalaporan['tahun']?></td>
							<td><?php echo $datalaporan['type_file']?></td>
							<td><?php echo $datalaporan['waktu']?></td>
							<td><a href="unduh.php?id_realisasi=<?php echo $datalaporan['id_realisasi'];?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></button></a>
								<button type="button" class="btn btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" data-id-realisasi="<?php echo $datalaporan['id_realisasi'];?>"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
							</td>
						  </tr>
						  <?php } ?>
						</tbody>
					</table>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
        <!-- /page content -->

<!-- Modal Unggah File -->
<div class="modal fade bs-unggah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="myModalLabel">Unggah Laporan</h4>
		</div>
		  <form action="unggah.php" method="post" id="demo-form2" data-parsley-validate enctype="multipart/form-data" class="form-horizontal form-label-left">
			<div class="modal-body">
			  <input name ="idcabang" type="text" id="idcabang" value="<?php echo $idcabang; ?>" hidden>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama File</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input name ="nama" type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Tipe File</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<select required="required" name= "tipe" class="select2_single form-control" tabindex="-1">
						<option value="">---Pilih Tipe File---</option>
						<option value="doc">doc</option>
						<option value="docx">docx</option>
						<option value="pdf">pdf</option>
						<option value="xls">xls</option>
						<option value="xlsx">xlsx</option>
						<option value="ppt">ppt</option>
						<option value="pptx">pptx</option>
					</select>
				</div>
			  </div>
			   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tanggal</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepickerFormPencapaian'>
                            <input type='text' class="form-control" name= "tanggal" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Pilih File</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<input type="file" name="file" id="file">
				</div>
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			  <button type="submit" class="btn btn-primary" id="nama" name="tambah">Simpan</button>
			</div>
		 </form>
	  </div>
	</div>
</div>

<!-- Modal Delete File -->
<div class="modal fade bs-delete-modal" id="modal_deletefile" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="myModalLabel">Delete File</h4>
		</div>
	<form action="editdelete.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
		<div class="modal-body text-center">
		  <div class="alert alert-danger" role="alert">
		  <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
	      <h4> Anda yakin untuk menghapus file ini? </h4>

		  <input name ="id_realisasi" type="text" id="id" value="" hidden>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  <button type="submit" class="btn btn-danger" name ="deletelaporan" >Delete</button>
		</div>
		</form>

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
