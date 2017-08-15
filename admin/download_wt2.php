<?php
include "connect.php";
include('akses.php'); //untuk memastikan dia sudah login

  $iduser = $_SESSION['id_user'];

  $resultjs = $connect-> query("SELECT * FROM cabang");

  //ambil informasi jenis sub gardu
  $gardu = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM jenis_subgardu"));

  $idgerbang= mysqli_fetch_array(mysqli_query($connect,"SELECT id_gerbang FROM gerbang"));

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msdownload");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Waktu Transaksi 2 SPM.xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

 <div align="center"> <p>Waktu Transkasi 2 SPM</p></div>

 <table border="1" id="datatable-keytable"  class="table table-striped table-bordered " class="centered">
       <thead >
         <tr >
           <th rowspan="3">No</th>
           <th rowspan="3">Cabang</th>
           <th rowspan="3">Keterangan</th>
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


       </thead>
       <tbody>
         <?php
         $rata_waktu_transaksi = mysqli_query($connect, "SELECT * FROM waktu_transaksi join panjang_antrian join wt_rencana join semester join gerbang on gerbang.id_gerbang=waktu_transaksi.id_gerbang AND gerbang.id_gerbang=panjang_antrian.id_gerbang AND waktu_transaksi.id_semester=semester.id_semester AND waktu_transaksi.id_subgardu=wt_rencana.id_subgardu AND semester.id_semester=panjang_antrian.id_semester GROUP BY waktu_transaksi.id_cabang");
         $nomor = 1;
         $count = 0;
         $total_rataans1=0;
         $total_rataans2=0;
         while($data_waktu_transaksi = mysqli_fetch_array($rata_waktu_transaksi)){

$idcabanglist = $data_waktu_transaksi['id_cabang'];
$idsemesterlist = $data_waktu_transaksi['id_semester'];

$data_cabang = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM cabang WHERE id_cabang = '$idcabanglist'"));
$data_semester1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '1'"));
$data_semester2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM semester WHERE id_semester = '2'"));

$data_tahun= mysqli_fetch_array(mysqli_query($connect, "SELECT tahun from waktu_transaksi where id_cabang = '$idcabanglist'"));

//ambil data semester 1
//Total Data Gardu Masuk Sistem Tertutup Semester 1
$data_gerbang_masuk = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='2' AND id_semester='1'");
$hasil_data_gerbang_masuk = mysqli_fetch_assoc($data_gerbang_masuk);
$total_data_gerbang_masuk = $hasil_data_gerbang_masuk['nilai_total'];
//Total Data Gardu Keluar Sistem Tertutup Semester 1
$data_gerbang_keluar = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='3' AND id_semester='1'");
$hasil_data_gerbang_keluar = mysqli_fetch_assoc($data_gerbang_keluar);
$total_data_gerbang_keluar = $hasil_data_gerbang_keluar['nilai_total'];
//Total Data Gardu Terbuka Semester 1
$data_gerbang_terbuka = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='1' AND id_semester='1'");
$hasil_data_gerbang_terbuka = mysqli_fetch_assoc($data_gerbang_terbuka);
$total_data_gerbang_terbuka = $hasil_data_gerbang_terbuka['nilai_total'];
//Total Data Gardu GTO Masuk Semester 1
$data_gerbang_masuk_gto = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='5' AND id_semester='1'");
$hasil_data_gerbang_masuk_gto = mysqli_fetch_assoc($data_gerbang_masuk_gto);
$total_data_gerbang_masuk_gto = $hasil_data_gerbang_masuk_gto['nilai_total'];
//Total Data Gardu Terbuka GTO Semester 1
$data_gerbang_terbuka_gto = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='4' AND id_semester='1'");
$hasil_data_gerbang_terbuka_gto = mysqli_fetch_assoc($data_gerbang_terbuka_gto);
$total_data_gerbang_terbuka_gto = $hasil_data_gerbang_terbuka_gto['nilai_total'];
//Total Data Gardu GTO Keluar Semester 1
$data_gerbang_keluar_gto = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='6' AND id_semester='1'");
$hasil_data_gerbang_keluar_gto = mysqli_fetch_assoc($data_gerbang_keluar_gto);
$total_data_gerbang_keluar_gto = $hasil_data_gerbang_keluar_gto['nilai_total'];
//Total Data Panjang Antrian Semester 1
$data_panjang_antrian = mysqli_query($connect, "SELECT SUM(panjang_antrian) AS nilai_total FROM panjang_antrian WHERE id_cabang='$idcabanglist' AND id_semester='1'");
$hasil_data_panjang_antrian = mysqli_fetch_assoc($data_panjang_antrian);
$total_data_panjang_antrian = $hasil_data_panjang_antrian['nilai_total'];

//ambil data semester 2
//Total Data Gardu Masuk Semester 2
$data_gerbang_masuk2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='2' AND id_semester='2'");
$hasil_data_gerbang_masuk2 = mysqli_fetch_assoc($data_gerbang_masuk2);
$total_data_gerbang_masuk2 = $hasil_data_gerbang_masuk2['nilai_total'];
//Total Data Gardu Keluar Semester 2
$data_gerbang_keluar2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='3' AND id_semester='2'");
$hasil_data_gerbang_keluar2 = mysqli_fetch_assoc($data_gerbang_keluar2);
$total_data_gerbang_keluar2 = $hasil_data_gerbang_keluar2['nilai_total'];
//Total Data Gardu Terbuka Semester 2
$data_gerbang_terbuka2 = mysqli_query($connect, "SELECT SUM(nilai) AS nilai_total FROM waktu_transaksi WHERE id_cabang='$idcabanglist' AND id_subgardu='1' AND id_semester='2'");
$hasil_data_gerbang_terbuka2 = mysqli_fetch_assoc($data_gerbang_terbuka2);
$total_data_gerbang_terbuka2 = $hasil_data_gerbang_terbuka2['nilai_total'];
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



//Hitung nilai Realisasi Gardu Tol transaksi Semester 1
$array = array($total_data_gerbang_keluar_gto,$total_data_gerbang_terbuka_gto);
$data_gardutol_transaksi = ( array_sum($array) / count($array) );
//Hitung nilai Realisasi Gardu Tol Transaksi Semester 2
$array2 = array($total_data_gerbang_keluar_gto2,$total_data_gerbang_terbuka_gto2);
$data_gardutol_transaksi2 = ( array_sum($array2) / count($array2) );

//ambil data Rencana
 $datarencana_gardu_terbuka = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '1' AND jenis_subgardu.id_jenisgardu='1'"));
 $datarencana_gardu_masuk_tertutup = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '2' AND jenis_subgardu.id_jenisgardu='1'"));
 $datarencana_gardu_keluar_tertutup = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '3' AND jenis_subgardu.id_jenisgardu='1'"));
 $datarencana_gardu_tol_ambil_kartu = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '5' AND jenis_subgardu.id_jenisgardu='2'"));
 $datarencana_gardutol_transaksi = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '4' AND jenis_subgardu.id_jenisgardu='2'"));
 $datarencana_antrian_kendaraan = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM wt_rencana, jenis_subgardu WHERE wt_rencana.id_subgardu = '9' AND jenis_subgardu.id_jenisgardu='3'"));

//Hitung nilai Realisasi Capaian Semester 1
$array3 = array(($datarencana_gardu_masuk_tertutup['nilai']/$total_data_gerbang_masuk),
                ($datarencana_gardu_keluar_tertutup['nilai']/$total_data_gerbang_keluar),
                ($datarencana_gardu_terbuka['nilai']/$total_data_gerbang_terbuka),
                ($datarencana_gardu_tol_ambil_kartu['nilai']/$total_data_gerbang_masuk_gto),
                ($datarencana_gardutol_transaksi['nilai']/$data_gardutol_transaksi),
                ($datarencana_antrian_kendaraan['nilai']/$total_data_panjang_antrian)
              );
       $data_capaian_semester1= (array_sum($array3)/count($array3));
       $persen_capaian_semester1 = number_format( $data_capaian_semester1 * 100, 2 ) . '%'; //2 angka dibelakang koma

//Hitung nilai Realisasi Capaian Semester 1
$array3 = array(($datarencana_gardu_masuk_tertutup['nilai']/$total_data_gerbang_masuk2),
               ($datarencana_gardu_keluar_tertutup['nilai']/$total_data_gerbang_keluar2),
               ($datarencana_gardu_terbuka['nilai']/$total_data_gerbang_terbuka2),
               ($datarencana_gardu_tol_ambil_kartu['nilai']/$total_data_gerbang_masuk_gto2),
               ($datarencana_gardutol_transaksi['nilai']/$data_gardutol_transaksi2),
               ($datarencana_antrian_kendaraan['nilai']/$total_data_panjang_antrian2)
               );
         $data_capaian_semester2= (array_sum($array3)/count($array3));
         $persen_capaian_semester2 = number_format( $data_capaian_semester2 * 100, 2 ) . '%'; //2 angka dibelakang koma



         ?>
         <tr>
           <td rowspan="6"><?php echo $nomor; $nomor++;?></td>
           <td rowspan="6"><?php echo $data_cabang['nama_cabang'] ?></td>
           <td><?php echo "Gardu Masuk Sistem Tertutup"?></td>
           <td><?php echo $datarencana_gardu_masuk_tertutup['nilai'];?></td>
           <td><?php echo $datarencana_gardu_masuk_tertutup['nilai'];?></td>
           <td><?php echo $total_data_gerbang_masuk;?></td>
           <td><?php echo $total_data_gerbang_masuk2;?></td>
           <td rowspan="6"><?php $total_rataans1+=$persen_capaian_semester1;
                                 echo $persen_capaian_semester1;?>
           </td>
           <td rowspan="6"><?php $total_rataans2+=$persen_capaian_semester2;
                                 echo $persen_capaian_semester2;?>
           </td>
         </tr>
         <tr>
           <td><?php echo "Gardu Keluar Sistem Tertutup"?></td>
           <td><?php echo $datarencana_gardu_keluar_tertutup['nilai'];?></td>
           <td><?php echo $datarencana_gardu_keluar_tertutup['nilai'];?></td>
           <td><?php echo $total_data_gerbang_keluar;?></td>
           <td><?php echo $total_data_gerbang_keluar2;?></td>

         </tr>
         <tr>
           <td><?php echo "Gardu Sistem Terbuka"?></td>
           <td><?php echo $datarencana_gardu_terbuka['nilai'];?></td>
           <td><?php echo $datarencana_gardu_terbuka['nilai'];?></td>
           <td><?php echo $total_data_gerbang_terbuka;?></td>
           <td><?php echo $total_data_gerbang_terbuka2;?></td>

         </tr>
         <tr>
           <td><?php echo "Gardu Tol Ambil Kartu"?></td>
           <td><?php echo $datarencana_gardu_tol_ambil_kartu['nilai']?></td>
           <td><?php echo $datarencana_gardu_tol_ambil_kartu['nilai']?></td>
           <td><?php echo $total_data_gerbang_masuk_gto;?></td>
           <td><?php echo $total_data_gerbang_masuk_gto2;?></td>

         </tr>
         <tr>
           <td><?php echo "Gardu Tol Transaksi"?></td>
           <td><?php echo $datarencana_gardutol_transaksi['nilai']?></td>
           <td><?php echo $datarencana_gardutol_transaksi['nilai']?></td>
           <td><?php echo $data_gardutol_transaksi;?></td>
           <td><?php echo $data_gardutol_transaksi2;?></td>

         </tr>
         <tr>
           <td><?php echo "Jumlah Antrian Kendaraan"?></td>
           <td><?php echo $datarencana_antrian_kendaraan['nilai'];?></td>
           <td><?php echo $datarencana_antrian_kendaraan['nilai'];?></td>
           <td><?php echo $total_data_panjang_antrian;?></td>
           <td><?php echo $total_data_panjang_antrian2;?></td>

         </tr>
         <?php $count++;}?>
         <tr>
           <td colspan="7">Rata-rata</td>
           <td> <?php echo $total_rataans1/$count;?></td>
           <td> <?php echo $total_rataans2/$count;?></td>
         </tr>
       </tbody>
     </table>




<div align="right">
 <p>Jakarta, </p>
 <br>

 <p><u>.........</u><br>
 NPP. </p>
<div>