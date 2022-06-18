<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\Matkul;
use App\Models\Skala_nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("/admin/Inilai");
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
        $shownilai = Jadwal::join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')
            ->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')
            ->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')
            ->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')
            ->join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
            ->findorfail($id);

        $s_krs = Krs::join('mahasiswa', 'mahasiswa.id_mhs', '=', 'krs.id_mhs')
            ->join('jadwal', 'jadwal.id_jadwal', '=', 'krs.id_jadwal')
            ->leftjoin('skala_nilai', 'skala_nilai.id_snilai', '=', 'krs.id_snilai')
            ->where('krs.id_jadwal', $id)
            ->get();
        
            $skala = Skala_nilai::all();
			
		$id_jadwal=$id;	
        return view("admin/nilai", compact("shownilai", "s_krs", "skala","id_jadwal"));
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
        $e_nilai = Krs::findorfail($id);
        $snilai = Skala_nilai::all();
        return view("/admin/enilai",compact("e_nilai","snilai"));
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
		
        $e_dosen = Krs::findorfail($id);
        $e_dosen->update($request->all());
        //return redirect('nilai');\
		$newid=$e_dosen->id_jadwal;
		return redirect("s_nilai/$newid");
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
