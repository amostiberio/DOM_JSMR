<?php
require_once('connect.php');
$id_cabang = mysql_real_escape_string($_POST['id_cabang']);
if($id_cabang !='')
{	
	
	$program_result = $connect->query("SELECT * FROM program_kerja WHERE id_cabang='$id_cabang' AND jenis ='bpt'");
	$options = "<option value=''>---Pilih Program Kerja---</option>";
	while($row = $program_result->fetch_assoc()) {
	$options .= "<option value='".$row['id_pk']."'>".$row['nama_pk']."</option>";
	
	}
	echo $options;
}

?>