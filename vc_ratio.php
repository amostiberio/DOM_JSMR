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

  $resultuntukrencana = $connect-> query("SELECT * FROM program_kerja WHERE id_cabang = '$idcabang' AND jenis = 'bpt' ");

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
                <h3>VC Ratio Cabang<?php echo $namacabang; ?></h3>
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
                   </div>
                  <div class="x_content">
                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead>
                              <tr >
                                <th rowspan="3">No</th>
                                <th rowspan="3">Gerbang</th>
								<th rowspan="3">Tahun</th>
                                <th colspan="7">Lalu Lintas Transaksi Tinggi</th>
                                <th colspan="7">Jumlah Gardu Tersedia</th>
                              </tr>
                              <tr>
                                <th colspan="3">Reguler</th>
								<th colspan="3">GTO</th>
                                <th rowspan="2">E-Pass</th>
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
                                $vcratio = mysqli_query($connect, "SELECT * FROM transaksi_tinggi join jml_gardutersedia join gerbang on gerbang.id_gerbang=transaksi_tinggi.id_gerbang AND gerbang.id_gerbang=jml_gardutersedia.id_gerbang WHERE transaksi_tinggi.id_cabang = '$idcabang' AND jml_gardutersedia.id_cabang='$idcabang' AND transaksi_tinggi.tahun=jml_gardutersedia.tahun group by transaksi_tinggi.tahun, transaksi_tinggi.id_gerbang");
                                $nomor = 1; $total1 =0; $total2 =0; $total3 =0; $total4 =0; $total5 =0; $total6 =0; $total7 =0; 
								$total8 =0; $total9 =0; $total10 =0; $total11 =0; $total12 =0; $total13 =0; $total14 =0;
                                while($data_vcratio = mysqli_fetch_array($vcratio)){
                                   $idgerbanglist = $data_vcratio['id_gerbang'];
                                   $idsubgardulist = $data_vcratio['id_subgardu'];
								   $tahun = $data_vcratio['tahun'];

                                   //fething data dari tabel gerbang
                                   $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));

                                  //fetching data untuk tabel bagian lalin transaksi tinggi
                                   $data_gerbang_terbuka_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                   $data_gerbang_masuk_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                   $data_gerbang_keluar_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                   $data_gerbang_terbuka_gto_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                                   $data_gerbang_masuk_gto_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                   $data_gerbang_keluar_gto_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                   $data_epass_lalin = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM transaksi_tinggi, jenis_subgardu WHERE tahun='$tahun' AND transaksi_tinggi.id_gerbang = '$idgerbanglist' AND transaksi_tinggi.id_subgardu = '7' AND jenis_subgardu.id_jenisgardu='3'"));

                                  //fetching data untuk tabel bagian jumlah gardu tersedia
                                  $data_gerbang_terbuka_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                  $data_gerbang_masuk_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                  $data_gerbang_keluar_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                  $data_gerbang_terbuka_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                                  $data_gerbang_masuk_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                  $data_gerbang_keluar_gto_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                  $data_epass_tersedia = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jml_gardutersedia, jenis_subgardu WHERE tahun='$tahun' AND jml_gardutersedia.id_gerbang = '$idgerbanglist' AND jml_gardutersedia.id_subgardu = '8' AND jenis_subgardu.id_jenisgardu='3'"));
                            ?>
                              <tr>
                                <td><?php echo $nomor; $nomor++?></td>
								<td><?php echo $data_vcratio['nama_gerbang']?></td>
								<td><?php echo $data_vcratio['tahun'];?></td>
								<td><?php $total1+=$data_gerbang_keluar_lalin['nilai'];
									echo $data_gerbang_keluar_lalin['nilai']?></td>
                                <td><?php $total2+=$data_gerbang_masuk_lalin['nilai'];
									echo $data_gerbang_masuk_lalin['nilai']?></td>
                                <td><?php $total3+=$data_gerbang_terbuka_lalin['nilai'];
									echo $data_gerbang_terbuka_lalin['nilai']?></td>
                                <td><?php $total4+=$data_gerbang_keluar_gto_lalin['nilai'];
									echo $data_gerbang_keluar_gto_lalin['nilai']?></td>
                                <td><?php $total5+=$data_gerbang_masuk_gto_lalin['nilai'];
									echo $data_gerbang_masuk_gto_lalin['nilai']?></td>
								<td><?php $total6+=$data_gerbang_terbuka_gto_lalin['nilai'];
									echo $data_gerbang_terbuka_gto_lalin['nilai']?></td>
                                <td><?php $total7+=$data_epass_lalin['nilai'];
									echo $data_epass_lalin['nilai']?></td>
                                <td><?php $total8+=$data_gerbang_keluar_tersedia['nilai'];
									echo $data_gerbang_keluar_tersedia['nilai'];?></td>
                                <td><?php $total9+=$data_gerbang_masuk_tersedia['nilai'];
									echo $data_gerbang_masuk_tersedia['nilai']?></td>
                                <td><?php $total10+=$data_gerbang_terbuka_tersedia['nilai'];
									echo $data_gerbang_terbuka_tersedia['nilai']?></td>
                                <td><?php $total11+=$data_gerbang_keluar_gto_tersedia['nilai'];
									echo $data_gerbang_keluar_gto_tersedia['nilai']?></td>
                                <td><?php $total12+=$data_gerbang_masuk_gto_tersedia['nilai'];
									echo $data_gerbang_masuk_gto_tersedia['nilai']?></td>
								<td><?php $total13+=$data_gerbang_terbuka_gto_tersedia['nilai'];
									echo $data_gerbang_terbuka_gto_tersedia['nilai']?></td>
                                <td><?php $total14+=$data_epass_tersedia['nilai'];
									echo $data_epass_tersedia['nilai']?></td>
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
							<td><?php echo $total9?></td>
							<td><?php echo $total10?></td>
							<td><?php echo $total11?></td>
							<td><?php echo $total12?></td>
							<td><?php echo $total13?></td>
							<td><?php echo $total14?></td>
						  </tr>
						</tbody>
                  </div>
                </div>
              </div>



              <div class="clearfix"></div>



            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->

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
