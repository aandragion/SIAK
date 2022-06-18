<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
        $d_periode = Periode::paginate(10);
        return view("/admin/daftar_data/periode/periode",compact("d_periode"));
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
        'nama_periode' => 'required',
		'smt_periode' => 'required',
		'tgl_awal' => 'required',
		'tgl_akhir' => 'required',
         
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'smt_periode.required' => 'Semester wajib diisi.',
		'tgl_awal.required' => 'Periode awal wajib diisi.',
		'tgl_akhir.required' => 'Periode akhir wajib diisi.',
		'nama_periode.required' => 'Nama periode wajib diisi.',
		];

		$this->validate($request, $rules, $customMessages);
		 
         Periode::create([
            'nama_periode'=> $request->nama_periode,
            'smt_periode'=> $request->smt_periode,
            'tgl_awal'=> $request->tgl_awal,
            'tgl_akhir'=> $request->tgl_akhir,
        ]);
        return redirect('periode');  
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
        $e_periode = Periode::findorfail($id);
        return view("/admin/daftar_data/periode/eperiode",compact("e_periode"));
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
        $e_periode = Periode::findorfail($id);
        $e_periode->update($request->all());
        return redirect('periode');
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
        $e_periode = Periode::findorfail($id);
        $e_periode->delete();
        return back();
    }
}
