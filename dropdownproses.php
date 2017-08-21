<?php
include 'connect.php';



if(isset($_POST['dropdownTahunGardu'])){
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];
			$id_gerbang = $_POST ['id_gerbang'];

            if($tahun > 0 ){
 ?>

                <script>document.location.href="gerbang_jmlgardu.php?id_gerbang=<?php echo $id_gerbang;?>&tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="gerbang_jmlgardu.php?id_gerbang=<?php  echo $id_gerbang;?>";</script>
<?php        }

if(isset($_POST['clearTahunGardu1'])){
?>
                <script>document.location.href="gerbang_jmlgardu.php?id_gerbang=<?php  echo $id_gerbang;?>";</script>
<?php
}

if(isset($_POST['dropdownTahunLalin1'])){
            $tahun = $_POST['tahun'];
			$id_gerbang = $_POST ['id_gerbang'];

            if($tahun > 0 ){
 ?>

                <script>document.location.href="gerbang_lalin.php?id_gerbang=<?php echo $id_gerbang;?>&tahun=<?php echo $tahun?>";</script>
<?php       }
            else
?>
                <script>document.location.href="gerbang_lalin.php?id_gerbang=<?php  echo $id_gerbang;?>";</script>
<?php        }

if(isset($_POST['clearTahunLalin1'])){
?>
                <script>document.location.href="gerbang_lalin.php?id_gerbang=<?php echo $id_gerbang;?>";</script>
<?php
}


 if(isset($_POST['dropdownTW'])){
            $triwulan = $_POST['dropDownListTW'];
            $tahun =$_POST['tahun'];
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
            $triwulan = $_POST['dropDownListTW'];
            $tahun =$_POST['tahun'];

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
            $triwulan = $_POST['dropDownListTW'];
            $tahun =$_POST['tahun'];

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
            $triwulan = $_POST['dropDownListTW'];
            $tahun =$_POST['tahun'];

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



        if(isset($_POST['dropdownTahun'])){
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

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
            $tahun = $_POST['tahun'];

            if($tahun > 0 ){
?>

                <script>document.location.href="realisasi_spojt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="realisasi_spojt.php";</script>
<?php
}
if(isset($_POST['dropdownWaktuTransaksi1'])){
            $tahun = $_POST['tahun'];

            if($tahun > 0 ){
?>

                <script>document.location.href="waktu_transaksi1.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="waktu_transaksi1.php";</script>
<?php
}
if(isset($_POST['dropdownWaktuTransaksiPercabang'])){
            $tahun = $_POST['tahun'];
						$id_cabang = $_POST['idcabang'];

            if($tahun > 0 ){
?>

                <script>document.location.href="waktu_transaksi1_percabang.php?id=<?php echo $id_cabang?>&tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="waktu_transaksi1_percabang.php";</script>
<?php
}
if(isset($_POST['dropdownWaktuTransaksi2'])){
            $tahun = $_POST['tahun'];

            if($tahun > 0 ){
?>

                <script>document.location.href="waktu_transaksi2.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else
?>
                <script>document.location.href="waktu_transaksi2.php";</script>
<?php
}

 ?>
