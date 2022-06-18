<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\jurusan;
use App\Models\kurikulum;
use Illuminate\Http\DB;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $d_matkul = Matkul::join('jurusan', 'jurusan.id_programstudi', '=', 'matkul.id_programstudi')
        ->select('matkul.*','jurusan.*')
        ->paginate(10);
        $d_prodi = jurusan::all();
       
        
        return view("/admin/daftar_data/matkul/matkul", compact("d_matkul","d_prodi"));
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
			'kode_matkul' => 'required',				
			'nama_matkul' => 'required',
			'sks' => 'required',
			'id_programstudi' => 'required',
			
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'id_programstudi.required' => 'Program Studi wajib diisi.',
		'kode_matkul.required' => 'Kode Mata Kuliah wajib diisi.',
		'nama_matkul.required' => 'Nama Mata Kuliah wajib diisi.',
		'sks.required' => 'SKS wajib diisi.',
		
		];
		
		$this->validate($request, $rules, $customMessages);
		
        Matkul::create([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'id_programstudi' => $request->id_programstudi,
        ]);
        return redirect('dmatkul');
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
        $e_matkul = Matkul::findorfail($id);
        $d_prodi = jurusan::all();
        return view("/admin/daftar_data/matkul/ematkul",compact("e_matkul","d_prodi"));
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
        $e_matkul = Matkul::findorfail($id);
        $e_matkul->update($request->all());
        return redirect('dmatkul');
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
        $e_matkul = Matkul::findorfail($id);
        $e_matkul->delete();
        return back();
    }
}
