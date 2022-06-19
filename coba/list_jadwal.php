<?php

require ("config.php");
$type = $_GET['hari'];
$id_mhs = $_GET['id_mhs'];
$id_periode = $_GET['id_periode'];
$query = "SELECT * FROM krs  
join jadwal on jadwal.id_jadwal = krs.id_jadwal
join kmatkul on kmatkul.id_kmatkul = jadwal.id_kmatkul
join ruangan  on ruangan.id  =  jadwal.id
join dosen on dosen.id_dosen =  jadwal.id_dosen
join matkul on matkul.id_matkul =  kmatkul.id_matkul
join kurikulum on kurikulum.id_kurikulum =  kmatkul.id_kurikulum
join periode  on periode.id_periode =  kurikulum.id_periode 
where krs.id_mhs = '$id_mhs' 
and jadwal.hari = '$type'
and periode.id_periode = '$id_periode'
and krs.status = 'acc'
";
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_assoc($result) ){ // perulangan dari fetching asosiativ

        array_push($response,
            array(
                'id_krs'=> $row['id_krs'],
                'id_jadwal'=> $row['id_jadwal'],
                'nama_matkul'=> $row['nama_matkul'],
                'nama_dosen'=>$row['nama_dosen'], 
                'jam_mulai'=> $row['jam_mulai'],
                'jam_selesai'=> $row['jam_selesai'],
                'nama_ruangan'=> $row['nama_ruangan'],
                )
        );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 