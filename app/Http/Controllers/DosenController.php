<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d_dosen = Dosen::where('id_dosen','!=','100')->paginate(10);
        return view("/admin/daftar_data/dosen/dosen", compact("d_dosen"));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //dd($request->all());
		$rules = [
        'nik' => 'required',
		'nidn' => 'required',
		'nama_dosen' => 'required',
		'jabatan' => 'required',
		'jns_kelamin_dsn' => 'required',
		'tempat_lahir_dsn' => 'required',
		'tgl_lahir_dsn' => 'required',
		'alamat_dsn' => 'required',
		'tlp_dsn' => 'required',
		'pendidikan' => 'required',
        'photo_dsn' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'jns_kelamin_dsn.required' => 'Jenis kelamin Dosen wajib diisi.',
		'tempat_lahir_dsn.required' => 'Tempat lahir Dosen wajib diisi.',
		'tgl_lahir_dsn.required' => 'Tanggal lahir Dosen wajib diisi.',
		'alamat_dsn.required' => 'Alamat Dosen wajib diisi.',
		'tlp_dsn.required' => 'Telepon Dosen wajib diisi.',
		'nik.required' => 'NIK wajib diisi.',
		'nidn.required' => 'NIDN wajib diisi.',
		'nama_dosen.required' => 'Nama Dosen wajib diisi.',
		'jabatan.required' => 'Jabatan wajib diisi.',
		'pendidikan.required' => 'Pendidikan wajib diisi.',
		'photo_dsn.required' => 'Foto Dosen wajib diisi.',
		];
		
		

		$this->validate($request, $rules, $customMessages);
		
		$file = $request->file('photo_dsn');
        $name = time(). '.' . $file->extension();
        $request->photo_dsn->move(public_path('foto_dosen'), $name);
		 
         Dosen::create([
            'nik'=> $request->nik,
            'nidn'=> $request->nidn,
            'nama_dosen'=> $request->nama_dosen,
            'jabatan'=> $request->jabatan,
            'jns_kelamin_dsn'=> $request->jns_kelamin_dsn,
            'tempat_lahir_dsn'=> $request->tempat_lahir_dsn,
            'tgl_lahir_dsn'=> $request->tgl_lahir_dsn,
            'alamat_dsn'=> $request->alamat_dsn,
            'tlp_dsn'=> $request->tlp_dsn,
            'pendidikan'=> $request->pendidikan,
			'photo_dsn' => $name,
        ]);
        return redirect('dosen');
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
        $e_dosen = Dosen::findorfail($id);
		
        return view("/admin/daftar_data/dosen/edosen",compact("e_dosen"));
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
        $e_dosen = Dosen::findorfail($id);
        $file = $request->file('photo_dsn');
        $name = time(). '.' . $file->extension();
        $request->photo_dsn->move(public_path('foto_dosen'), $name);
		
		$e_dosen->update($request->all());
		$e_dosen->update([
		'photo_dsn' => $name,
		]);
		
        return redirect('dosen');
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
        $e_dosen = Dosen::findorfail($id);
        $e_dosen->delete();
        return back();
    }
}
