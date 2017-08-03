<?php
include 'connect.php';
if(isset($_GET['id_realisasi'])) 
{

$id    = $_GET['id_realisasi'];

$result = mysqli_query($connect,"SELECT nama_file, type_file, content, size_file FROM realisasi_laporan WHERE id_realisasi = '$id'") or die('Error, query failed');
list($name, $type, $content, $size) = mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");

header("Content-Disposition: attachment; filename=$name.$type");
echo $content;

exit;
}

?>