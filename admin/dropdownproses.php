<?php
include 'connect.php';
include 'anti_inject.php';



if(isset($_POST['dropdownTahunGardu'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
 ?>

                <script>document.location.href="jml_gardu.php?tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="jml_gardu.php";</script>
<?php        }

if(isset($_POST['clearTahunGardu'])){
?>
                <script>document.location.href="jml_gardu.php";</script>
<?php
}

if(isset($_POST['dropdownTahunLalin'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
 ?>

                <script>document.location.href="lalin_jj.php?tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="lalin_jj.php";</script>
<?php        }

if(isset($_POST['clearTahunLalin'])){
?>
                <script>document.location.href="lalin_jj.php";</script>
<?php
}

if(isset($_POST['dropdownTahunSDM'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
 ?>

                <script>document.location.href="jumlah_sdm.php?tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="jumlah_sdm.php";</script>
<?php        }

if(isset($_POST['clearTahunSDM'])){
?>
                <script>document.location.href="jumlah_sdm.php";</script>
<?php
}

if(isset($_POST['dropdownTahunRatio'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
 ?>

                <script>document.location.href="vc_ratio.php?tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="vc_ratio.php";</script>
<?php        }

if(isset($_POST['clearTahunRatio'])){
?>
                <script>document.location.href="vc_ratio.php";</script>
<?php
}

if(isset($_POST['dropdownTahunGardu1'])){
            $tahun = anti_injection($_POST['tahun']);
			        $id_cabang = anti_injection($_POST ['id_cabang']);
            if($tahun > 0 ){
 ?>

                <script>document.location.href="cabang_jmlgardu.php?id_cabang=<?php echo $id_cabang;?>&tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="cabang_jmlgardu.php?id_cabang=<?php  echo $id_cabang;?>";</script>
<?php        }

if(isset($_POST['clearTahunGardu1'])){
	$id_cabang = anti_injection($_POST ['id_cabang']);
?>
                <script>document.location.href="cabang_jmlgardu.php?id_cabang=<?php  echo $id_cabang;?>";</script>
<?php
}

if(isset($_POST['dropdownTahunLalin1'])){
            $tahun = anti_injection($_POST['tahun']);
			$id_cabang = anti_injection($_POST ['id_cabang']);

            if($tahun > 0 ){
 ?>

                <script>document.location.href="cabang_lalin.php?id_cabang=<?php echo $id_cabang;?>&tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="cabang_lalin.php?id_cabang=<?php  echo $id_cabang;?>";</script>
<?php        }

if(isset($_POST['clearTahunLalin1'])){
	$id_cabang = anti_injection($_POST ['id_cabang']);
?>
                <script>document.location.href="cabang_lalin.php?id_cabang=<?php  echo $id_cabang;?>";</script>
<?php
}

if(isset($_POST['dropdownTahunSDM1'])){
            $tahun = anti_injection($_POST['tahun']);
			$id_cabang = anti_injection($_POST ['id_cabang']);

            if($tahun > 0 ){
 ?>

                <script>document.location.href="cabang_jmlsdm.php?id_cabang=<?php echo $id_cabang;?>&tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="cabang_jmlsdm.php?id_cabang=<?php  echo $id_cabang;?>";</script>
<?php        }

if(isset($_POST['clearTahunSDM1'])){
	$id_cabang = anti_injection($_POST ['id_cabang']);
?>
                <script>document.location.href="cabang_jmlsdm.php?id_cabang=<?php  echo $id_cabang;?>";</script>
<?php
}

        if(isset($_POST['dropdownTahunCSI'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="csi.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="csi.php";</script>
<?php
}
 if(isset($_POST['dropdownTahunRencanaBpt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="rencana_bpt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="rencana_bpt.php";</script>
<?php
}
  if(isset($_POST['dropdownTahunRealisasiBpt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="realisasi_bpt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="realisasi_bpt.php";</script>
<?php
}

 if(isset($_POST['dropdownTahunRencanaBpll'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="rencana_bpll.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="rencana_bpll.php";</script>
<?php
}

if(isset($_POST['dropdownTahunRealisasiBpll'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="realisasi_bpll.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="realisasi_bpll.php";</script>
<?php
}

 if(isset($_POST['dropdownTahunRencanaSpjt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="rencana_spjt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="rencana_spjt.php";</script>
<?php
}
 if(isset($_POST['dropdownTahunRealisasiSpjt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="realisasi_spjt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="realisasi_spjt.php";</script>
<?php
}

if(isset($_POST['dropdownTahunRencanaSpojt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="rencana_spojt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="rencana_spojt.php";</script>
<?php
}

if(isset($_POST['dropdownTahunRealisasiSpojt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="realisasi_spojt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="realisasi_spojt.php";</script>
<?php
}

if(isset($_POST['dropdownTW'])){
            $triwulan = anti_injection($_POST['dropDownListTW']);
            $tahun = anti_injection($_POST['tahun']);
             if($tahun >0 && $triwulan >0){ ?>
                <script>document.location.href="laporan_bpt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }
            else if($tahun >0){
                ?>
                <script>document.location.href="laporan_bpt.php?tahun=<?php echo $tahun;?>";</script>

           <?php
            }

            else{
            if($triwulan > 0 ){
?>

                <script>document.location.href="laporan_bpt.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else
?>
                <script>document.location.href="laporan_bpt.php";</script>
<?php        }
}

if(isset($_POST['dropdownTWBPLL'])){
            $triwulan = anti_injection($_POST['dropDownListTW']);
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 && $triwulan >0){ ?>
                  <script>document.location.href="laporan_bpll.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php

            }else if($tahun >0){
                ?>
                <script>document.location.href="laporan_bpll.php?tahun=<?php echo $tahun;?>";</script>

           <?php
            }else{
            if($triwulan > 0 ){
 ?>

                <script>document.location.href="laporan_bpll.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else
?>
                <script>document.location.href="laporan_bpll.php";</script>
<?php        }
}


if(isset($_POST['dropdownTWSPOJT'])){
            $triwulan = anti_injection($_POST['dropDownListTW']);
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 && $triwulan >0){ ?>
                  <script>document.location.href="laporan_spojt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php

            }else if($tahun >0){
                ?>
                <script>document.location.href="laporan_spojt.php?tahun=<?php echo $tahun;?>";</script>

           <?php
            }
            else {
            if($triwulan > 0 ){
 ?>

                <script>document.location.href="laporan_spojt.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else
?>
                <script>document.location.href="laporan_spojt.php";</script>
<?php        }
}

if(isset($_POST['dropdownTWSPJT'])){
            $triwulan = anti_injection($_POST['dropDownListTW']);
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 && $triwulan >0){ ?>
                  <script>document.location.href="laporan_spjt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php

            }else if($tahun >0){
                ?>
                <script>document.location.href="laporan_spjt.php?tahun=<?php echo $tahun;?>";</script>

           <?php
            }else {
            if($triwulan > 0 ){
 ?>

                <script>document.location.href="laporan_spjt.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else
?>
                <script>document.location.href="laporan_spjt.php";</script>
<?php        }
}
if(isset($_POST['dropdownWaktuTransaksi1'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="waktu_transaksi1.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="waktu_transaksi1.php";</script>
<?php
}
if(isset($_POST['clearTahunWT1'])){
?>
                <script>document.location.href="waktu_transaksi1.php";</script>
<?php
}
if(isset($_POST['dropdownWaktuTransaksiPercabang'])){
            $tahun = anti_injection($_POST['tahun']);
						$id_cabang = anti_injection($_POST['idcabang']);

            if($tahun > 0 ){
?>

                <script>document.location.href="waktu_transaksi1_percabang.php?id=<?php echo $id_cabang?>&tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="waktu_transaksi1_percabang.php";</script>
<?php
}
if(isset($_POST['clearTahunWT1Percabang'])){
  $id_cabang = anti_injection($_POST['idcabang']);
?>
                <script>document.location.href="waktu_transaksi1_percabang.php?id=<?php echo $id_cabang?>";</script>
<?php
}
if(isset($_POST['dropdownWaktuTransaksi2'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="waktu_transaksi2.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="waktu_transaksi2.php";</script>
<?php
}
if(isset($_POST['clearTahunWT2'])){
?>
                <script>document.location.href="waktu_transaksi2.php";</script>
<?php
}


if(isset($_POST['dropdownTahunStatusLaporanBulanan'])){
            $ambilTanggal =anti_injection( $_POST['tahun']);


            if($ambilTanggal > 0 ){
?>

                <script>document.location.href="statuslaporanbulanan.php?tahun=<?php echo $ambilTanggal;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="statuslaporanbulanan.php";</script>
<?php
}



if(isset($_POST['dropdownTahunLaporanRealisasi'])){
                    $idcabang = anti_injection($_POST['dropDownCabangLaporan']);
                    $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
                if($idcabang >0 ){

?>
                <script>document.location.href="laporanrealisasi.php?tahun=<?php echo $tahun;?>&cabang=<?php echo $idcabang?>";</script>
<?php

                }
                else{
?>

                <script>document.location.href="laporanrealisasi.php?tahun=<?php echo $tahun;?>";</script>
<?php
                }
            }
            else{
                if($idcabang >0 ){
?>
                <script>document.location.href="laporanrealisasi.php?cabang=<?php echo $idcabang?>";</script>
<?php
                }
                else{
?>
                <script>document.location.href="laporanrealisasi.php";</script>
<?php
                }
            }

}
if(isset($_POST['clearTahunLaporanRealisasi'])){
?>
                <script>document.location.href="laporanrealisasi.php";</script>
<?php
}

if(isset($_POST['dropdownTahunRevisiBpt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="revisi_bpt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="revisi_bpt.php";</script>
<?php
}
if(isset($_POST['dropdownTahunRevisiBpll'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="revisi_bpll.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="revisi_bpll.php";</script>
<?php
}
if(isset($_POST['dropdownTahunRevisiSpojt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="revisi_spojt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="revisi_spojt.php";</script>
<?php
}
if(isset($_POST['dropdownTahunRevisiSpjt'])){
            $tahun = anti_injection($_POST['tahun']);

            if($tahun > 0 ){
?>

                <script>document.location.href="revisi_spjt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="revisi_spjt.php";</script>
<?php
}
 ?>
