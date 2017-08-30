<?php
include 'connect.php';
// memulai session
session_start();
error_reporting(0);
if (isset($_SESSION['id_role']))
{
  $idrole = $_SESSION['id_role'];

  $querycoba = "SELECT * FROM user_role WHERE id_role = '$idrole'";
	$hasilcoba = mysqli_query($connect,$querycoba);
	$datacoba = mysqli_fetch_array($hasilcoba);

    // jika level admin
    if ($datacoba['role'] == "admin")
   {
      echo '<script language="javascript">alert("Welcome Back Admin!"); document.location="admin/home.php";</script>';
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($datacoba['role'] == "user")
   {
      echo '<script language="javascript">alert("Welcome Back User!"); document.location="home.php";</script>';
   }
}
//tidak ada kondisi yang sama
elseif (!isset($datacoba['role']))
{
    header('location:index.php');
}
 ?>
