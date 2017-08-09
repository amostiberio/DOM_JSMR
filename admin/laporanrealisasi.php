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
                    <h2><i class="fa fa-table"></i> Table <small>Data Beban Cabang <?php echo $namacabang; ?> </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
						  <div class="btn-group  buttonrightfloat " >
							<button type="button" data-toggle="modal" data-target=".bs-unggah" class="btn btn-primary">Set Time Limit Unggah Laporan</button>
						  </div>
                      </div>
                    </div>
                   </div>
                  <div class="x_content">
					<table id="datatable-keytable"  class="table table-striped table-bordered text-center">
						<thead >
						  <tr >
						  	<th>Cabang </th>
							<th>Nama File</th>
							<th>Tahun</th>
							<th>Tipe File</th>
							<th>Waktu Unggah</th>
							<th>Unduh File</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$laporan = mysqli_query($connect, "SELECT * FROM realisasi_laporan");
						while($datalaporan = mysqli_fetch_array($laporan)){
							$id_cabanglaporan = $datalaporan['id_cabang'];
							$datacabang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM cabang WHERE id_cabang='$id_cabanglaporan'"))
						?>
						  <tr>
							<td><?php echo $datacabang['nama_cabang'];?></td>
							<td><?php echo $datalaporan['nama_file']?></td>
							<td><?php echo $datalaporan['tahun']?></td>
							<td><?php echo $datalaporan['type_file']?></td>
							<td><?php echo $datalaporan['waktu']?></td>
							<td><a href="unduh.php?id_realisasi=<?php echo $datalaporan['id_realisasi'];?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></button></a>
								<button type="button" class="btn btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
								data-id-realisasi="<?php echo $datalaporan['id_realisasi'];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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

<!-- Modal Delete File -->
<div class="modal fade bs-delete-modal" id="modal_deletefilerealisasi" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="myModalLabel">Delete Laporan</h4>
		</div>
		<div class="modal-body text-center">
		  <div class="alert alert-danger" role="alert">
		  <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
	      <h4> Anda yakin untuk menghapus laporan ini? </h4>
		</div>
		<h2 style="color:red;"></h2>
	<form action="editdelete.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
	    <input name ="id_realisasi" type="text" id="id" value="" hidden	>
	    </div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  <button type="submit" class="btn btn-danger" name="deletelaporan">Delete</button>
		</div>
	</form>
	  </div>
	</div>
</div>
		
<!-- Modal Unggah File -->
<div class="modal fade bs-unggah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="myModalLabel">Set Time Limit Unggah Laporan Realisasi</h4>
		</div>
		  <form action="lockertanggallaporanrealisasi.php" method="post" id="demo-form2" data-parsley-validate enctype="multipart/form-data" class="form-horizontal form-label-left">
			<div class="modal-body">
			  
			  
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipe">Tipe File</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					  <fieldset>
            <?php $ambilTanggalLocker = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM locker_realisasilaporan WHERE id_locker ='1'"));
                  $startDate = $ambilTanggalLocker['start_unggah'];
                  $endDate = $ambilTanggalLocker['end_unggah'];
                

                  list($yearStart,$monthStart,$dateStart) = explode('-',$startDate);
                  $startRealDate = $monthStart."/".$dateStart."/".$yearStart;


                  list($yearEnd,$monthEnd,$dateEnd) = explode('-',$endDate);
                  $endRealDate = $monthEnd."/".$dateEnd."/".$yearEnd;

            ?>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" style="" name="tanggallocker" id="reservation" class="form-control" value="<?php echo $startRealDate ;?> - <?php echo $endRealDate;?> " />
                                </div>
                              </div>
                            </div>
               		 </fieldset>
				</div>
			  </div>
			  
			  
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			  <button type="submit" class="btn btn-primary" name="prosesTanggalLock">Proses</button>
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

<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
        	autoclose: true,
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
    
                date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>



<!-- /scripts -->
  </body>
</html>