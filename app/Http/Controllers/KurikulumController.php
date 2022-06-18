<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurikulum;
use App\Models\jurusan;
use App\Models\Kmatkul;
use App\Models\Matkul;
use App\Models\Periode;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d_kurikulum = Kurikulum::join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
            ->select('kurikulum.*', 'jurusan.*', 'periode.*')
            ->paginate(10);
        $prodi = jurusan::all();
        $periode = Periode::all();
        return view("/admin/daftar_data/kurikulum/kurikulum", compact("d_kurikulum", "prodi", "periode"));
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
		$rules = [
        'nama_kurikulum' => 'required',
		'id_programstudi' => 'required',
		'id_periode' => 'required',
         
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'id_programstudi.required' => 'Program Studi wajib diisi.',
		'id_periode.required' => 'Periode wajib diisi.',
		'nama_kurikulum.required' => 'Nama Kurikulum wajib diisi.',
		];

		$this->validate($request, $rules, $customMessages);
		
        Kurikulum::create([
            'nama_kurikulum' => $request->nama_kurikulum,
            'id_programstudi' => $request->id_programstudi,
            'id_periode' => $request->id_periode,
        ]);
        return redirect('kurikulum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id2)
    {
        //
        $s_kmatkul = Kurikulum::join('jurusan', 'jurusan.id_programstudi', '=', 'kurikulum.id_programstudi')
            ->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')
            ->findorfail($id);
  
        $s_matkul = Matkul::where('id_programstudi', $id2)->get();

		$idkur=$id;
        return view("admin/daftar_data/kurikulum/Ikurikulum_matkul", compact("s_kmatkul", "s_matkul",'idkur'));
    }
    public function inputmatkul(Request $request)
    {
        //
        // dd($request->all());
        Kmatkul::create([
            'id_kurikulum' => $request->id_kurikulum,
            'semester' => $request->semester,
            'id_matkul' => $request->id_matkul,
        ]);
        return back();
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
        $e_kurikulum = Kurikulum::findorfail($id);
        $prodi = jurusan::all();
        $periode = Periode::all();
        return view("/admin/daftar_data/kurikulum/ekurikulum", compact("e_kurikulum", "prodi", "periode"));
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
        $e_kurikulum = Kurikulum::findorfail($id);
        $e_kurikulum->update($request->all());
        return redirect('kurikulum');
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
        $e_kurikulum = Kurikulum::findorfail($id);
        $e_kurikulum->delete();
        return back();
    }
    public function des_kmatkul($id)
    {
        //
        $e_kurikulum = Kmatkul::findorfail($id);
        $e_kurikulum->delete();
        return back();
    }
}
