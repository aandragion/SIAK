<?php

namespace App\Http\Controllers;
use App\Models\jurusan;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d_prodi = jurusan::paginate(10);
        return view("/admin/daftar_data/prodi/prodi", compact("d_prodi"));
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
        //dd($request->all());
		$rules = [
			'kode_jurusan' => 'required',				
			'nama_jurusan' => 'required',
			'jenjang' => 'required',
			'jumlah_semester' => 'required',
			'angkatan_prodi' => 'required',
			
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'kode_jurusan.required' => 'Kode jurusan wajib diisi.',
		'nama_jurusan.required' => 'Nama jurusan perkuliahan wajib diisi.',
		'jenjang.required' => 'Jenjang wajib diisi.',
		'jumlah_semester.required' => 'Jumlah semester wajib diisi.',
		'angkatan_prodi.required' => 'Angkatan Prodi wajib diisi',
		
		];
		
		$idlast=Jurusan::orderBy('id_programstudi','DESC')->limit(1)->first();
		$idlast1=$idlast->id_fakultas+1;
		
		$this->validate($request, $rules, $customMessages);
		
        jurusan::create([
            'kode_jurusan'=> $request->kode_jurusan,
            'nama_jurusan'=> $request->nama_jurusan,
            'jenjang'=> $request->jenjang,
            'jumlah_semester'=> $request->jumlah_semester,
			'id_fakultas' => $idlast1,
			'angkatan_prodi' => $request->angkatan_prodi,
        ]);
        return redirect('dprodi');
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
        $e_prodi = jurusan::findorfail($id);
        return view("/admin/daftar_data/prodi/eprodi",compact("e_prodi"));
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
        $e_prodi = jurusan::findorfail($id);
        $e_prodi->update($request->all());
        return redirect('dprodi');
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
        $e_prodi = jurusan::findorfail($id);
        $e_prodi->delete();
        return back();
    }
}
