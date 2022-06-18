<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d_berita = Berita::paginate(10);
        return view("/admin/daftar_data/berita/berita", compact("d_berita"));
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
        'judul' => 'required',
		'isi' => 'required',
		'author' => 'required',
		'keterangan_brt' => 'required',
		'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		
		'gambar.required' => 'Foto Berita wajib diisi.',
		];
		
		

		$this->validate($request, $rules, $customMessages);
		
		$file = $request->file('gambar');
        $name = time(). '.' . $file->extension();
        $request->gambar->move(public_path('foto_berita'), $name);
		 
        Berita::create([
            'judul'=> $request->judul,
            'isi'=> $request->isi,
            'author'=> $request->author,
            'keterangan_brt'=> $request->keterangan_brt,
            'gambar' => $name,
        ]);
        return redirect('berita');
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
        $e_berita = Berita::findorfail($id);
		
        return view("/admin/daftar_data/berita/eberita",compact("e_berita"));
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
        $e_berita = Berita::findorfail($id);
        $file = $request->file('gambar');
        $name = time(). '.' . $file->extension();
        $request->gambar->move(public_path('foto_berita'), $name);
		
		$e_berita->update($request->all());
		$e_berita->update([
		'gambar' => $name,
		]);
		
        return redirect('berita');
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
        $e_berita = Berita::findorfail($id);
        $e_berita->delete();
        return back();
    }
}
