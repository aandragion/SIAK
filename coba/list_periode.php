<?php

require ("config.php");

$query = "SELECT * FROM periode";
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_assoc($result) ){ // perulangan dari fetching asosiativ

        array_push($response,
            array(
                'id_periode'=> $row['id_periode'],
                'nama_periode'=> $row['nama_periode'],
                'smt_periode'=>$row['smt_periode'] 
                )
        );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 