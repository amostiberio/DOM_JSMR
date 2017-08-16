<?php
include('akses.php'); //untuk memastikan dia sudah login
include ('connect.php'); //connect ke database

  $iduser = $_SESSION['id_user'];

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
                <h3>Laporan KPI</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-table"></i> Table <small>Data Waktu Transaksi </small></h2>

                    <div class="clearfix"></div>
                  </div>
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
                          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">  Download <span class="caret"></span></button>
                          <ul role="menu" class="dropdown-menu pull-right">
                            <li><a href="download_wt1.php" > Download Excels <img src='xls.png' alt="XLSX" style="width:20px"></a></li>
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
                              $rata_waktu_transaksi = mysqli_query($connect, "SELECT * FROM waktu_transaksi join panjang_antrian join semester join gerbang on gerbang.id_gerbang=waktu_transaksi.id_gerbang AND gerbang.id_gerbang=panjang_antrian.id_gerbang AND waktu_transaksi.id_semester=semester.id_semester AND semester.id_semester=panjang_antrian.id_semester GROUP BY waktu_transaksi.id_cabang");
                              $nomor = 1;
                              $count=0;
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
                                <td><?php echo $total_data_gerbang_terbuka;?></td>
                                <td><?php echo $total_data_gerbang_masuk;?></td>
                                <td><?php echo $total_data_gerbang_keluar;?></td>
                                <td><?php echo $total_data_gerbang_terbuka_gto;?></td>
                                <td><?php echo $total_data_gerbang_masuk_gto;?></td>
                                <td><?php echo $total_data_gerbang_keluar_gto;?></td>
                                <td><?php echo $total_data_panjang_antrian;?></td>
                                <td rowspan="2">
                                  <button type="button" class="btn btn-round btn-info" class="btn btn-primary"><a href="waktu_transaksi1_percabang.php?id=<?php echo $data_waktu_transaksi['id_cabang'];?>">

                                   Ubah
                                 </a></button>
                                </td>
                              </tr>
                              <tr>
                                <td><?php echo $data_semester2['semester'];?></td>
                                <td><?php $total_garduterbuka=$total_data_gerbang_terbuka+$total_data_gerbang_terbuka2;
                                          echo $total_data_gerbang_terbuka2;?>
                                </td>
                                <td><?php $total_gardumasuk=$total_data_gerbang_masuk+$total_data_gerbang_masuk2;
                                          echo $total_data_gerbang_masuk2;?>
                                </td>
                                <td><?php $total_gardukeluar=$total_data_gerbang_keluar+$total_data_gerbang_keluar2;
                                          echo $total_data_gerbang_keluar2;?>
                                </td>
                                <td><?php $total_gardugto_terbuka=$total_data_gerbang_terbuka_gto+$total_data_gerbang_terbuka_gto2;
                                          echo $total_data_gerbang_terbuka_gto2;?>
                                </td>
                                <td><?php $total_gardugto_masuk=$total_data_gerbang_masuk_gto+$total_data_gerbang_masuk_gto2;
                                          echo $total_data_gerbang_masuk_gto2;?>
                                </td>
                                <td><?php $total_gardugto_keluar=$total_data_gerbang_keluar_gto+$total_data_gerbang_keluar_gto2;
                                          echo $total_data_gerbang_keluar_gto2;?>
                                </td>
                                <td><?php $total_panjangantrian=$total_data_panjang_antrian+$total_data_panjang_antrian2;
                                          echo $total_data_panjang_antrian2;?>
                                </td>
                              </tr>


                                <?php $count+=2; } ?>
                                <tr>
                                  <td colspan="4"> Rata-rata </td>
                                  <td><?php echo $total_garduterbuka/$count;?></td>
                                  <td><?php echo $total_gardumasuk/$count;?></td>
                                  <td><?php echo $total_gardukeluar/$count;?></td>
                                  <td><?php echo $total_gardugto_terbuka/$count;?></td>
                                  <td><?php echo $total_gardugto_masuk/$count;?></td>
                                  <td><?php echo $total_gardugto_keluar/$count;?></td>
                                  <td><?php echo $total_panjangantrian/$count;?></td>
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
                        <input name ="idcabang" type="text" id="idcabang" value="<?php echo $id_cabang; ?>" hidden>
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
