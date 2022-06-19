<?php

require ("config.php");
$type = $_GET['id_periode'];
$id_mhs = $_GET['id_mhs'];
$query = "SELECT * FROM krs  
join jadwal on jadwal.id_jadwal = krs.id_jadwal
join kmatkul on kmatkul.id_kmatkul = jadwal.id_kmatkul
join ruangan  on ruangan.id  =  jadwal.id
join dosen on dosen.id_dosen =  jadwal.id_dosen
join matkul on matkul.id_matkul =  kmatkul.id_matkul
join kurikulum on kurikulum.id_kurikulum =  kmatkul.id_kurikulum
join periode  on periode.id_periode =  kurikulum.id_periode 
join skala_nilai  on skala_nilai.id_snilai =  krs.id_snilai 
where krs.id_mhs = '$id_mhs' 
and periode.id_periode ='$type';
";
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_assoc($result) ){ // perulangan dari fetching asosiativ

        array_push($response,
            array(
                'id_krs'=> $row['id_krs'],
                'nama_matkul'=> $row['nama_matkul'],
                'sks'=>$row['sks'], 
                'grade'=> $row['grade'],
                'mutu'=> $row['mutu']
                )
        );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 