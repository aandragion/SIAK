<?php

require ("config.php");
$type = $_GET['id'];

$query = "SELECT id_jadwal, COUNT(id_jadwal) AS total FROM `krs`WHERE id_jadwal='$type';";

//SELECT sum(mutu*sks) / sum(sks) FROM `krs` JOIN jadwal on jadwal.id_jadwal=krs.id_jadwal join kmatkul on kmatkul.id_kmatkul=jadwal.id_kmatkul join dosen on dosen.id_dosen=jadwal.id_dosen join kurikulum on kurikulum.id_kurikulum=kmatkul.id_kurikulum join matkul on matkul.id_matkul=kmatkul.id_matkul join jurusan on jurusan.id_programstudi=kurikulum.id_programstudi join periode on periode.id_periode=kurikulum.id_periode join skala_nilai on skala_nilai.id_snilai=krs.id_snilai WHERE krs.id_mhs=1 and periode.id_periode =1;
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_array($result) ){ // perulangan dari fetching asosiativ
            $response['id_jadwal']= $row['id_jadwal'];
            $response['total']= $row['total'];
 
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 