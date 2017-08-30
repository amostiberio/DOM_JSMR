 <?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

if(isset($_GET['tahun'])){
    $nilaiTanggal = $_GET['tahun'];

  }else $nilaiTanggal = '0';



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
                <h3>Data Status Laporan Bulanan</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Status Laporan Bulanan</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  <form action="dropdownproses.php" method="POST">
                  <div class='col-sm-2'>
                    <div class="form-group">
                        <div class='input-group date' id='myDatepickerFilter'>
                            <input type='text' class="form-control" name= "tahun" <?php if(isset($_GET['tahun'])){ ?> value="<?php echo $nilaiTanggal ;?>" <?php } ?>/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="dropdownTahunStatusLaporanBulanan">Lihat</button>
                  </form>


                   <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                        <div class="btn-group  buttonrightfloat " >
                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilihan <span class="caret"></span>
                        </button>
                        <ul role="menu" class="dropdown-menu pull-right">

                          <li><a href="downloadexcelstatuslaporanbulanan.php?tahun=<?php echo $nilaiTanggal;?> "> Unduh Excels <img src='xls.png' alt="XLSX" style="width:20px"></a>
                          </li>
                        </ul>
                       </div>
                      </div>
                    </div>
                   </div>

                  <div class="x_content">
                      <?php if ($nilaiTanggal != '0') {

                        ?>
                      <table border="1"  id ="tableLaporanBulanan" class="table table-striped table-bordered text-center">
                            <thead >
                            <tr>

                                <th rowspan="2">No</th>
                                <th rowspan="2">Cabang</th>
                                <th colspan="12">Laporan Bulanan Tahun <?php echo $nilaiTanggal; ?> </th>

                             </tr>

                            <tr>

                                <th >Januari</th>
                                <th >Februari</th>
                                <th >Maret</th>
                                <th >April</th>
                                <th >Mei</th>
                                <th >Juni</th>
                                <th >Juli</th>
                                <th >Agustus</th>
                                <th >September</th>
                                <th >Oktober</th>
                                <th >November</th>
                                <th >Desember</th>
                             </tr>

                            </thead>
                            <tbody>
                              <?php
                                  $iterasinomor=1;
                                  $listCabang = mysqli_query($connect, "SELECT * FROM cabang");

                                  while($ambilListCabang = mysqli_fetch_array($listCabang)) {

                                       $nama_cabang = $ambilListCabang['nama_cabang'];
                                       $id_cabang = $ambilListCabang['id_cabang'];

                                       $ambilDataLaporanBulanan1= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='1'"));
                                       $ambilDataLaporanBulanan2= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='2'"));
                                       $ambilDataLaporanBulanan3= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='3'"));
                                       $ambilDataLaporanBulanan4= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='4'"));
                                       $ambilDataLaporanBulanan5= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='5'"));
                                       $ambilDataLaporanBulanan6= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='6'"));
                                       $ambilDataLaporanBulanan7= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='7'"));
                                       $ambilDataLaporanBulanan8= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='8'"));
                                       $ambilDataLaporanBulanan9= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='9'"));
                                       $ambilDataLaporanBulanan10= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='10'"));
                                       $ambilDataLaporanBulanan11= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='11'"));
                                       $ambilDataLaporanBulanan12= mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM realisasi_laporan WHERE id_cabang = '$id_cabang' AND tahun = '$nilaiTanggal' AND bulan ='12'"));

                              ?>

                              <tr>
                              <td><?php echo $iterasinomor++;?> </td>
                              <td><?php echo $nama_cabang;?> </td>

                              <?php
                              if($ambilDataLaporanBulanan1){
                                 if($ambilDataLaporanBulanan1['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan2){
                                 if($ambilDataLaporanBulanan2['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan3){
                                 if($ambilDataLaporanBulanan3['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan4){
                                 if($ambilDataLaporanBulanan4['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan5){
                                 if($ambilDataLaporanBulanan5['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan6){
                                 if($ambilDataLaporanBulanan6['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>



                              <?php
                              if($ambilDataLaporanBulanan7){
                                 if($ambilDataLaporanBulanan7['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan8){
                                 if($ambilDataLaporanBulanan8['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan9){
                                 if($ambilDataLaporanBulanan9['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                              <?php
                              if($ambilDataLaporanBulanan10){
                                 if($ambilDataLaporanBulanan10['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>
                             <?php
                              if($ambilDataLaporanBulanan11){
                                 if($ambilDataLaporanBulanan11['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>

                             <?php
                              if($ambilDataLaporanBulanan12){
                                 if($ambilDataLaporanBulanan12['status'] == '1'){
                              ?>
                              <td style="background-color: #31ed2a"> <!-- hijau -->

                              </td>
                             <?php  }
                              }
                             else{ ?>

                             <td style="background-color: #ef2a45"> <!-- merah -->

                              </td>
                             <?php }?>
                              </tr>

                              <?php }
                              ?>
                            </tbody>
                          </table>

            <?php }else {
                      ?> <h2 class="text-center"> Silahkan Pilih Tahun Terlebih Dahulu Untuk Melihat Table Status Laporan Bulanan </h2>

                    <?php }?>
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
