<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

  $iduser = $_SESSION['id_user'];
  if(isset($_GET['tahun'])){
      $nilaiTahun = $_GET['tahun'];

  }
  else{
    $nilaiTahun = 0;
  }
  $resultjs = $connect-> query("SELECT * FROM cabang");

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
                <h3>Data Waktu Transaksi</h3>
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
                   <button  type="submit" class="btn btn-primary" name="dropdownWaktuTransaksi1">Lihat</button>
                   <button type="submit" class="btn btn-danger" name="clearTahunWT1">Hapus Filter</button>
                 </div>
                 </form>
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-5 form-group pull-right top_search" style="margin-top:10px;">
                      <div class="input-group buttonright" >
                        <div class="btn-group  buttonrightfloat " >
                          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Tambah <span class="caret"></span></button>
                          <ul role="menu" class="dropdown-menu pull-right">
                            <li><a data-toggle="modal" data-target=".bs-tambahtransaksi" >Tambah Waktu Transaksi</a></li>
                          </ul>
                        </div>
                      </div>
					            <div class="input-group buttonright" >
                        <div class="btn-group  buttonrightfloat " >
                          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Unduh <span class="caret"></span></button>
                          <ul role="menu" class="dropdown-menu pull-right">
                            <li><a href="download_wt1.php?tahun=<?php echo $nilaiTahun;?>" > Unduh Excels <img src='xls.png' alt="XLSX" style="width:20px"></a></li>
					                </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="x_content">

                      <table id="datatable-keytable"  class="table table-striped table-bordered text-center">
                            <thead >
                              <tr >
                                <th rowspan="4">No</th>
                                <th rowspan="4">Cabang</th>
                                <th rowspan="4">Tahun</th>
                                <th rowspan="4">Semester</th>
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
                              if($nilaiTahun > 0 ){
                                $rata_waktu_transaksi = mysqli_query($connect, "SELECT * FROM waktu_transaksi join panjang_antrian join semester join gerbang on gerbang.id_gerbang=waktu_transaksi.id_gerbang AND gerbang.id_gerbang=panjang_antrian.id_gerbang AND waktu_transaksi.id_semester=semester.id_semester AND semester.id_semester=panjang_antrian.id_semester AND waktu_transaksi.tahun='$nilaiTahun' GROUP BY waktu_transaksi.id_cabang");

                              }else{
                                $rata_waktu_transaksi = mysqli_query($connect, "SELECT * FROM waktu_transaksi join panjang_antrian join semester join gerbang on gerbang.id_gerbang=waktu_transaksi.id_gerbang AND gerbang.id_gerbang=panjang_antrian.id_gerbang AND waktu_transaksi.id_semester=semester.id_semester AND semester.id_semester=panjang_antrian.id_semester GROUP BY waktu_transaksi.id_cabang");

                              }
                              $nomor = 1;

                              //variable untuk menghitung rataan waktu transaksi
                              $total_garduterbukas1=0; $total_gardumasuks1=0; $total_gardukeluars1=0;
                              $count_garduterbukas1=0; $count_gardumasuks1=0; $count_gardukeluars1=0;
                              $total_garduterbukas2=0; $total_gardumasuks2=0; $total_gardukeluars2=0;
                              $count_garduterbukas2=0; $count_gardumasuks2=0; $count_gardukeluars2=0;

                              $total_garduterbukagtos1=0; $total_gardumasukgtos1=0; $total_gardukeluargtos1=0;
                              $count_garduterbukagtos1=0; $count_gardumasukgtos1=0; $count_gardukeluargtos1=0;
                              $total_garduterbukagtos2=0; $total_gardumasukgtos2=0; $total_gardukeluargtos2=0;
                              $count_garduterbukagtos2=0; $count_gardumasukgtos2=0; $count_gardukeluargtos2=0;

                              $total_panjangantrians1=0;
                              $count_panjangantrians1=0;
                              $total_panjangantrians2=0;
                              $count_panjangantrians2=0;


                              while($data_waktu_transaksi = mysqli_fetch_array($rata_waktu_transaksi)){

  								$idcabanglist = $data_waktu_transaksi['id_cabang'];
                  $idsemesterlist = $data_waktu_transaksi['id_semester'];

  								$data_cabang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM cabang WHERE id_cabang = '$idcabanglist'"));
                  $data_semester1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '1'"));
                  $data_semester2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '2'"));

                  $data_tahun= mysqli_fetch_array(mysqli_query($connect, "SELECT tahun from waktu_transaksi where id_cabang = '$idcabanglist'"));

                //ambil data semester 1
                  // Total Data Gardu Terbuka Semester 1
                    $data_gerbang_terbuka = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='1' AND id_semester='1'");
                    $hasil_data_gerbang_terbuka = mysqli_fetch_assoc($data_gerbang_terbuka);
                    $total_data_gerbang_terbuka = $hasil_data_gerbang_terbuka['nilai_total'];
                  //Total Data Gardu Masuk Semester 1
                    $data_gerbang_masuk = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='2' AND id_semester='1'");
                    $hasil_data_gerbang_masuk = mysqli_fetch_assoc($data_gerbang_masuk);
                    $total_data_gerbang_masuk = $hasil_data_gerbang_masuk['nilai_total'];
                  //Total Data Gardu Keluar Semester 1
                    $data_gerbang_keluar = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='3' AND id_semester='1'");
                    $hasil_data_gerbang_keluar = mysqli_fetch_assoc($data_gerbang_keluar);
                    $total_data_gerbang_keluar = $hasil_data_gerbang_keluar['nilai_total'];
                  //Total Data Gardu Terbuka GTO Semester 1
                    $data_gerbang_terbuka_gto = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='4' AND id_semester='1'");
                    $hasil_data_gerbang_terbuka_gto = mysqli_fetch_assoc($data_gerbang_terbuka_gto);
                    $total_data_gerbang_terbuka_gto = $hasil_data_gerbang_terbuka_gto['nilai_total'];
                  //Total Data Gardu GTO Masuk Semester 1
                    $data_gerbang_masuk_gto = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='5' AND id_semester='1'");
                    $hasil_data_gerbang_masuk_gto = mysqli_fetch_assoc($data_gerbang_masuk_gto);
                    $total_data_gerbang_masuk_gto = $hasil_data_gerbang_masuk_gto['nilai_total'];
                  //Total Data Gardu GTO Keluar Semester 1
                    $data_gerbang_keluar_gto = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='6' AND id_semester='1'");
                    $hasil_data_gerbang_keluar_gto = mysqli_fetch_assoc($data_gerbang_keluar_gto);
                    $total_data_gerbang_keluar_gto = $hasil_data_gerbang_keluar_gto['nilai_total'];
                  //Total Data Panjang Antrian Semester 1
                    $data_panjang_antrian = mysqli_query($connect, "SELECT SUM(panjang_antrian) AS nilai_total FROM panjang_antrian WHERE id_cabang='$idcabanglist' AND id_semester='1'");
                    $hasil_data_panjang_antrian = mysqli_fetch_assoc($data_panjang_antrian);
                    $total_data_panjang_antrian = $hasil_data_panjang_antrian['nilai_total'];


              //ambil data semester 2
                  // Total Data Gardu Terbuka Semester 2
                    $data_gerbang_terbuka2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='1' AND id_semester='2'");
                    $hasil_data_gerbang_terbuka2 = mysqli_fetch_assoc($data_gerbang_terbuka2);
                    $total_data_gerbang_terbuka2 = $hasil_data_gerbang_terbuka2['nilai_total'];
                  // Total Data Gardu Masuk Semester 2
                    $data_gerbang_masuk2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='2' AND id_semester='2'");
                    $hasil_data_gerbang_masuk2 = mysqli_fetch_assoc($data_gerbang_masuk2);
                    $total_data_gerbang_masuk2 = $hasil_data_gerbang_masuk2['nilai_total'];
                  //Total Data Gardu Keluar Semester 2
                    $data_gerbang_keluar2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='3' AND id_semester='2'");
                    $hasil_data_gerbang_keluar2 = mysqli_fetch_assoc($data_gerbang_keluar2);
                    $total_data_gerbang_keluar2 = $hasil_data_gerbang_keluar2['nilai_total'];
                  //Total Data Gardu Terbuka GTO Semester 2
                    $data_gerbang_terbuka_gto2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='4' AND id_semester='2'");
                    $hasil_data_gerbang_terbuka_gto2= mysqli_fetch_assoc($data_gerbang_terbuka_gto2);
                    $total_data_gerbang_terbuka_gto2= $hasil_data_gerbang_terbuka_gto2['nilai_total'];
                  //Total Data Gardu GTO Masuk Semester 2
                    $data_gerbang_masuk_gto2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='5' AND id_semester='2'");
                    $hasil_data_gerbang_masuk_gto2 = mysqli_fetch_assoc($data_gerbang_masuk_gto2);
                    $total_data_gerbang_masuk_gto2 = $hasil_data_gerbang_masuk_gto2['nilai_total'];
                  //Total Data Gardu GTO Keluar Semester 2
                    $data_gerbang_keluar_gto2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='6' AND id_semester='2'");
                    $hasil_data_gerbang_keluar_gto2 = mysqli_fetch_assoc($data_gerbang_keluar_gto2);
                    $total_data_gerbang_keluar_gto2 = $hasil_data_gerbang_keluar_gto2['nilai_total'];
                  //Total Data Panjang Antrian Semester 2
                    $data_panjang_antrian2 = mysqli_query($connect, "SELECT SUM(panjang_antrian) AS nilai_total FROM panjang_antrian WHERE id_cabang='$idcabanglist' AND id_semester='2'");
                    $hasil_data_panjang_antrian2 = mysqli_fetch_assoc($data_panjang_antrian2);
                    $total_data_panjang_antrian2 = $hasil_data_panjang_antrian2['nilai_total'];



                              ?>
                              <tr >
                                <td rowspan="2"><?php echo $nomor; $nomor++?></td>
                                <td rowspan="2"><?php echo $data_cabang['nama_cabang'] ?></td>
                                <td rowspan="2"><?php echo $data_tahun['tahun']?></td>
                                <td><?php echo $data_semester1['semester']?></td>
                                <td><?php if(isset($total_garduterbukas1)){
                                          $total_garduterbukas1+=$total_data_gerbang_terbuka;
                                          $count_garduterbukas1++;
                                          echo $total_data_gerbang_terbuka;
                                        };?>
                                </td>
                                <td><?php if(isset($total_gardumasuks1)){
                                          $total_gardumasuks1+=$total_data_gerbang_masuk;
                                          $count_gardumasuks1++;
                                          echo $total_data_gerbang_masuk;
                                        };?>
                                </td>
                                <td><?php if(isset($total_gardukeluars1)){
                                          $total_gardukeluars1+=$total_data_gerbang_keluar;
                                          $count_gardukeluars1++;
                                          echo $total_data_gerbang_keluar;
                                        };?>
                                </td>
                                <td><?php if(isset($total_garduterbukagtos1)){
                                          $total_garduterbukagtos1+=$total_data_gerbang_terbuka_gto;
                                          $count_garduterbukagtos1++;
                                          echo $total_data_gerbang_terbuka_gto;
                                        };?>
                                </td>
                                <td><?php if(isset($total_gardumasukgtos1)){
                                          $total_gardumasukgtos1+=$total_data_gerbang_masuk_gto;
                                          $count_gardumasukgtos1++;
                                          echo $total_data_gerbang_masuk_gto;
                                        };?>
                                </td>
                                <td><?php if(isset($total_gardukeluargtos1)){
                                          $total_gardukeluargtos1+=$total_data_gerbang_keluar_gto;
                                          $count_gardukeluargtos1++;
                                          echo $total_data_gerbang_keluar_gto;
                                        };?>
                                </td>
                                <td><?php if(isset($total_data_panjang_antrian)){
                                          $total_panjangantrians1+=$total_data_panjang_antrian;
                                          $count_panjangantrians1++;
                                          echo $total_data_panjang_antrian;
                                        };?>
                                </td>
                                <td rowspan="2">
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary"><a href="waktu_transaksi1_percabang.php?id=<?php echo $data_waktu_transaksi['id_cabang'];?>">

                                   Ubah
                                 </a></button>
                                </td>
                              </tr>
                              <?php ?>
                              <tr>
                                <td><?php echo $data_semester2['semester'];?></td>
                                <td><?php if (isset($total_data_gerbang_terbuka2)){
                                            $total_garduterbukas2+=$total_data_gerbang_terbuka2;
                                            $count_garduterbukas2++;
                                            echo $total_data_gerbang_terbuka2;
                                          };?>
                                </td>
                                <td><?php if(isset($total_data_gerbang_masuk2)){
                                          $total_gardumasuks2+=$total_data_gerbang_masuk2;
                                          $count_gardumasuks2++;
                                          echo $total_data_gerbang_masuk2;
                                        };?>
                                </td>
                                <td><?php if(isset($total_data_gerbang_keluar2)){
                                          $total_gardukeluars2+=$total_data_gerbang_keluar2;
                                          $count_gardukeluars2++;
                                          echo $total_data_gerbang_keluar2;
                                        };?>
                                </td>
                                <td><?php if(isset($total_data_gerbang_terbuka_gto2)){
                                          $total_garduterbukagtos2+=$total_data_gerbang_terbuka_gto2;
                                          $count_garduterbukagtos2++;
                                          echo $total_data_gerbang_terbuka_gto2;
                                        };?>
                                </td>
                                <td><?php if(isset($total_data_gerbang_masuk_gto2)){
                                          $total_gardumasukgtos2+=$total_data_gerbang_masuk_gto2;
                                          $count_gardumasukgtos2++;
                                          echo $total_data_gerbang_masuk_gto2;
                                        };?>
                                </td>
                                <td><?php if(isset($total_data_gerbang_keluar_gto2)){
                                          $total_gardukeluargtos2+=$total_data_gerbang_keluar_gto2;
                                          $count_gardukeluargtos2++;
                                          echo $total_data_gerbang_keluar_gto2;
                                        };?>
                                </td>
                                <td><?php if(isset($total_data_panjang_antrian2)){
                                          $total_panjangantrians2+=$total_data_panjang_antrian2;
                                          $count_panjangantrians2++;
                                          echo $total_data_panjang_antrian2;
                                        };?>
                                </td>

                              </tr>



                                <?php } ?>

                                <tr>
                                  <td colspan="4"> Rata-rata </td>
                                  <td>
                                    <?php
                                          if($count_garduterbukas1==0 && $count_garduterbukas2==0){
                                            $count_garduterbukas1=1;
                                            $count_garduterbukas2=1;
                                          }
                                          $hasil_rataangarduterbuka=($total_garduterbukas1+$total_garduterbukas2)/($count_garduterbukas1+$count_garduterbukas2);
                                          echo number_format((float)$hasil_rataangarduterbuka, 2, '.', '');
                                    ?>
                                  </td>
                                  <td>
                                    <?php if($count_gardumasuks1==0 && $count_gardumasuks2==0){
                                             $count_gardumasuks1=1;
                                             $count_gardumasuks2=1;
                                           }
                                          $hasil_rataangardumasuk=($total_gardumasuks1+$total_gardumasuks2)/($count_gardumasuks1+$count_gardumasuks2);
                                          echo number_format((float)$hasil_rataangardumasuk, 2, '.', '');
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                          if($count_gardukeluars1==0 && $count_gardukeluars2==0){
                                             $count_gardukeluars1=1;
                                             $count_gardukeluars2=1;
                                           }
                                          $hasil_rataangardukeluar=($total_gardukeluars1+$total_gardukeluars2)/($count_gardukeluars1+$count_gardukeluars2);
                                          echo $hasil_rataangardukeluar;
                                    ?>
                                  </td>
                                  <td>
                                    <?php if($count_garduterbukagtos1==0 && $count_garduterbukagtos2==0){
                                              $count_garduterbukagtos1=1;
                                              $count_garduterbukagtos2=1;
                                            }
                                          $hasil_rataangarduterbukagto=($total_garduterbukagtos1+$total_garduterbukagtos2)/($count_garduterbukagtos1+$count_garduterbukagtos2);
                                          echo number_format((float)$hasil_rataangarduterbukagto, 2, '.', '');
                                    ?>
                                  </td>
                                  <td>
                                    <?php if($count_gardumasukgtos1==0 && $count_gardumasukgtos2==0){
                                            $count_gardumasukgtos1=1;
                                            $count_gardumasukgtos2=2;
                                          }
                                          $hasil_rataangardumasukgto=($total_gardumasukgtos1+$total_gardumasukgtos2)/($count_gardumasukgtos1+$count_gardumasukgtos2);
                                          echo number_format((float)$hasil_rataangardumasukgto, 2, '.', '');
                                    ?>
                                  </td>
                                  <td>
                                    <?php if($count_gardukeluargtos1==0 && $count_gardukeluargtos2==0){
                                              $count_gardukeluargtos1=1;
                                              $count_gardukeluargtos2=1;
                                            }
                                          $hasil_rataangardukeluargto=($total_gardukeluargtos1+$total_gardukeluargtos2)/($count_gardukeluargtos1+$count_gardukeluargtos2);
                                          echo number_format((float)$hasil_rataangardukeluargto, 2, '.', '');
                                    ?>
                                  </td>
                                  <td>
                                    <?php if($count_panjangantrians1==0 && $count_panjangantrians2==0){
                                              $count_panjangantrians1=1;
                                              $count_panjangantrians2=2;
                                            }
                                          $hasil_rataanpanjangantrian=($total_panjangantrians1+$total_panjangantrians2)/($count_panjangantrians1+$count_panjangantrians2);
                                          echo number_format((float)$hasil_rataanpanjangantrian, 2, '.', '');
                                    ?>
                                  </td>
                                </tr>
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


      <!-- Modal Tambah Waktu Transaksi-->
			<div class="modal fade bs-tambahtransaksi" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					  </button>
					  <h4 class="modal-title" id="myModalLabel">Tambah Waktu Transaksi</h4>
					</div>
					<div class="modal-body">
              <form action="tambah_waktutransaksi1.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                <!-- Dropdown List Cabang -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cabang">Cabang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="idcabang" id="cabang-list" class="select2_single form-control" tabindex="-1">
                      <option value="">---Pilih Cabang---</option>
                      <?php
                      if ($resultjs->num_rows > 0) {
                        // output data of each row
                        while($row = $resultjs -> fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row["id_cabang"]; ?>"><?php echo $row["nama_cabang"]; ?> </option>
                      <?php
                        }
                      }?>
                   </select>
                 </div>
               </div>
               <!-- End of Dropdown List Cabang -->

                <!-- Dropdown list Gerbang -->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gerbang">Gerbang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="idgerbang" id="gerbang-list" class="select2_single form-control" tabindex="-1">
                      <option>---Pilih Gerbang---</option>
                    </select>
                  </div>
        			  </div>
                <!-- End of Dropdown list Gerbang -->

                <!-- Dropdown list Tahun -->
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

                      </select>
                    </div>
                  </div>
                  <!-- Dropdown list Semester -->

                  <!-- Dropdown list Tri Wulan -->
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="triwulan">Tri Wulan</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select required="required" name= "triwulan" id="triwulan-list" class="select2_single form-control" tabindex="-1">
                        <option value="">---Pilih Triwulan---</option>
                      </select>
                    </div>
                  </div>
                    <!-- End of Dropdown list Tri Wulan-->

                <!-- field Jenis Gardu Reguluer-->
                <div>
                    <h4><b>Gardu Reguler</b></h4>
                </div>
							  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Waktu Transaksi Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka" type="text" value="1" hidden>
                    <input name= "gardu_terbuka" type="number" min="0" id="gardu_terbuka" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup"><b>Gardu Tertutup</b></h5>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka">Waktu Transaksi Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk" type="text" value="2" hidden>
                    <input name= "gardu_masuk" type="number" min="0" id="gardu_masuk" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar">Waktu Transaksi Gardu Keluar</label>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Waktu Transaksi Gardu Terbuka</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_terbuka_gto" type="text" value="4" hidden>
                    <input name= "gardu_terbuka_gto" type="number" min="0" id="gardu_terbuka_gto" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <h5 class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_tertutup_gto"><b>Gardu Tertutup</b></h5>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_terbuka_gto">Waktu Transaksi Gardu Masuk</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name= "idgardu_masuk_gto" type="text" value="5" hidden>
                    <input name= "gardu_masuk_gto" type="number" min="0" id="gardu_masuk_gto" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gardu_keluar_gto">Waktu Transaksi Gardu Keluar</label>
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
