<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

  $id_cabang = $_GET['id'];
  $cabang =  mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM cabang WHERE id_cabang = '$id_cabang'"));

  $namacabang = $cabang['nama_cabang'];

  $resultjs = $connect-> query("SELECT * FROM semester");

  $iduser = $_SESSION['id_user'];

  //ambil informasi user id dan cabang id dari table cabang


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
                <h3>Laporan KPI</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Waktu Transaksi Cabang <?php echo $namacabang; ?> </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                      <div class="btn-group  buttonrightfloat " >
	                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span>
	                    </button>
	                    <ul role="menu" class="dropdown-menu pull-right">
						                <li><a data-toggle="modal" data-target=".bs-rencana" >Tambah Waktu Transaksi</a></li>
	                    </ul>
	                    </div>

                      </div>
                    </div>
                   </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                              <tr >
                                <th rowspan="4">No</th>
                                <th rowspan="4">Gerbang</th>
                                <th rowspan="4">Tahun</th>
                                <th rowspan="4">Semester</th>
                                <th rowspan="4">Tri Wulan</th>
                                <!-- Gardu REGULER -->
                                <th colspan="3">Rata-rata Waktu Transaksi</th>
                                <!-- Gardu GTO -->
                                <th colspan="3">Rata-rata Waktu Transaksi</th>
								                <th rowspan="4">Panjang Antrian</th>
                                <th rowspan="4">Aksi</th>
                              </tr>
                              <tr>
                                <th colspan="3">Gardu Reguler</th>
								                <th colspan="3">Gardu GTO</th>
                              </tr>
                              <tr>
                                <!-- Gardu Reguler -->
                                <th rowspan="2">Gardu Terbuka</th>
                                <th colspan="2">Gardu Tertutup</th>
                                <!-- Gardu GTO-->
                                <th rowspan="2">Gardu Terbuka</th>
                                <th colspan="2">Gardu Tertutup</th>
                              </tr>
                              <tr>
                                <!-- Gardu Reguler -->
                                <th colspan="1">Gardu Masuk</th>
								                <th colspan="1">Gardu Keluar</th>
                                <!-- Gardu GTO -->
                                <th colspan="1">Gardu Masuk</th>
								                <th colspan="1">Gardu Keluar</th>
                              </tr>

                            </thead>
                            <tbody>
                            <?php
                            $rata_waktu_transaksi = mysqli_query($connect, "SELECT * FROM waktu_transaksi join panjang_antrian join triwulan join semester join gerbang on gerbang.id_gerbang=waktu_transaksi.id_gerbang AND gerbang.id_gerbang=panjang_antrian.id_gerbang AND triwulan.id_tw=waktu_transaksi.id_tw  AND triwulan.id_tw=panjang_antrian.id_tw
                                                                            AND waktu_transaksi.id_semester=semester.id_semester AND semester.id_semester=panjang_antrian.id_semester WHERE waktu_transaksi.id_cabang = '$id_cabang' group by waktu_transaksi.id_gerbang");
                            $nomor = 1;
                            while($data_waktu_transaksi = mysqli_fetch_array($rata_waktu_transaksi)){

								            $idgerbanglist = $data_waktu_transaksi['id_gerbang'];
								            $idsubgardulist = $data_waktu_transaksi['id_subgardu'];
                            $idsemesterlist = $data_waktu_transaksi['id_semester'];

								            $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));
                            $data_semester1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '1'"));
                            $data_semester2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '2'"));
                            $data_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM triwulan WHERE id_tw = '1'"));
                            $data_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM triwulan WHERE id_tw = '2'"));
                            $data_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM triwulan WHERE id_tw = '3'"));
                            $data_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM triwulan WHERE id_tw = '4'"));


                            $data_tahun= mysqli_fetch_array(mysqli_query($connect, "SELECT tahun from waktu_transaksi where id_gerbang = '$idgerbanglist'"));

                //ambil data semester 1
                //tw 1
								$data_gerbang_terbuka_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='1'"));
                $data_gerbang_masuk_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='1'"));
                $data_gerbang_keluar_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='1'"));
                $data_gerbang_terbuka_gto_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='1'"));
								$data_gerbang_masuk_gto_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='1'"));
                $data_gerbang_keluar_gto_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='1'"));
                $data_panjang_antrian_tw1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM panjang_antrian WHERE id_gerbang = '$idgerbanglist' AND id_semester='1' AND id_tw ='1'"));
                //tw 2
                $data_gerbang_terbuka_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='2'"));
                $data_gerbang_masuk_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='2'"));
                $data_gerbang_keluar_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='2'"));
                $data_gerbang_terbuka_gto_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='2'"));
								$data_gerbang_masuk_gto_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='2'"));
                $data_gerbang_keluar_gto_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='2'"));
                $data_panjang_antrian_tw2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM panjang_antrian WHERE id_gerbang = '$idgerbanglist' AND id_semester='1' AND id_tw ='2'"));

                //ambil semester 2
                #tw 3
                $data_gerbang_masuk2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='3'"));
                $data_gerbang_terbuka2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2' AND waktu_transaksi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='3'"));
                $data_gerbang_keluar2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='3'"));
                $data_gerbang_terbuka_gto2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='3'"));
								$data_gerbang_masuk_gto2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='3'"));
                $data_gerbang_keluar_gto2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2' AND waktu_transaksi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='3'"));
                $data_panjang_antrian2_tw3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM panjang_antrian WHERE id_gerbang = '$idgerbanglist' AND id_semester='2' AND id_tw ='3' "));
                #tw 4
                $data_gerbang_masuk2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='4'"));
                $data_gerbang_terbuka2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2' AND waktu_transaksi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='4'"));
                $data_gerbang_keluar2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1' AND id_tw ='4'"));
                $data_gerbang_terbuka_gto2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='4'"));
								$data_gerbang_masuk_gto2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='4'"));
                $data_gerbang_keluar_gto2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2' AND waktu_transaksi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2' AND id_tw ='4'"));
                $data_panjang_antrian2_tw4 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM panjang_antrian WHERE id_gerbang = '$idgerbanglist' AND id_semester='2' AND id_tw ='4' "))
                            ?>
                              <tr rowspan="4">
                                <td rowspan="4"><?php echo $nomor; $nomor++?></td>
                                <td rowspan="4"><?php echo $data_gerbang['nama_gerbang'] ?></td>
                                <td rowspan="4"><?php echo $data_tahun['tahun']?></td>
                                <td rowspan="2"><?php echo $data_semester1['semester']?></td>
                                <td><?php echo $data_tw1['triwulan']?></td>
                                <td><?php echo $data_gerbang_terbuka_tw1['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tw1['nilai'] ?></td>
                                <td><?php echo $data_gerbang_keluar_tw1['nilai'] ?></td>
                                <td><?php echo $data_gerbang_terbuka_gto_tw1['nilai'] ?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tw1['nilai'] ?></td>
								                <td><?php echo $data_gerbang_keluar_gto_tw1['nilai'] ?></td>
                                <td><?php echo $data_panjang_antrian_tw1['panjang_antrian']?></td>
                                <td>
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modals1tw1"
                  								 data-id-gerbangterbuka-s1 ="<?php echo $data_gerbang_terbuka_tw1['id_waktutrans'];?>"
                  								 data-id-gerbangmasuk-s1 ="<?php echo $data_gerbang_masuk_tw1['id_waktutrans'];?>"
                  								 data-id-gerbangkeluar-s1 ="<?php echo $data_gerbang_keluar_tw1['id_waktutrans'];?>"
                  								 data-id-gerbangterbukagto-s1 ="<?php echo $data_gerbang_terbuka_gto_tw1['id_waktutrans'];?>"
                                   data-id-gerbangmasukgto-s1 ="<?php echo $data_gerbang_masuk_gto_tw1['id_waktutrans'];?>"
                                   data-id-gerbangkeluargto-s1 ="<?php echo $data_gerbang_keluar_gto_tw1['id_waktutrans'];?>"
                                   data-id-panjangantrian-s1 ="<?php echo $data_panjang_antrian_tw1['id_pa'];?>"
                  								 data-gerbangterbuka-s1 ="<?php echo $data_gerbang_terbuka_tw1['nilai']; ?>"
                                   data-gerbangmasuk-s1 ="<?php echo $data_gerbang_masuk_tw1['nilai'];?>"
                                   data-gerbangkeluar-s1 ="<?php echo $data_gerbang_keluar_tw1['nilai'];?>"
                                   data-gerbangterbukagto-s1 ="<?php echo $data_gerbang_terbuka_gto_tw1['nilai'];?>"
                                   data-gerbangmasukgto-s1 ="<?php echo $data_gerbang_masuk_gto_tw1['nilai'];?>"
                                   data-gerbangkeluargto-s1 ="<?php echo $data_gerbang_keluar_gto_tw1['nilai'];?>"
                                   data-panjangantrian-s1 ="<?php echo $data_panjang_antrian_tw1['panjang_antrian'];?>" >
                  								 Edit
                  								 </button>
                                  <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modals1tw1"
                                    data-id-gerbang ="<?php echo $data_gerbang['id_gerbang'];?>"
                                    data-id-semester ="<?php echo $data_semester1['id_semester'];?>"
                                    data-id-tw = "<?php echo $data_tw1['id_tw'];?>" >
                                    Delete
                                  </button>
                							  </td>
                              </tr>

                              <tr>
                                <td><?php if(isset($data_gerbang_terbuka_tw2)){ echo $data_tw2['triwulan']; }?></td>
                                <td><?php echo $data_gerbang_terbuka_tw2['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_tw2['nilai'] ?></td>
                                <td><?php echo $data_gerbang_keluar_tw2['nilai'] ?></td>
                                <td><?php echo $data_gerbang_terbuka_gto_tw2['nilai'] ?></td>
                                <td><?php echo $data_gerbang_masuk_gto_tw2['nilai'] ?></td>
								                <td><?php echo $data_gerbang_keluar_gto_tw2['nilai'] ?></td>
                                <td><?php echo $data_panjang_antrian_tw2['panjang_antrian']?></td>
                                <td><?php if(isset($data_gerbang_terbuka_tw2)){?>
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modals1tw1"
                                  data-id-gerbangterbuka-s1 ="<?php echo $data_gerbang_terbuka_tw2['id_waktutrans'];?>"
                                  data-id-gerbangmasuk-s1 ="<?php echo $data_gerbang_masuk_tw2['id_waktutrans'];?>"
                                  data-id-gerbangkeluar-s1 ="<?php echo $data_gerbang_keluar_tw2['id_waktutrans'];?>"
                                  data-id-gerbangterbukagto-s1 ="<?php echo $data_gerbang_terbuka_gto_tw2['id_waktutrans'];?>"
                                  data-id-gerbangmasukgto-s1 ="<?php echo $data_gerbang_masuk_gto_tw2['id_waktutrans'];?>"
                                  data-id-gerbangkeluargto-s1 ="<?php echo $data_gerbang_keluar_gto_tw2['id_waktutrans'];?>"
                                  data-id-panjangantrian-s1 ="<?php echo $data_panjang_antrian_tw2['id_pa'];?>"
                                  data-gerbangterbuka-s1 ="<?php echo $data_gerbang_terbuka_tw2['nilai']; ?>"
                                  data-gerbangmasuk-s1 ="<?php echo $data_gerbang_masuk_tw2['nilai'];?>"
                                  data-gerbangkeluar-s1 ="<?php echo $data_gerbang_keluar_tw2['nilai'];?>"
                                  data-gerbangterbukagto-s1 ="<?php echo $data_gerbang_terbuka_gto_tw2['nilai'];?>"
                                  data-gerbangmasukgto-s1 ="<?php echo $data_gerbang_masuk_gto_tw2['nilai'];?>"
                                  data-gerbangkeluargto-s1 ="<?php echo $data_gerbang_keluar_gto_tw2['nilai'];?>"
                                  data-panjangantrian-s1 ="<?php echo $data_panjang_antrian_tw2['panjang_antrian'];?>"
                                  >
                  								 Edit
                  								 </button>
                                  <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modals1tw1"
                                  data-id-gerbang ="<?php echo $data_gerbang['id_gerbang'];?>"
                                  data-id-semester ="<?php echo $data_semester1['id_semester'];?>"
                                  data-id-tw = "<?php echo $data_tw2['id_tw'];?>">
                                    Delete
                                  </button>
                                <?php }?>
                							  </td>
                              </tr>
                              <tr>
                                <td rowspan="2"><?php echo $data_semester2['semester']?></td>
                                <td><?php if(isset($data_gerbang_terbuka2_tw3)){ echo $data_tw3['triwulan']; }?></td>
                                <td><?php echo $data_gerbang_terbuka2_tw3['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk2_tw3['nilai'] ?></td>
                                <td><?php echo $data_gerbang_keluar2_tw3['nilai'] ?></td>
                                <td><?php echo $data_gerbang_terbuka_gto2_tw3['nilai'] ?></td>
                                <td><?php echo $data_gerbang_masuk_gto2_tw3['nilai'] ?></td>
								                <td><?php echo $data_gerbang_keluar_gto2_tw3['nilai'] ?></td>
                                <td><?php echo $data_panjang_antrian2_tw3['panjang_antrian']?></td>
                                <td>
                                  <?php if(isset($data_gerbang_terbuka2_tw3)) {?>
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modals2tw3"
                                  data-id-gerbangterbuka-s2 ="<?php echo $data_gerbang_terbuka2_tw3['id_waktutrans'];?>"
                                  data-id-gerbangmasuk-s2 ="<?php echo $data_gerbang_masuk2_tw3['id_waktutrans'];?>"
                                  data-id-gerbangkeluar-s2 ="<?php echo $data_gerbang_keluar2_tw3['id_waktutrans'];?>"
                                  data-id-gerbangterbukagto-s2 ="<?php echo $data_gerbang_terbuka_gto2_tw3['id_waktutrans'];?>"
                                  data-id-gerbangmasukgto-s2 ="<?php echo $data_gerbang_masuk_gto2_tw3['id_waktutrans'];?>"
                                  data-id-gerbangkeluargto-s2 ="<?php echo $data_gerbang_keluar_gto2_tw3['id_waktutrans'];?>"
                                  data-id-panjangantrian-s2 ="<?php echo $data_panjang_antrian2_tw3['id_pa'];?>"
                                  data-gerbangterbuka-s2 ="<?php echo $data_gerbang_terbuka2_tw3['nilai']; ?>"
                                  data-gerbangmasuk-s2 ="<?php echo $data_gerbang_masuk2_tw3['nilai'];?>"
                                  data-gerbangkeluar-s2 ="<?php echo $data_gerbang_keluar2_tw3['nilai'];?>"
                                  data-gerbangterbukagto-s2 ="<?php echo $data_gerbang_terbuka_gto2_tw3['nilai'];?>"
                                  data-gerbangmasukgto-s2 ="<?php echo $data_gerbang_masuk_gto2_tw3['nilai'];?>"
                                  data-gerbangkeluargto-s2 ="<?php echo $data_gerbang_keluar_gto2_tw3['nilai'];?>"
                                  data-panjangantrian-s2 ="<?php echo $data_panjang_antrian2_tw3['panjang_antrian'];?>">
                                    Edit
                                  </button>
                                  <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modals2tw3"
                                    data-id-gerbang2 ="<?php echo $data_gerbang['id_gerbang'];?>"
                                    data-id-semester2 ="<?php echo $data_semester2['id_semester'];?>"
                                    data-id-tw = "<?php echo $data_tw3['id_tw'];?>">

                                    Delete
                                  </button>
                								 </td>
                              </tr>
                              <tr>
                                <td><?php if(isset($data_gerbang_terbuka2_tw4)){ echo $data_tw4['triwulan']; }?></td>
                                <td><?php echo $data_gerbang_terbuka2_tw4['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk2_tw4['nilai'] ?></td>
                                <td><?php echo $data_gerbang_keluar2_tw4['nilai'] ?></td>
                                <td><?php echo $data_gerbang_terbuka_gto2_tw4['nilai'] ?></td>
                                <td><?php echo $data_gerbang_masuk_gto2_tw4['nilai'] ?></td>
								                <td><?php echo $data_gerbang_keluar_gto2_tw4['nilai'] ?></td>
                                <td><?php echo $data_panjang_antrian2_tw4['panjang_antrian']?></td>
                                <td>
                                  <?php if(isset($data_gerbang_terbuka2_tw4)){?>
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary" data-toggle="modal" data-target=".bs-edit-modals2tw3"
                                  data-id-gerbangterbuka-s2 ="<?php echo $data_gerbang_terbuka2_tw4['id_waktutrans'];?>"
                                  data-id-gerbangmasuk-s2 ="<?php echo $data_gerbang_masuk2_tw4['id_waktutrans'];?>"
                                  data-id-gerbangkeluar-s2 ="<?php echo $data_gerbang_keluar2_tw4['id_waktutrans'];?>"
                                  data-id-gerbangterbukagto-s2 ="<?php echo $data_gerbang_terbuka_gto2_tw4['id_waktutrans'];?>"
                                  data-id-gerbangmasukgto-s2 ="<?php echo $data_gerbang_masuk_gto2_tw4['id_waktutrans'];?>"
                                  data-id-gerbangkeluargto-s2 ="<?php echo $data_gerbang_keluar_gto2_tw4['id_waktutrans'];?>"
                                  data-id-panjangantrian-s2 ="<?php echo $data_panjang_antrian2_tw4['id_pa'];?>"
                                  data-gerbangterbuka-s2 ="<?php echo $data_gerbang_terbuka2_tw4['nilai']; ?>"
                                  data-gerbangmasuk-s2 ="<?php echo $data_gerbang_masuk2_tw4['nilai'];?>"
                                  data-gerbangkeluar-s2 ="<?php echo $data_gerbang_keluar2_tw4['nilai'];?>"
                                  data-gerbangterbukagto-s2 ="<?php echo $data_gerbang_terbuka_gto2_tw4['nilai'];?>"
                                  data-gerbangmasukgto-s2 ="<?php echo $data_gerbang_masuk_gto2_tw4['nilai'];?>"
                                  data-gerbangkeluargto-s2 ="<?php echo $data_gerbang_keluar_gto2_tw4['nilai'];?>"
                                  data-panjangantrian-s2 ="<?php echo $data_panjang_antrian2_tw4['panjang_antrian'];?>"
                                  >
                  								 Edit
                  								 </button>
                                  <button type="button" class="btn btn-round btn-danger" class="btn btn-primary" data-toggle="modal" data-target=".bs-delete-modals2tw3"
                                  data-id-gerbang2 ="<?php echo $data_gerbang['id_gerbang'];?>"
                                  data-id-semester2 ="<?php echo $data_semester2['id_semester'];?>"
                                  data-id-tw = "<?php echo $data_tw4['id_tw'];?>"
                                  >
                                    Delete
                                  <?php }?>
                                  </button>
                							  </td>
                              </tr>
                            <?php } }?>
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

    <!-- Modal Content -->
		<div class="x_content">
      <!-- Modal Delete Waktu Transaksi Semester 1 TW 1 -->
      <div class="modal fade bs-delete-modals1tw1" id="modal_deletewaktutransaksis1tw1admin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Delete Rencana</h4>
            </div>
            <div class="modal-body">
              <form action="editwaktutransaksi1_admin.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                <div class="alert alert-danger" role="alert">
                  <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
                  <h4> Anda yakin untuk menghapus data rencana ini? </h4>
                </div>
                <h2 style="color:red;"></h2>
                <form action="editwaktutransaksi1_admin.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <input name ="edit_idgerbang" type="text" id="waktutransaksi1" value="" hidden>
                  <input name ="edit_idsemester1" type="text" id="waktutransaksi1" value="" hidden>
                  <input name ="edit_idtws1" type="text" id="waktutransaksi1" value="" hidden>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger" name ="deletewaktutransaksi" >Delete</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        <!--End of Modal Delete Waktu Transaksi Semester 1 TW 1 -->

        <!-- Modal Modal Edit Waktu Transaksi Semester 1 TW 1 -->
  			 <div class="modal fade bs-edit-modals1tw1" id="modal_editwaktutransaksis1tw1admin" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myModalLabel">Edit Rencana</h4>
               </div>
               <div class="modal-body">
                 <form action="editwaktutransaksi1_admin.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                   <input name ="edit_idgerbangterbukas1" type="number" id="waktutransaksi1" value="" hidden>
                   <input name ="edit_idgerbangmasuks1" type="number" id="waktutransaksi1" value="" hidden>
                   <input name ="edit_idgerbangkeluars1" type="number" id="waktutransaksi1" value="" hidden>
                   <input name ="edit_idgerbang_gto_terbukas1" type="number" id="waktutransaksi1" value="" hidden>
                   <input name ="edit_idgerbang_gto_masuks1" type="number" id="waktutransaksi1" value="" hidden>
                   <input name ="edit_idgerbang_gto_keluars1" type="number" id="waktutransaksi1" value="" hidden>
                   <input name ="edit_idpanjang_antrians1" type="number" id="waktutransaksi1" value="" hidden>
                   <!-- field Jenis Gardu Reguluer-->
                   <div>
                     <h4><b>Gardu Reguler</b></h4>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Terbuka</label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input name= "edit_gerbangterbukas1" type="number" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="form-group">
                     <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup"><b>Gardu Tertutup</b></h5>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk</label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input name= "edit_gerbangmasuks1" type="number" min="0" id="gardu_masuk" required="required" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Keluar</label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <input name= "edit_gerbangkeluars1" type="number" min="0" id="gardu_keluar" required="required" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <!-- End of field Jenis Gardu Reguluer-->

                    <!-- field Jenis Gardu GTO-->
                    <div>
                      <h4><b>Gardu GTO</b></h4>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Terbuka</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_gerbang_gto_terbukas1" type="number" min="0" id="gardu_terbuka_gto" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup_gto"><b>Gardu Tertutup</b></h5>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Masuk</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_gerbang_gto_masuks1" type="number" min="0" id="gardu_masuk_gto" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_gerbang_gto_keluars1" type="number" min="0" id="gardu_keluar_gto" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div><br>
                    <!-- End of field Jenis Gardu GTO-->

                    <!-- field Panjang Antrian -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panjang_antrian">Panjang Antrian</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name= "edit_panjang_antrians1" type="text" min="0" id="panjang_antrian" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <!-- end of field Panjang Antrian -->

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name ="editwaktutransaksis1" >Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End of Modal Edit Waktu Transaksi Semester 1 TW 1-->

          <!-- Modal Delete Waktu Transaksi Semester 2 TW 3-->
          <div class="modal fade bs-delete-modals2tw3" id="modal_deletewaktutransaksis2tw3admin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Delete Rencana</h4>
                </div>
                <div class="modal-body">
                  <form action="editwaktutransaksi1_admin.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
                    <div class="alert alert-danger" role="alert">
                      <h1 class="glyphicon glyphicon-alert" aria-hidden="true"></h1>
                      <h4> Anda yakin untuk menghapus data rencana ini? </h4>
                    </div>
                    <h2 style="color:red;"></h2>
                    <form action="editwaktutransaksi.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <input name ="edit_idgerbang" type="text" id="waktutransaksi2" value="" hidden>
                      <input name ="edit_idsemester2" type="text" id="waktutransaksi2" value="" hidden>
                      <input name ="edit_idtws2" type="text" id="waktutransaksi1" value="" hidden>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger" name ="deletewaktutransaksis2" >Delete</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <!--End of Modal Delete Waktu Transaksi Semester 2 TW 3-->

            <!-- Modal Modal Edit Waktu Transaksi Semester 2 TW 3 -->
      			 <div class="modal fade bs-edit-modals2tw3" id="modal_editwaktutransaksis2tw3admin" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Rencana</h4>
                   </div>
                   <div class="modal-body">
                     <form action="editwaktutransaksi1_admin.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                       <input name ="edit_idgerbangterbukas2" type="number" id="waktutransaksi1" value="" hidden>
                       <input name ="edit_idgerbangmasuks2" type="number" id="waktutransaksi1" value="" hidden>
                       <input name ="edit_idgerbangkeluars2" type="number" id="waktutransaksi1" value="" hidden>
                       <input name ="edit_idgerbang_gto_terbukas2" type="number" id="waktutransaksi1" value="" hidden>
                       <input name ="edit_idgerbang_gto_masuks2" type="number" id="waktutransaksi1" value="" hidden>
                       <input name ="edit_idgerbang_gto_keluars2" type="number" id="waktutransaksi1" value="" hidden>
                       <input name ="edit_idpanjang_antrians2" type="number" id="waktutransaksi1" value="" hidden>
                       <!-- field Jenis Gardu Reguluer-->
                       <div>
                         <h4><b>Gardu Reguler</b></h4>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Terbuka</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input name= "edit_gerbangterbukas2" type="number" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                         </div>
                       </div>
                       <div class="form-group">
                         <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup"><b>Gardu Tertutup</b></h5>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input name= "edit_gerbangmasuks2" type="number" min="0" id="gardu_masuk" required="required" class="form-control col-md-7 col-xs-12">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Keluar</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input name= "edit_gerbangkeluars2" type="number" min="0" id="gardu_keluar" required="required" class="form-control col-md-7 col-xs-12">
                         </div>
                       </div>
                       <!-- End of field Jenis Gardu Reguluer-->

                        <!-- field Jenis Gardu GTO-->
                        <div>
                          <h4><b>Gardu GTO</b></h4>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Terbuka</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name= "edit_gerbang_gto_terbukas2" type="number" min="0" id="gardu_terbuka_gto" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup_gto"><b>Gardu Tertutup</b></h5>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Masuk</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name= "edit_gerbang_gto_masuks2" type="number" min="0" id="gardu_masuk_gto" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name= "edit_gerbang_gto_keluars2" type="number" min="0" id="gardu_keluar_gto" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div><br>
                        <!-- End of field Jenis Gardu GTO-->

                        <!-- field Panjang Antrian -->
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panjang_antrian">Panjang Antrian</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name= "edit_panjang_antrians2" type="text" min="0" id="panjang_antrian" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <!-- end of field Panjang Antrian -->

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name ="editwaktutransaksis2" >Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End of Modal Edit Waktu Transaksi Semester 2 TW 3-->


			<!-- Modal Tambah Waktu Transaksi-->
			<div class="modal fade bs-rencana" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Waktu Transaksi</h4>
					</div>
					<div class="modal-body">
              <form action="tambah_waktutransaksi1.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <!-- Dropdown list Gerbang -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Gerbang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name ="idgerbang" class="select2_single form-control" tabindex="-1" required="required">
                      <option></option>
                      <?php
                          $gerbang= mysqli_query($connect, "SELECT * FROM gerbang WHERE id_cabang ='$id_cabang'");
                          $idgerbang = ['id_gerbang'];
                          while($datagerbang = mysqli_fetch_array($gerbang)){
                      ?>
                      <option  value="<?php echo $datagerbang['id_gerbang'];?>"><?php echo $datagerbang['nama_gerbang'];?></option>

                      <?php
                          }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- End of Dropdown list Gerbang -->

                <!-- Dropdown list Tahun -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name= "tahun" class="select2_single form-control" tabindex="-1">
                      <option value="">Pilih Tahun</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                    </select>
                  </div>
                </div>
                  <!-- Dropdown list Tahun -->

                <!-- Dropdown list Semester -->
                 <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester</label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <select required="required" name ="idsemester" id="semester-list" class="select2_single form-control" tabindex="-1" required="required">
                       <option value="">---Pilih Semester---</option>
                       <?php
                          $semester= mysqli_query($connect, "SELECT * FROM semester ");
                          $idsemester = ['id_semester'];
                          while($datasemester = mysqli_fetch_array($semester)){
                       ?>
                          <option  value="<?php echo $datasemester['id_semester'];?>"><?php echo $datasemester['semester'];?></option>
                       <?php
                          }
                       ?>
                        <input name ="idcabang" type="text" id="idcabang" value="<?php echo $id_cabang; ?>" hidden>
                      </select>
                    </div>
                  </div>
                  <!-- Dropdown list Semester -->

                  <!-- Dropdown list Tri Wulan -->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="triwulan">Triwulan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select required="required" name= "triwulan" id="triwulan-list" class="select2_single form-control" tabindex="-1">
                        <option value="">---Pilih Triwulan---</option>
                      </select>
                    </div>
                  </div>
                    <!-- Dropdown list Tahun -->

                <!-- field Jenis Gardu Reguluer-->
                <div>
                    <h4><b>Gardu Reguler</b></h4>
                </div>
							  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka" type="text" value="1" hidden>
                    <input name= "gardu_terbuka" type="number" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup"><b>Gardu Tertutup</b></h5>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk" type="text" value="2" hidden>
                    <input name= "gardu_masuk" type="number" min="0" id="gardu_masuk" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Gardu Keluar</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_keluar" type="text" value="3" hidden>
                    <input name= "gardu_keluar" type="number" min="0" id="gardu_keluar" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <!-- End of field Jenis Gardu Reguluer-->

                <!-- field Jenis Gardu GTO-->
                <div>
                    <h4><b>Gardu GTO</b></h4>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka_gto" type="text" value="4" hidden>
                    <input name= "gardu_terbuka_gto" type="number" min="0" id="gardu_terbuka_gto" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup_gto"><b>Gardu Tertutup</b></h5>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk_gto" type="text" value="5" hidden>
                    <input name= "gardu_masuk_gto" type="number" min="0" id="gardu_masuk_gto" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Gardu Keluar</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_keluar_gto" type="text" value="6" hidden>
                    <input name= "gardu_keluar_gto" type="number" min="0" id="gardu_keluar_gto" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div><br>
                <!-- End of field Jenis Gardu GTO-->

                <!-- field Panjang Antrian -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panjang_antrian">Panjang Antrian</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "panjang_antrian" type="text" min="0" id="panjang_antrian" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <!-- end of field Panjang Antrian -->


						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						  <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
						</div>
					</form>
				  </div>
				</div>
			</div>
      <!-- End of Modal Tambah Transaksi -->
		</div>
    <!-- End of Modal Content -->

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
