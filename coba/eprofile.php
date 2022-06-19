<?php
include('config.php');

$id_mhs 	= $_POST['id_mhs'];
$names 	= $_POST['names'];
$Keterangan= $_POST['Keterangan'];



$sql = mysqli_query($con, "UPDATE mahasiswa SET $names='$Keterangan' where id_mhs='$id_mhs'");

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