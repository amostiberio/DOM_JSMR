<?php 
include 'connect.php';

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