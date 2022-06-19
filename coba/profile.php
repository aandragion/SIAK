<?php

require ("config.php");
$type = $_GET['id'];

$query = "SELECT * FROM mahasiswa join jurusan on jurusan.id_programstudi = mahasiswa.id_programstudi where id ='$type'";

//SELECT sum(mutu*sks) / sum(sks) FROM `krs` JOIN jadwal on jadwal.id_jadwal=krs.id_jadwal join kmatkul on kmatkul.id_kmatkul=jadwal.id_kmatkul join dosen on dosen.id_dosen=jadwal.id_dosen join kurikulum on kurikulum.id_kurikulum=kmatkul.id_kurikulum join matkul on matkul.id_matkul=kmatkul.id_matkul join jurusan on jurusan.id_programstudi=kurikulum.id_programstudi join periode on periode.id_periode=kurikulum.id_periode join skala_nilai on skala_nilai.id_snilai=krs.id_snilai WHERE krs.id_mhs=1 and periode.id_periode =1;
$result = mysqli_query($con, $query);

$response = array();

    while( $row = mysqli_fetch_array($result) ){ // perulangan dari fetching asosiativ

        // array_push($response,
        //     array(
            $response['id_mhs']= $row['id_mhs'];
            $response['nama_mhs']= $row['nama_mhs'];
            $response['nama_jurusan']= $row['nama_jurusan'];
            $response['nim']= $row['nim'];
            $response['tempat_lahir']= $row['tempat_lahir'];
            $response['tgl_lahir']= $row['tgl_lahir'];
            $response['alamat']= $row['alamat'];
            $response['rt']= $row['rt'];
            $response['rw']= $row['rw'];
            $response['dusun']= $row['dusun'];
            $response['kelurahan']= $row['kelurahan'];
            $response['kecamatan']= $row['kecamatan'];
            $response['kode_pos']= $row['kode_pos'];
            $response['smt_mahasiswa']= $row['smt_mahasiswa'];
            $response['id_programstudi']= $row['id_programstudi'];

                // 'nama_jurusan'=>$row['nama_jurusan'],
                // 'nim'=> $row['nim'],
                // 'tempat_lahir'=> $row['tempat_lahir'],
                // 'tgl_lahir'=> $row['tgl_lahir'], 
                // 'alamat'=> $row['alamat'],
                // 'rt'=> $row['rt'],
                // 'rw'=> $row['rw'],
                // 'dusun'=> $row['dusun'],
                // 'kelurahan'=> $row['kelurahan'],
                // 'skecamatan'=> $row['kecamatan'],
                // 'kode_pos'=> $row['kode_pos']
        //         )
        // );
    }

    echo json_encode($response);  // enchoding kedalam JSON dari array


mysqli_close($con); // menutup koneksi mysql

?> 