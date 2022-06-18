<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d_ruangan = Ruangan::paginate(10);
        return view("/admin/druang",compact("d_ruangan"));
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
     *@return \App\Models\ruangan
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
		$rules = [
			'nama_ruang' => 'required',				
			'lokasi' => 'required',
			
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'nama_ruang.required' => 'Nama ruangan wajib diisi.',
		'lokasi.required' => 'Lokasi wajib diisi.',
		];                                                                                                         
		
		$this->validate($request, $rules, $customMessages);
		
        Ruangan::create([
            'nama_ruangan'=> $request->nama_ruang,
            'lokasi'=> $request->lokasi,
        ]);
        return redirect('druang');  
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
        $e_ruang = Ruangan::findorfail($id);
        return view("/admin/daftar_data/ruangan/eruang",compact("e_ruang"));
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
        $e_ruang = Ruangan::findorfail($id);
        $e_ruang->update($request->all());
        return redirect('druang');
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
        $e_ruang = Ruangan::findorfail($id);
        $e_ruang->delete();
        return back();
    }
    
}
