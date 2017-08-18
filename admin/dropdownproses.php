<?php 
include 'connect.php';

		if(isset($_POST['dropdownTW'])){
			$triwulan = $_POST['dropDownListTW'];
		 
            if($triwulan > 0 ){
?>

                <script>document.location.href="laporan_bpt.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_bpt.php";</script>
<?php        }

if(isset($_POST['dropdownTWBPLL'])){
			$triwulan = $_POST['dropDownListTW'];
		 
            if($triwulan > 0 ){
 ?>

                <script>document.location.href="laporan_bpll.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_bpll.php";</script>
<?php        }


if(isset($_POST['dropdownTWSPOJT'])){
            $triwulan = $_POST['dropDownListTW'];
         
            if($triwulan > 0 ){
 ?>

                <script>document.location.href="laporan_spojt.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_spojt.php";</script>
<?php        }

if(isset($_POST['dropdownTWSPJT'])){
            $triwulan = $_POST['dropDownListTW'];
         
            if($triwulan > 0 ){
 ?>

                <script>document.location.href="laporan_spjt.php?triwulan=<?php echo $triwulan?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_spjt.php";</script>
<?php        }

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
?>

?>