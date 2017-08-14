<?php 
include 'connect.php';

		if(isset($_POST['dropdownTW'])){
			$triwulan = $_POST['dropDownListTW'];
            if(isset($_POST['tahun'])){
                $tahun =$_POST['tahun'];
		     if($tahun >0 && $triwulan >0){ ?>
                <script>document.location.href="laporan_bpt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

            }else{
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
		    if(isset($_POST['tahun'])){
                $tahun =$_POST['tahun'];
                 if($tahun > 0 && $triwulan >0){ ?>
                  <script>document.location.href="laporan_bpll.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

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
            if(isset($_POST['tahun'])){
                $tahun =$_POST['tahun'];
                 if($tahun > 0 && $triwulan >0){ ?>
                  <script>document.location.href="laporan_spojt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

            }else {
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
            if(isset($_POST['tahun'])){
                $tahun =$_POST['tahun'];
                 if($tahun > 0 && $triwulan >0){ ?>
                  <script>document.location.href="laporan_spjt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

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

if(isset($_POST['dropdownTahunLaporanbpt'])){
            $tahun = $_POST['tahun'];
            if(isset($_POST['triwulan'])){
                $triwulan = $_POST['triwulan'];
                if($tahun >0 && $triwulan >0){ ?>
                <script>document.location.href="laporan_bpt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

            }else{
            if($tahun > 0 ){
?>

                <script>document.location.href="laporan_bpt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_bpt.php";</script>
<?php       
    }
}

if(isset($_POST['dropdownTahunLaporanbpll'])){
            $tahun = $_POST['tahun'];
            if(isset($_POST['triwulan'])){
                $triwulan = $_POST['triwulan'];
                if($tahun >0 && $triwulan >0){ ?>
                <script>document.location.href="laporan_bpll.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

            }else{
            if($tahun > 0 ){
?>

                <script>document.location.href="laporan_bpll.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_bpll.php";</script>
<?php       
    }
}


if(isset($_POST['dropdownTahunLaporanspojt'])){
            $tahun = $_POST['tahun'];
            if(isset($_POST['triwulan'])){
                $triwulan = $_POST['triwulan'];
                if($tahun >0 && $triwulan >0){ ?>
                <script>document.location.href="laporan_spojt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

            }else{
            if($tahun > 0 ){
?>

                <script>document.location.href="laporan_spojt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_spojt.php";</script>
<?php       
    }
}

if(isset($_POST['dropdownTahunLaporanspjt'])){
            $tahun = $_POST['tahun'];
            if(isset($_POST['triwulan'])){
                $triwulan = $_POST['triwulan'];
                if($tahun >0 && $triwulan >0){ ?>
                <script>document.location.href="laporan_spjt.php?tahun=<?php echo $tahun;?>&triwulan=<?php echo $triwulan;?>";</script>

           <?php }

            }else{
            if($tahun > 0 ){
?>

                <script>document.location.href="laporan_spjt.php?tahun=<?php echo $tahun;?>";</script>
<?php       }
            else 
?>               
                <script>document.location.href="laporan_spjt.php";</script>
<?php       
    }
}
?>