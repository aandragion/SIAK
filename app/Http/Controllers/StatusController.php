<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\Pembayaran;
use App\Models\AturPembayaran;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		date_default_timezone_set('Asia/Jakarta');
        $tahunskr = date('Y');		
        $d_pmb = Pembayaran::join('tb_aturpembayaranspp','tb_pembayaranspp.id_spp','=','tb_aturpembayaranspp.id_spp')
		->join('mahasiswa','mahasiswa.id_mhs','=','tb_pembayaranspp.id_mhs')->orderBy('tanggal_setor','DESC')->paginate(10);
		$mahasiswa = Mahasiswa::all();
		$spp=AturPembayaran::all();
        return view("/admin/statustrx",compact("d_pmb",'mahasiswa','spp'));
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
    public function storetrx(Request $request)
    {
         //dd($request->all());
		$rules = [
			'id_mhs' => 'required',				
			'id_spp' => 'required',
			'bulan' => 'required',
			'bayar' => 'required',
			'tanggal_setor' => 'required',
			'statusspp' => 'required',
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'id_mhs.required' => 'Nama Mahasiswa wajib diisi.',
		'id_spp.required' => 'SPP wajib diisi.',
		'statusspp.required' => 'Status SPP wajib diisi.',
		'bayar.required' => 'Biaya yang dibayar wajib diisi.',
		'bulan.required' => 'Bulan wajib diisi.',
		
		];
		
		$this->validate($request, $rules, $customMessages);
		 
		$idus=Mahasiswa::where('id_mhs',$request->id_mhs)->first(); 
		 
         Pembayaran::create([
            'id_mhs'=> $request->id_mhs,
            'id_spp'=> $request->id_spp,
            'bulan'=> $request->bulan,
            'bayar'=> $request->bayar,
            'tanggal_setor'=> $request->tanggal_setor,
			'statusspp'=>$request->statusspp,
			
        ]);
		
        return redirect('statustrx');  
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
        $updatetrx = Pembayaran::findorfail($id);
        $updatetrx->update($request->all());
        return redirect('statustrx');
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
        $deletetrx = Pembayaran::findorfail($id);
        $deletetrx->delete();
        return back();
    }
}
