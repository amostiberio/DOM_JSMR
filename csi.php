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
                    <h2><i class="fa fa-table"></i> Table <small>Data Waktu Transaksi 2 SPM Cabang <?php echo $namacabang; ?> </small></h2>

                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
                            <thead >
                              <tr >
                                <th rowspan="4">No</th>
                                <th rowspan="4">Cabang</th>
                                <th rowspan="4">Keterangan</th>
                                <th colspan="6">2017</th>
                              </tr>
                              <tr>
                                <th colspan="2">Rencana</th>
								                <th colspan="4">Realisasi</th>
                              </tr>
                              <tr>
                                <!-- Rencana -->
                                <th rowspan="1">Semester 1</th>
                                <th rowspan="1">s.d Semester 2</th>
                                <!-- Realisasi -->
                                <th colspan="1">s.d Semester 1</th>
                                <th colspan="1">s.d Semester 2</th>
                                <th colspan="1">Capaian Semester 1</th>
                                <th colspan="1">Capaian Semester 2</th>
                              </tr>
                              <tr>

                                <th colspan="1">(1)</th>
								                <th colspan="1">(2)</th>
                                <th colspan="1">(3)</th>
								                <th colspan="1">(4)</th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                              </tr>

                            </thead>
                            <tbody>
                              <?php
                                  $rata_waktu_transaksi = mysqli_query($connect, "SELECT * FROM waktu_transaksi join panjang_antrian join wt_rencana  join semester join gerbang on gerbang.id_gerbang=waktu_transaksi.id_gerbang AND gerbang.id_gerbang=panjang_antrian.id_gerbang AND waktu_transaksi.id_subgardu=wt_rencana.id_subgardu WHERE waktu_transaksi.id_cabang = '$idcabang' group by waktu_transaksi.id_gerbang");
                                  $nomor = 1;
                                  while($data_waktu_transaksi = mysqli_fetch_array($rata_waktu_transaksi)){
                                    $idgerbanglist = $data_waktu_transaksi['id_gerbang'];
                    								$idsubgardulist = $data_waktu_transaksi['id_subgardu'];
                                    $idsemesterlist = $data_waktu_transaksi['id_semester'];
                                    $data_gerbang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM gerbang WHERE id_gerbang = '$idgerbanglist'"));


                                    $data_semester1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '1'"));
                                    $data_semester2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '2'"));

                                    $data_tahun= mysqli_fetch_array(mysqli_query($connect, "SELECT tahun from waktu_transaksi where id_gerbang = '$idgerbanglist'"));

                                    //ambil data semester 1
                    								$data_gerbang_terbuka = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_masuk = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_keluar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_terbuka_gto = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                    								$data_gerbang_masuk_gto = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_gerbang_keluar_gto = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='1' AND waktu_transaksi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_panjang_antrian = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM panjang_antrian WHERE id_gerbang = '$idgerbanglist' AND id_semester='1'"));

                                    //ambil semester 2
                                    $data_gerbang_masuk2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_terbuka2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2' AND waktu_transaksi.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_keluar2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $data_gerbang_terbuka_gto2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                    								$data_gerbang_masuk_gto2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2'  AND waktu_transaksi.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_gerbang_keluar_gto2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM waktu_transaksi, jenis_subgardu WHERE waktu_transaksi.id_gerbang = '$idgerbanglist' AND waktu_transaksi.id_semester='2' AND waktu_transaksi.id_subgardu = '6' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $data_panjang_antrian2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM panjang_antrian WHERE id_gerbang = '$idgerbanglist' AND id_semester='2' "));

                                    //ambil data Rencana
                                    $datarencana_gardu_terbuka = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $datarencana_gardu_masuk_tertutup = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $datarencana_gardu_keluar_tertutup = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
                                    $datarencana_gardu_tol_ambil_kartu = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $datarencana_gardutol_transaksi = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
                                    $datarencana_antrian_kendaraan = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '9' AND jenis_subgardu.id_jenisgardu='3'"));

                                    //Hitung nilai Realisasi Gardu Tol transaksi Semester 1
                                     $array = array($data_gerbang_keluar_gto['nilai'],$data_gerbang_terbuka_gto['nilai']);
                                            $data_gardutol_transaksi = ( array_sum($array) / count($array) );
                                    //Hitung nilai Realisasi Gardu Tol Transaksi Semester 2
                                     $array2 = array($data_gerbang_keluar_gto2['nilai'],$data_gerbang_terbuka_gto2['nilai']);
                                            $data_gardutol_transaksi2 = ( array_sum($array2) / count($array2) );
                                    //Hitung nilai Realisasi Capaian Semester 1
                                     $array3 = array(($datarencana_gardu_masuk_tertutup['nilai']/$data_gerbang_masuk['nilai']),
                                                     ($datarencana_gardu_keluar_tertutup['nilai']/$data_gerbang_keluar['nilai']),
                                                     ($datarencana_gardu_terbuka['nilai']/$data_gerbang_terbuka['nilai']),
                                                     ($datarencana_gardu_tol_ambil_kartu['nilai']/$data_gerbang_masuk_gto['nilai']),
                                                     ($datarencana_gardutol_transaksi['nilai']/$data_gardutol_transaksi),
                                                     ($datarencana_antrian_kendaraan['nilai']/$data_panjang_antrian['panjang_antrian'])
                                                   );
                                            $data_capaian_semester1= (array_sum($array3)/count($array3));
                                            $persen_capaian_semester1 = number_format( $data_capaian_semester1 * 100, 2 ) . '%'; //2 angka dibelakang koma

                                    //Hitung nilai Realisasi Capaian Semester 1
                                    $array3 = array(($datarencana_gardu_masuk_tertutup['nilai']/$data_gerbang_masuk2['nilai']),
                                                    ($datarencana_gardu_keluar_tertutup['nilai']/$data_gerbang_keluar2['nilai']),
                                                    ($datarencana_gardu_terbuka['nilai']/$data_gerbang_terbuka2['nilai']),
                                                    ($datarencana_gardu_tol_ambil_kartu['nilai']/$data_gerbang_masuk_gto2['nilai']),
                                                    ($datarencana_gardutol_transaksi['nilai']/$data_gardutol_transaksi2),
                                                    ($datarencana_antrian_kendaraan['nilai']/$data_panjang_antrian2['panjang_antrian'])
                                                    );
                                              $data_capaian_semester2= (array_sum($array3)/count($array3));
                                              $persen_capaian_semester2 = number_format( $data_capaian_semester2 * 100, 2 ) . '%'; //2 angka dibelakang koma


                              ?>
                              <tr rowspan="6">
                                <td rowspan="6"><?php echo $nomor; $nomor++;?></td>
                                <td rowspan="6"><?php echo $data_gerbang['nama_gerbang'] ?></td>
                                <td><?php echo "Gardu Masuk Sistem Tertutup"?></td>
                                <td><?php echo $datarencana_gardu_masuk_tertutup['nilai'];?></td>
                                <td><?php echo $datarencana_gardu_masuk_tertutup['nilai'];?></td>
                                <td><?php echo $data_gerbang_masuk['nilai'];?></td>
                                <td><?php echo $data_gerbang_masuk2['nilai'];?></td>
								                <td rowspan="6"><?php echo $persen_capaian_semester1?></td>
                                <td rowspan="6"><?php echo $persen_capaian_semester2?></td>
                              </tr>
                              <tr>
                                <td><?php echo "Gardu Keluar Sistem Tertutup"?></td>
                                <td><?php echo $datarencana_gardu_keluar_tertutup['nilai'];?></td>
                                <td><?php echo $datarencana_gardu_keluar_tertutup['nilai'];?></td>
                                <td><?php echo $data_gerbang_keluar['nilai'];?></td>
                                <td><?php echo $data_gerbang_keluar2['nilai'];?></td>

                              </tr>
                              <tr>
                                <td><?php echo "Gardu Sistem Terbuka"?></td>
                                <td><?php echo $datarencana_gardu_terbuka['nilai'];?></td>
                                <td><?php echo $datarencana_gardu_terbuka['nilai'];?></td>
                                <td><?php echo $data_gerbang_terbuka['nilai'];?></td>
                                <td><?php echo $data_gerbang_terbuka2['nilai'];?></td>

                              </tr>
                              <tr>
                                <td><?php echo "Gardu Tol Ambil Kartu"?></td>
                                <td><?php echo $datarencana_gardu_tol_ambil_kartu['nilai']?></td>
                                <td><?php echo $datarencana_gardu_tol_ambil_kartu['nilai']?></td>
                                <td><?php echo $data_gerbang_masuk_gto['nilai'];?></td>
                                <td><?php echo $data_gerbang_masuk_gto2['nilai'];?></td>

                              </tr>
                              <tr>
                                <td><?php echo "Gardu Tol Transaksi"?></td>
                                <td><?php echo $datarencana_gardutol_transaksi['nilai']?></td>
                                <td><?php echo $datarencana_gardutol_transaksi['nilai']?>
                                </td>
                                <td><?php echo $data_gardutol_transaksi;?></td>
                                <td><?php echo $data_gardutol_transaksi2;?></td>

                              </tr>
                              <tr>
                                <td><?php echo "Jumlah Antrian Kendaraan"?></td>
                                <td><?php echo $datarencana_antrian_kendaraan['nilai'];?></td>
                                <td><?php echo $datarencana_antrian_kendaraan['nilai'];?></td>
                                <td><?php echo $data_panjang_antrian['panjang_antrian'];?></td>
                                <td><?php echo $data_panjang_antrian2['panjang_antrian'];?></td>

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
