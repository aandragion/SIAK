<?php

require ("config.php");

$query = "SELECT * FROM tb_jalurpendaftaran";
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_assoc($result) ){ // perulangan dari fetching asosiativ

        array_push($response,
            array(
                'id_jalurpendaftaran'=> $row['id_jalurpendaftaran'],
                'jalur_pendaftaran'=>$row['jalur_pendaftaran'] 
                )
        );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 