<?php
include('connect.php');
	if($_POST['id'])
	{
		$id=$_POST['id'];
		$sql=mysql_query("SELECT * FROM sub_program WHERE id_pk = '$id'");

		while($row=mysql_fetch_array($sql))
		{
			$id=$row['id_sp'];
			$data=$row['nama_sp'];
			echo '<option value="'.$id.'">'.$data.'</option>';

		}
	}

?>