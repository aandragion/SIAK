<?php
include('config.php');

$id_jadwal   = $_POST['id'];
$id_mhs   = $_POST['id_mhs'];

// $sql = mysqli_query($con, "insert into krs(id_jadwal, id_mhs, status) values (
// 	'$id_jadwal', 
// 	'$id_mhs',
// 	'proses')");

$sql = "SELECT * FROM krs WHERE id_jadwal = '$id_jadwal' and id_mhs = '$id_mhs'";
$res = mysqli_query($con, $sql);

$check = mysqli_fetch_array($res);

if (!isset($check)) {
  $sqlkrs = mysqli_query($con, "insert into krs(id_jadwal, id_mhs, status) values (
	'$id_jadwal', 
	'$id_mhs',
	'proses')");

  if (isset($sqlkrs)) {
    $response["error"] = FALSE;
    echo json_encode($response);
    // }
    // elseif($password != $repassword){
    // 	echo "password tidak sama";
  } else {
    $response["error"] = TRUE;
    $response["error_msg"] = "akun anda belum terdaftar mohon periksa kembali";
    echo json_encode($response);
  }
  $response = array("error" => FALSE);
} else {
  $response["error"] = TRUE;
  $response["error_msg"] = "Anda Sudah Mengajukan KRS";
  echo json_encode($response);
}
$response = array("error" => FALSE);
mysqli_close($con);
