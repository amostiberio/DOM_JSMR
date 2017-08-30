<?php
session_start();
	include 'connect.php';

		$username = $_POST['username'];
		$password = $_POST['password'];

// query untuk mendapatkan record dari email
	$query = "SELECT * FROM user WHERE username = '$username'";
	$hasil = mysqli_query($connect,$query);
	$data = mysqli_fetch_array($hasil);

// cek kesesuaian password
if ($password == $data['password'])
{
echo "Login Sukses";
    // menyimpan username dan level ke dalam session
    $_SESSION['id_role'] = $data['id_role'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['id_user']	= $data['id_user'];
    header('location: admin.php');
}
else
 echo '<script language="javascript">alert("Username or Password is incorrect !"); document.location="index.php";</script>';
?>
