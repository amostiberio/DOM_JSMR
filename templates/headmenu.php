<?php
include ('connect.php'); //connect ke database

  //ambil informasi user id dan cabang id dari table user
  $user = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM user WHERE id_user = '$iduser' "));
  $idcabang = $user['id_cabang'];

  //ambil informasi user id dan cabang id dari table cabang
  $cabang =  mysqli_fetch_array(mysqli_query($connect,"SELECT nama_cabang FROM cabang WHERE id_cabang = '$idcabang'"));
  $namacabang = $cabang['nama_cabang'];
?>

 <div class="profile clearfix">
    <div class="profile_pic">
        <img src="images/dp.jpg" alt="..." class="img-circle profile_img">
    </div>
        <div class="profile_info">
            <span>Welcome, <?php echo $user['username']?></span>
            <h2>Cabang : <?php echo $namacabang ?></h2>
        </div>
</div>
