<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

  if(isset($_GET['tahun'])){
    $nilaiTahun = $_GET['tahun'];
  }else $nilaiTahun = '0';
  
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
                <h3>Jumlah Gardu Cabang <?php echo $data_cabang['nama_cabang']?></h3>
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
				  <form action="dropdownproses.php" method="POST">
                  <div class='col-sm-2'>                    
                    <div class="form-group">
                        <div class='input-group date' id='myDatepickerFilter'>
                            <input type='text' class="form-control" name= "tahun" <?php if(isset($_GET['tahun'])){ ?> value="<?php echo $nilaiTahun ;?>" <?php } ?>/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
					<input type='hidden' value=<?php echo $getidcabang; ?> name ="id_cabang">
                  </div>
                  <button type="submit" class="btn btn-primary" name="dropdownTahunGardu1">Lihat</button>
				  <button type="submit" class="btn btn-danger" name="clearTahunGardu1">Hapus Filter</button>
                  </form>
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >

                              <tr >
                                <th rowspan="3">No</th>
                                <th rowspan="3">Gerbang</th>
								<th rowspan="3">Tahun</th>
								<th rowspan="3">TW</th>
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
							  if($nilaiTahun >0){
                                $jmlgardu = mysqli_query($connect, "SELECT * FROM jml_gardutersedia join gerbang on gerbang.id_gerbang=jml_gardutersedia.id_gerbang WHERE jml_gardutersedia.tahun='$nilaiTahun' AND jml_gardutersedia.id_cabang='$getidcabang' group by jml_gardutersedia.tahun, jml_gardutersedia.id_gerbang");
								  
							  }else{
                                $jmlgardu = mysqli_query($connect, "SELECT * FROM jml_gardutersedia join gerbang on gerbang.id_gerbang=jml_gardutersedia.id_gerbang WHERE jml_gardutersedia.id_cabang='$getidcabang' group by jml_gardutersedia.tahun, jml_gardutersedia.id_gerbang");								  
							  }
                                $nomor = 1;
                                while($data_jmlgardu = mysqli_fetch_array($jmlgardu)){
                                   $idgerbanglist = $data_jmlgardu['id_gerbang'];
                                   $idsubgardulist = $data_jmlgardu['id_subgardu'];
								   $tahun = $data_jmlgardu['tahun'];
								   $tw = $data_jmlgardu['tw'];

                                   //fething data dari tabel gerbang
                                   $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));

                                  //fetching data untuk tabel bagian jumlah gardu tersedia1
                                  $data_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND tw='1' GROUP BY tw"));
                                  $data_gerbang_terbuka_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '1' AND tw='1'"));
                                  $data_gerbang_masuk_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '2' AND tw='1'"));
                                  $data_gerbang_keluar_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '3' AND tw='1'"));
                                  $data_gerbang_terbuka_gto_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '4' AND tw='1'"));
                                  $data_gerbang_masuk_gto_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '5' AND tw='1'"));
                                  $data_gerbang_keluar_gto_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '6' AND tw='1'"));
                                  $data_epass_tersedia1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '8' AND tw='1'"));
								  
								  //fetching data untuk tabel bagian jumlah gardu tersedia2
                                  $data_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND tw='2' GROUP BY tw"));
								  $data_gerbang_terbuka_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '1' AND tw='2'"));
                                  $data_gerbang_masuk_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '2' AND tw='2'"));
                                  $data_gerbang_keluar_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '3' AND tw='2'"));
                                  $data_gerbang_terbuka_gto_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '4' AND tw='2'"));
                                  $data_gerbang_masuk_gto_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '5' AND tw='2'"));
                                  $data_gerbang_keluar_gto_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '6' AND tw='2'"));
                                  $data_epass_tersedia2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '8' AND tw='2'"));
								  
								  //fetching data untuk tabel bagian jumlah gardu tersedia3
                                  $data_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND tw='3' GROUP BY tw"));
								  $data_gerbang_terbuka_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '1' AND tw= '3'"));
                                  $data_gerbang_masuk_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '2' AND tw='3'"));
                                  $data_gerbang_keluar_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '3' AND tw='3'"));
                                  $data_gerbang_terbuka_gto_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '4' AND tw='3'"));
                                  $data_gerbang_masuk_gto_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '5' AND tw='3'"));
                                  $data_gerbang_keluar_gto_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '6' AND tw='3'"));
                                  $data_epass_tersedia3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '8' AND tw='3'"));
								  
								  //fetching data untuk tabel bagian jumlah gardu tersedia4
                                  $data_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND tw='4' GROUP BY tw"));
								  $data_gerbang_terbuka_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '1' AND tw='4'"));
                                  $data_gerbang_masuk_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '2' AND tw='4'"));
                                  $data_gerbang_keluar_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '3' AND tw='4'"));
                                  $data_gerbang_terbuka_gto_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '4' AND tw='4'"));
                                  $data_gerbang_masuk_gto_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '5' AND tw='4'"));
                                  $data_gerbang_keluar_gto_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '6' AND tw='4'"));
                                  $data_epass_tersedia4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia WHERE tahun='$tahun' AND id_gerbang = '$idgerbanglist' AND id_subgardu = '8' AND tw='4'"));
							?>
							<tr>
                                <td rowspan="4"><?php echo $nomor; $nomor++?></td>
                                <td rowspan="4"><?php echo $data_gerbang['nama_gerbang']?></td>
								<td rowspan="4"><?php echo $data_jmlgardu['tahun'];?></td>
								<td><?php if(isset($data_gerbang_keluar_tersedia1)){?>1 <?php }?></td>
                                <td><?php echo $data_gerbang_keluar_tersedia1['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tersedia1['nilai']?></td>
                                <td><?php echo $data_gerbang_terbuka_tersedia1['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_tersedia1['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tersedia1['nilai']?></td>
								<td><?php echo $data_gerbang_terbuka_gto_tersedia1['nilai']?></td>
                                <td><?php echo $data_epass_tersedia1['nilai']?></td>
								<td>
								<?php if(isset($data_gerbang_keluar_tersedia1)){?>
								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw1['tw']?>"
								 data-data1="<?php echo $data_gerbang_terbuka_tersedia1['nilai']?>"
                                 data-data2="<?php echo $data_gerbang_masuk_tersedia1['nilai']?>"
                                 data-data3="<?php echo $data_gerbang_keluar_tersedia1['nilai']?>"
                                 data-data4="<?php echo $data_gerbang_terbuka_gto_tersedia1['nilai']?>"
                                 data-data5="<?php echo $data_gerbang_masuk_gto_tersedia1['nilai']?>"
								 data-data6="<?php echo $data_gerbang_keluar_gto_tersedia1['nilai']?>"
                                 data-data7="<?php echo $data_epass_tersedia1['nilai']?>">Ubah</button>																 
								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw1['tw']?>">Hapus</button>
								 <?php }?>
								 </td>
                              </tr>
							  <tr>
								<td><?php if(isset($data_gerbang_keluar_tersedia2)){?>2 <?php }?></td>
                                <td><?php echo $data_gerbang_keluar_tersedia2['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tersedia2['nilai']?></td>
                                <td><?php echo $data_gerbang_terbuka_tersedia2['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_tersedia2['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tersedia2['nilai']?></td>
								<td><?php echo $data_gerbang_terbuka_gto_tersedia2['nilai']?></td>
                                <td><?php echo $data_epass_tersedia2['nilai']?></td>
								<td>
								<?php if(isset($data_gerbang_keluar_tersedia2)){?>
								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw2['tw']?>"
								 data-data1="<?php echo $data_gerbang_terbuka_tersedia2['nilai']?>"
                                 data-data2="<?php echo $data_gerbang_masuk_tersedia2['nilai']?>"
                                 data-data3="<?php echo $data_gerbang_keluar_tersedia2['nilai']?>"
                                 data-data4="<?php echo $data_gerbang_terbuka_gto_tersedia2['nilai']?>"
                                 data-data5="<?php echo $data_gerbang_masuk_gto_tersedia2['nilai']?>"
								 data-data6="<?php echo $data_gerbang_keluar_gto_tersedia2['nilai']?>"
                                 data-data7="<?php echo $data_epass_tersedia2['nilai']?>">Ubah</button>																 
								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw2['tw']?>">Hapus</button>	
								 <?php }?>
								 </td>
                              </tr>
							  <tr>
								<td><?php if(isset($data_gerbang_keluar_tersedia3)){?>3 <?php }?></td>
                                <td><?php echo $data_gerbang_keluar_tersedia3['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tersedia3['nilai']?></td>
                                <td><?php echo $data_gerbang_terbuka_tersedia3['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_tersedia3['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tersedia3['nilai']?></td>
								<td><?php echo $data_gerbang_terbuka_gto_tersedia3['nilai']?></td>
                                <td><?php echo $data_epass_tersedia3['nilai']?></td>
								<td>
								<?php if(isset($data_gerbang_keluar_tersedia3)){?>
								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw3['tw']?>"
								 data-data1="<?php echo $data_gerbang_terbuka_tersedia3['nilai']?>"
                                 data-data2="<?php echo $data_gerbang_masuk_tersedia3['nilai']?>"
                                 data-data3="<?php echo $data_gerbang_keluar_tersedia3['nilai']?>"
                                 data-data4="<?php echo $data_gerbang_terbuka_gto_tersedia3['nilai']?>"
                                 data-data5="<?php echo $data_gerbang_masuk_gto_tersedia3['nilai']?>"
								 data-data6="<?php echo $data_gerbang_keluar_gto_tersedia3['nilai']?>"
                                 data-data7="<?php echo $data_epass_tersedia3['nilai']?>">Ubah</button>																 
								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw3['tw']?>">Hapus</button>
								 <?php }?>
								 </td>
                              </tr>
							  <tr>
								<td><?php if(isset($data_gerbang_keluar_tersedia4)){?>4 <?php }?></td>
                                <td><?php echo $data_gerbang_keluar_tersedia4['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tersedia4['nilai']?></td>
                                <td><?php echo $data_gerbang_terbuka_tersedia4['nilai']?></td>
                                <td><?php echo $data_gerbang_keluar_gto_tersedia4['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tersedia4['nilai']?></td>
								<td><?php echo $data_gerbang_terbuka_gto_tersedia4['nilai']?></td>
                                <td><?php echo $data_epass_tersedia4['nilai']?></td>
								<td>
								<?php if(isset($data_gerbang_keluar_tersedia4)){?>
								<button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw4['tw']?>"
								 data-data1="<?php echo $data_gerbang_terbuka_tersedia4['nilai']?>"
                                 data-data2="<?php echo $data_gerbang_masuk_tersedia4['nilai']?>"
                                 data-data3="<?php echo $data_gerbang_keluar_tersedia4['nilai']?>"
                                 data-data4="<?php echo $data_gerbang_terbuka_gto_tersedia4['nilai']?>"
                                 data-data5="<?php echo $data_gerbang_masuk_gto_tersedia4['nilai']?>"
								 data-data6="<?php echo $data_gerbang_keluar_gto_tersedia4['nilai']?>"
                                 data-data7="<?php echo $data_epass_tersedia4['nilai']?>">Ubah</button>																 
								 <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modal" 
								 data-id-gerbang ="<?php echo $data_gerbang['id_gerbang']?>"
								 data-tahun ="<?php echo $data_jmlgardu['tahun']?>"
								 data-tw ="<?php echo $data_tw4['tw']?>">Hapus</button>	
								 <?php }?>
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
                          <h4 class="modal-title" id="myModalLabel">Hapus Rencana</h4>
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
							  <input name="tw" type="text" id="tw" value="" hidden>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger" name ="deletejg" >Hapus</button>
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
                          <h4 class="modal-title" id="myModalLabel">Ubah Rencana</h4>
                        </div>
                        <div class="modal-body">
                        <form action="editdelete.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
							  <input name="idgerbang" type="text" id="id" value="" hidden>					  
							  <input name="tahun" type="text" id="tahun" value="" hidden>
							  <input name="tw" type="text" id="tw" value="" hidden>
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
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary" name ="editjg" >Simpan</button>
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
