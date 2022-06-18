<?php

namespace App\Http\Controllers;

use App\Models\Skala_nilai;
use Illuminate\Http\Request;

class SkalanilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $d_skalan = Skala_nilai::all();
        return view("/admin/perkuliahan/skalan",compact("d_skalan"));
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
        'grade' => 'required',
		'mutu' => 'required',
		'n_atas' => 'required',
		'n_bawah' => 'required',
		'keterangan' => 'required',
         
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'n_atas.required' => 'Nilai atas wajib diisi.',
		'n_bawah.required' => 'Nilai bawah wajib diisi.',
		'grade.required' => 'Grade wajib diisi.',
		'mutu.required' => 'Mutu wajib diisi.',
		'keterangan.required' => 'Keterangan wajib diisi.',
		
		];

		$this->validate($request, $rules, $customMessages);
		 
         Skala_nilai::create([
            'grade'=> $request->grade,
            'mutu'=> $request->mutu,
            'n_atas'=> $request->n_atas,
            'n_bawah'=> $request->n_bawah,
            'keterangan'=> $request->keterangan,
        ]);
        return redirect('skalan');  
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
        $e_skalan = Skala_nilai::findorfail($id);
        return view("/admin/perkuliahan/eskalan",compact("e_skalan"));
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
        $e_skalan = Skala_nilai::findorfail($id);
        $e_skalan->update($request->all());
        return redirect('skalan');
        // dd($request->all());
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
        $e_skalan = Skala_nilai::findorfail($id);
        $e_skalan->delete();
        return back();
    }
}
