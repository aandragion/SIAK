<?php

require ("config.php");

$query = "SELECT * FROM jurusan";
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_assoc($result) ){ // perulangan dari fetching asosiativ

        array_push($response,
            array(
                'id_programstudi'=> $row['id_programstudi'],
                'kode_jurusan'=> $row['kode_jurusan'],
                'nama_jurusan'=> $row['nama_jurusan'],
                'id_fakultas'=> $row['id_fakultas'],
                'jenjang'=> $row['jenjang'],
                'jumlah_semester'=>$row['jumlah_semester'] 
                )
        );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 