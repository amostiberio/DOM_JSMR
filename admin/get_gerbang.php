<?php
require_once('connect.php');
$id_cabang = mysql_real_escape_string($_POST['id_cabang']);
if($id_cabang!='')
{
	$gerbang_result = $connect->query("SELECT * FROM gerbang WHERE id_cabang='$id_cabang'");
	$options = "<option value=''>---Pilih Gerbang---</option>";
	while($row = $gerbang_result->fetch_assoc()) {
	$options .= "<option value='".$row['id_gerbang']."'>".$row['nama_gerbang']."</option>";
	}
	echo $options;
}

?>