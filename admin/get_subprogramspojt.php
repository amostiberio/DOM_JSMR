<?php
require_once('connect.php');
$id_pk = mysql_real_escape_string($_POST['id_pk']);
if($id_pk!='')
{
	$subprogram_result = $connect->query("SELECT * FROM sub_program WHERE id_pk='$id_pk'");
	$options = "<option value=''>---Pilih Subprogram Kerja---</option>";
	while($row = $subprogram_result->fetch_assoc()) {
	$options .= "<option value='".$row['id_sp']."'>".$row['nama_sp']."</option>";
	}
	echo $options;
}

?>