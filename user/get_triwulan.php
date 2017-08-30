<?php
require_once('connect.php');
$id_semester = mysql_real_escape_string($_POST['id_semester']);
if($id_semester!='')
{
	$triwulan_result = $connect->query("SELECT * FROM triwulan WHERE id_semester='$id_semester'");
	$options = "<option value=''>---Pilih Triwulan---</option>";
	while($row = $triwulan_result->fetch_assoc()) {
	$options .= "<option value='".$row['id_tw']."'>".$row['triwulan']."</option>";
	}
	echo $options;
}

?>
