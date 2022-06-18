<?php

namespace App\Http\Controllers;

use App\Exports\MhsExport;
use App\Imports\MhsImport;
use App\Models\JalurMasuk;
use App\Models\jurusan;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\OrtuMhs;
use App\Models\PendidikanMhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    // 
    public function index() 
    {
        $prodi = jurusan::all();
        $jmasuk = JalurMasuk::all();
        $mahasiswa = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->select('mahasiswa.*', 'jurusan.*')
            ->paginate(10);
        return view("/admin/dmahasiswa", compact("prodi", "mahasiswa","jmasuk"));
    }

    public function hstudi()
    {
        $mahasiswa = Krs::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->select('mahasiswa.*', 'jurusan.*')
            ->get();
        return view("/admin/dmahasiswa", compact("prodi", "mahasiswa"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
	
	
	public function messages()
{
    return [
        'nim.required' => 'A title is required',
        
    ];
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
	$rules = [
        'nim' => 'required',
		'nama_mhs' => 'required',
		'tempat_lahir' => 'required',
		'tgl_lahir' => 'required',
		'jns_kelamin' => 'required',
		'agama' => 'required',
		'id_jalurmasuk' => 'required',
		'id_programstudi' => 'required',
		'angkatan' => 'required',
		'no_tlp' => 'required',
		'kelurahan' => 'required',
		'kecamatan' => 'required' ,
		'email' => 'required|unique:mahasiswa',
		'nik' => 'required',
		'nisn' => 'required',
		'kewarganegaraan' => 'required',
         
    ];

    $customMessages = [
        'required' => ':attribute wajib diisi.',
		'id_programstudi.required' => 'Program Studi wajib diisi.',
		'id_jalurmasuk.required' => 'Jalur Masuk wajib diisi',
		'no_tlp.required' => 'Nomer Telepon wajib diisi',
		'nim.required' => 'NIM wajib diisi.',
		'nama_mhs.required' => 'Nama Mahasiswa wajib diisi.',
		'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
		'tgl_lahir.required' => 'Tanggal lahir wajib diisi.',
		'jns_kelamin.required' => 'Jenis kelamin wajib diisi.',
		'agama.required' => 'Agama wajib diisi.',
		'angkatan.required' => 'Angkatan wajib diisi.',
		'kelurahan.required' => 'Kelurahan wajib diisi.',
		'kecamatan.required' => 'Kecamatan wajib diisi.',
		'email.required' => 'Email wajib diisi.',
		'nik.required' => 'NIK wajib diisi.',
		'nisn.required' => 'NISN wajib diisi.',
		'kewarganegaraan.required' => 'Kewarganegaraan wajib diisi.',
		'email.unique' => 'Email sudah dipakai.',
    ];

    $this->validate($request, $rules, $customMessages);
		
		
		$idnew=User::orderBy('id','DESC')->first();
		$idnew1=$idnew->id;
		$idfinal=$idnew1+1;
		
        Mahasiswa::create([
			'id' => $idfinal,
            'nim' => $request->nim,
            'nama_mhs' => $request->nama_mhs,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jns_kelamin' => $request->jns_kelamin,
            'agama' => $request->agama,
            'id_programstudi' => $request->id_programstudi,
            'angkatan' => $request->angkatan,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'dusun' => $request->dusun,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'jns_tinggal' => $request->jns_tinggal,
            'alat_tranportasi' => $request->alat_tranportasi,
            'email' => $request->email,
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'npwp' => $request->npwp,
            'kewarganegaraan' => $request->kewarganegaraan,
            'status' => $request->status,
            'anak_ke' => $request->anak_ke,
            'jml_saudara' => $request->jml_saudara,
            'id_jalurmasuk' => $request->id_jalurmasuk,
            'kps' => $request->kps,
			'smt_mahasiswa' => 1,
            
        ]);
		
		//input data ke user
		//$in_vocer = $row[1];
        //$arrayvocer = explode('0', $in_vocer);
       // $in_vocer = $data['vocer'];
       // $arrayvocer = explode('0', $in_vocer);
       // $id_jalurendaftaran = ($arrayvocer[2]);
       // $id_jalurmasuk = ($arrayvocer[3]);
        // dd($id_jalurmasuk);

        //buat username
        $in_nama = $request->nama_mhs;
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
        $usernameinput = $usernamebaru . '00' . $tambah;

        //kirim email
        // $name  =  $data['name'];
        //$email = $data['email'];
       // $data2 = array(
        //    'name' => $data['name'],
        //    'email' => $data['email'],
        //    'password' => $usernameinput,

        //);
        //Mail::send('email_template', $data2, function ($mail) use ($email) {
        //   $mail->to($email, 'no-replay')
        //        ->subject("Akun Pmb");
        //    $mail->from('pmb@polimersia.ac.id', 'Panitia PMB');
        //});


        User::create([
			'id' => $idfinal,
            'nama_calon_mahasiswa' => $request->nama_mhs,
            'no_registrasi' => $idbaru,
            'usertype' => $role,
            'email' => $request->email,
            'password' => Hash::make($request->nim),
            'no_hp' => $request->no_tlp,
            'id_jalurmasuk' => $request->id_jalurmasuk,
            'id_programstudi' => $request->id_programstudi,
        ]);
		
        return redirect('dmahasiswa');
    }
	
	public function storemhs(Request $request,$id)
    {
         //dd($request->all());
		 
		 
		Mahasiswa::where('id_mhs',$id)->update(['status' => $request->status]);
		 
		
        return redirect('dmahasiswa');  
    }
	
	public function storesmtmhs(Request $request,$id)
    {
         //dd($request->all());
		 
		
		if($request->status == 'Lolos'){
			$semester=Mahasiswa::where('id_mhs',$id)->first();
			$smt1=$semester->smt_mahasiswa+1;			
			Mahasiswa::where('id_mhs',$id)->update(['smt_mahasiswa' => $smt1]);	
		}else{
			
		}	
		
		
		 
		
        return redirect('dmahasiswa');  
    }
	

    public function mhsexport(){
        return Excel::download(new MhsExport,'mahasiswa.xlsx');
    }

    public function mhsimport(Request $request){
        $file =$request->file('file');
        $namaFile =$file->getClientOriginalName();
        $file->move('DataMahasiswa', $namaFile);

        Excel::import(new MhsImport, public_path('/DataMahasiswa/'.$namaFile));
        return redirect('dmahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $s_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);

        return view("admin/mahasiswa/d_mhs/dtl_mahasiswa", compact("s_mhs"));
    }
    public function showdidik($id)
    {
        //
        $sd_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);
        
        $pendidikan = PendidikanMhs::where('pendidikan_mhs.id_mhs', $id)
        ->get();
        return view("admin/mahasiswa/d_mhs/d_pendidikan", compact("sd_mhs","pendidikan"));
    }

    public function showortu($id)
    {
        //
        $so_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);

            $ortu = OrtuMhs::where('ortu_mhs.id_mhs', $id)
            ->get();
        return view("admin/mahasiswa/d_mhs/d_ortu", compact("so_mhs","ortu"));
    }

   

    public function showakademi($id)
    {
        //
        $sa_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);
        $krs = Krs::join('mahasiswa', 'mahasiswa.id_mhs', '=', 'krs.id_mhs')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'krs.id_jadwal')
            ->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')
            ->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')
            ->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')
            ->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')
            ->join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
            ->leftjoin('skala_nilai', 'skala_nilai.id_snilai', '=', 'krs.id_snilai')
            ->where('krs.id_mhs', $id)
            ->get();
        return view("admin/mahasiswa/d_akademi/d_akademi", compact("sa_mhs", "krs"));
    }
	
	public function showvalkrs($id, $id2){
		$val_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);
		$krs = Krs::join('mahasiswa', 'mahasiswa.id_mhs', '=', 'krs.id_mhs')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'krs.id_jadwal')
            ->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')
            ->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')
            ->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')
            ->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')
            ->join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
			->join('ruangan','ruangan.id','=','jadwal.id')
            ->leftjoin('skala_nilai', 'skala_nilai.id_snilai', '=', 'krs.id_snilai')
            ->where('krs.id_mhs', $id)->where('kmatkul.semester',$id2)
            ->paginate(10);
		
		$krs1 = Krs::join('mahasiswa', 'mahasiswa.id_mhs', '=', 'krs.id_mhs')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'krs.id_jadwal')
            ->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')
            ->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')
            ->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')
            ->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')
            ->join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
			->join('ruangan','ruangan.id','=','jadwal.id')
            ->leftjoin('skala_nilai', 'skala_nilai.id_snilai', '=', 'krs.id_snilai')
            ->where('krs.id_mhs', $id)->where('kmatkul.semester',$id2)
            ->sum('matkul.sks');
		
		$semester = $id2;	
		
			return view("admin/valkrs", compact("krs","val_mhs","krs1","semester"));
	}

    public function showtranskrip($id)
    {
        //
        $st_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);
        $krs = Krs::join('mahasiswa', 'mahasiswa.id_mhs', '=', 'krs.id_mhs')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'krs.id_jadwal')
            ->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')
            ->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')
            ->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')
            ->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')
            ->join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
            ->join('skala_nilai', 'skala_nilai.id_snilai', '=', 'krs.id_snilai')
            ->where('krs.id_mhs', $id)
            ->get();
        return view("admin/mahasiswa/d_akademi/Transkrip", compact("st_mhs", "krs"));
    }
    public function showhstudi($id)
    {
        //
        $shs_mhs = Mahasiswa::join('jurusan', 'jurusan.id_programstudi', '=', 'mahasiswa.id_programstudi')
            ->findorfail($id);
        $krs = Krs::join('mahasiswa', 'mahasiswa.id_mhs', '=', 'krs.id_mhs')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'krs.id_jadwal')
            ->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')
            ->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')
            ->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')
            ->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')
            ->join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
            ->leftjoin('skala_nilai', 'skala_nilai.id_snilai', '=', 'krs.id_snilai')
            ->where('krs.id_mhs', $id)
            ->get();
        return view("admin/mahasiswa/d_akademi/HasilStudi", compact("shs_mhs", "krs"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }
	
	public function editstatuskrsy($id)
    {
        //
		$idmhs=Krs::where('id_krs',$id)->first();
		Krs::where('id_krs',$id)->update(['status_krs' => "acc"]);
		$mhs=$idmhs->id_mhs;
		
		return redirect('valkrs/'.$mhs.'/1');
    }
	
	public function editstatuskrsx($id)
    {
        //
		$idmhs=Krs::where('id_krs',$id)->first();
		Krs::where('id_krs',$id)->update(['status_krs' => ""]);
		$mhs=$idmhs->id_mhs;
		
		return redirect('valkrs/'.$mhs.'/1');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
