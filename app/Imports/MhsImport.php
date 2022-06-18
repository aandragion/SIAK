<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
//use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MhsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
	//HeadingRowFormatter::default('none'); 
	 
    public function model(array $row)
    {
		$idnew=User::orderBy('id','DESC')->first();
		$idnew1=$idnew->id;
		$idfinal=$idnew1+1;
		
        Mahasiswa::create([
            
			'id'  => $idfinal,
            'nim'     => $row['nim'],
            'nama_mhs'     => $row['nama'],
            'tempat_lahir'     => $row['tempat_lahir'],
            'tgl_lahir'     => $row['tgl_lahir'],
            'jns_kelamin'     => $row['jenis_kelamin'],
            'agama'     => $row['agama'],
            'id_programstudi'     => $row['id_prodi'],
            'angkatan'     => $row['angkatan'],
            'no_tlp'     => $row['no_telepon'],
            'alamat'     => $row['alamat'],
            'rt'     => $row['rt'],
            'rw'     => $row['rw'],
            'dusun'     => $row['dusun'],
            'kelurahan'     => $row['kelurahan'],
            'kecamatan'     => $row['kecamatan'],
            'kode_pos'     => $row['kode_pos'],
            'jns_tinggal'     => $row['jenis_tinggal'],
            'alat_tranportasi'     => $row['alat_transportasi'],
            'email'     => $row['email'],
            'nik'     => $row['nik'],
            'nisn'     => $row['nisn'],
            'npwp'     => $row['npwp'],
            'kewarganegaraan'     => $row['kewarganegaraan'],
            'status'     => $row['status'],
			'smt_mahasiswa' => 1,

        ]);
		
		$in_vocer = $row['nim'];
        //$arrayvocer = explode('0', $in_vocer);
        $id_jalurendaftaran = 1;
        $id_jalurmasuk = 1;
        // dd($id_jalurmasuk);

        //buat username
        $in_nama = $row['nama'];
        $arraynama = explode(' ', $in_nama);
        $usernamebaru = ($arraynama[0]);

        // dd($usernamebaru);

        //buat usertype
        $role = 'mhs';

        //buat noregis
        $tahun = date('Y');
        $idterakhir = User::latest()->first()->id;
        $tambah = $idterakhir + 1;
        $idbaru = $tahun . '00' . $tambah;


        // username fix
        //$usernameinput = $usernamebaru . '00' . $tambah;
		$usernameinput=$row['nim'];

        //kirim email
        // $name  =  $data['name'];
        $email = $row['email'];
        $data2 = array(
            'name' => $row['nama'],
            'email' => $row['email'],
            'password' => $usernameinput,

        );
        //Mail::send('email_template', $data2, function ($mail) use ($email) {
        //   $mail->to($email, 'no-replay')
        //        ->subject("Akun Pmb");
        //    $mail->from('pmb@polimersia.ac.id', 'Panitia PMB');
        //});


        User::create([
			'id' => $idfinal,
            'nama_calon_mahasiswa' => $row['nama'],
            'usertype' => $role,
            'email' => $row['email'],
            'password' => Hash::make($usernameinput),
            'no_hp' => $row['no_telepon'],
            'id_programstudi' => $row['id_prodi'],
            
        ]);
    }
}
