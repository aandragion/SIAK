<?php
include('config.php');

$id_mhs 	= $_POST['id_mhs'];
$names 	= $_POST['names'];
$Keterangan= $_POST['Keterangan'];
$ert= $_POST['ert'];
$erw= $_POST['erw'];
$edusun= $_POST['edusun'];
$ekelurahan= $_POST['ekelurahan'];
$ekecamatan= $_POST['ekecamatan'];
$ekode_pos= $_POST['ekode_pos'];




$sql = mysqli_query($con, "UPDATE mahasiswa SET $names='$Keterangan', 
rt='$ert',
rw='$erw',
dusun='$edusun',
kelurahan='$ekelurahan',
kecamatan='$ekecamatan',
kode_pos='$ekode_pos'

 where id_mhs='$id_mhs'");

if (isset($sql)) {
	$response["error"] = FALSE;
	echo json_encode($response); 
}else {
	$response["error"] = TRUE;
	$response["error_msg"] = "GAGAL UPDATE";
	echo json_encode($response);
}
// } else{
// 	$response["error"] = TRUE;
// 	$response["error_msg"] = "GAGAL UPDATE";
// 	echo json_encode($response);
// }
$response = array("error" => FALSE);
mysqli_close($con);

?>