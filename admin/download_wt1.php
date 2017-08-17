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
header("Content-Disposition: attachment; filename=Waktu Transaksi 1.xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>

 <div align="center"> <p>Waktu Transkasi 1</p></div>

 <table border="1" id="datatable-keytable"  class="table table-striped table-bordered text-center">
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
               <?php $hasil_rataangarduterbuka=($total_garduterbukas1+$total_garduterbukas2)/($count_garduterbukas1+$count_garduterbukas2);
                     echo number_format((float)$hasil_rataangarduterbuka, 2, '.', '');
               ?>
             </td>
             <td>
               <?php $hasil_rataangardumasuk=($total_gardumasuks1+$total_gardumasuks2)/($count_gardumasuks1+$count_gardumasuks2);
                     echo number_format((float)$hasil_rataangardumasuk, 2, '.', '');
               ?>
             </td>
             <td>
               <?php $hasil_rataangardukeluar=($total_gardukeluars1+$total_gardukeluars2)/($count_gardukeluars1+$count_gardukeluars2);
                     echo $hasil_rataangardukeluar;
               ?>
             </td>
             <td>
               <?php $hasil_rataangarduterbukagto=($total_garduterbukagtos1+$total_garduterbukagtos2)/($count_garduterbukagtos1+$count_garduterbukagtos2);
                     echo number_format((float)$hasil_rataangarduterbukagto, 2, '.', '');
               ?>
             </td>
             <td>
               <?php $hasil_rataangardumasukgto=($total_gardumasukgtos1+$total_gardumasukgtos2)/($count_gardumasukgtos1+$count_gardumasukgtos2);
                     echo number_format((float)$hasil_rataangardumasukgto, 2, '.', '');
               ?>
             </td>
             <td>
               <?php $hasil_rataangardukeluargto=($total_gardukeluargtos1+$total_gardukeluargtos2)/($count_gardukeluargtos1+$count_gardukeluargtos2);
                     echo number_format((float)$hasil_rataangardukeluargto, 2, '.', '');
               ?>
             </td>
             <td>
               <?php $hasil_rataanpanjangantrian=($total_panjangantrians1+$total_panjangantrians2)/($count_panjangantrians1+$count_panjangantrians2);
                     echo number_format((float)$hasil_rataanpanjangantrian, 2, '.', '');
               ?>
             </td>
           </tr>
       </tbody>
     </table>




<div align="right">
 <p>Jakarta, </p>
 <br>

 <p><u>.........</u><br>
 NPP. </p>
<div>
