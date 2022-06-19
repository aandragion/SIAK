<?php

require ("config.php");

$query = "SELECT * FROM tb_jalurmasuk";
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_assoc($result) ){ // perulangan dari fetching asosiativ

        array_push($response,
            array(
                'id_jalurmasuk'=> $row['id_jalurmasuk'],
                'jalur_masuk'=>$row['jalur_masuk'] 
                )
        );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 