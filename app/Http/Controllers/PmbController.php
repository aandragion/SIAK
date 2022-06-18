<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PmbController extends Controller
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
        $d_pmb = User::join('jurusan','jurusan.id_programstudi','=','users.id_programstudi')->orderBy('users.created_at','DESC')->where('users.created_at','like','%'.$tahunskr.'%')->paginate(10);
        return view("/admin/pmban",compact("d_pmb"));
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
    public function storepmb(Request $request,$id)
    {
         //dd($request->all());
		 $userg = User::join('jurusan','jurusan.id_programstudi','=','users.id_programstudi')->select('jurusan.*','users.*')->where('users.id',$id)->first();
		 if($userg->id_programstudi == '31'){
			$mhsnew=Mahasiswa::where('id_programstudi','31')->where('id_mhs','>','85')->orderBy('id_mhs','DESC')->limit(1)->first();
			$findmhs=Mahasiswa::where('id_mhs','>','85')->where('id_programstudi','31')->count();
		 }else if($userg->id_programstudi == '32'){
			$mhsnew=Mahasiswa::where('id_programstudi','32')->where('id_mhs','>','85')->orderBy('id_mhs','DESC')->limit(1)->first();
			$findmhs=Mahasiswa::where('id_mhs','>','85')->where('id_programstudi','32')->count();	
		 }else{
			$mhsnew=Mahasiswa::where('id_programstudi','33')->where('id_mhs','>','85')->orderBy('id_mhs','DESC')->limit(1)->first();
			$findmhs=Mahasiswa::where('id_mhs','>','85')->where('id_programstudi','33')->count();	
		 }
		 
		 if($mhsnew){
		 $nimterakhir=$mhsnew->nim;
		 $nimpotong=(int)substr($nimterakhir,6,2);
		 $nimpotong9=(int)substr($nimterakhir,6,3);
		 $nimpotong99=(int)substr($nimterakhir,7,2);
		 }
		 date_default_timezone_set('Asia/Jakarta');
		 $tahunskr = date('Y');
		 
		 if($findmhs < 1){
			
			$nimsekarang='001';
		 }
		 else if($nimpotong9 == '009'){
			$nimhasil=(int)substr($nimterakhir,8,1);
			$nimsekarang='0'.$nimhasil+1;
		 }
		 else if($nimpotong99 == '099'){
			$nimhasil=(int)substr($nimterakhir,7,2);
			$nimsekarang=$nimhasil+1;
		 }
		 else if($nimpotong == '00'){
			$nimhasil=(int)substr($nimterakhir,8,1);
			$nimsekarang='00'.$nimhasil+1; 
		 }else if($nimpotong == '01' || $nimpotong == '02' || $nimpotong == '03' || $nimpotong == '04' || $nimpotong == '05' || $nimpotong == '06' || 
			$nimpotong == '07' || $nimpotong == '08' || $nimpotong == '09'){
			$nimhasil=(int)substr($nimterakhir,7,2);
			$nimsekarang='0'.$nimhasil+1;
		 }else {
			$nimhasil=(int)substr($nimterakhir,6,3);
			$nimsekarang=$nimhasil+1; 
		 }
		 $thnmasuk = substr($userg->created_at,2,2);
		 //$urutan = (int) substr(3, 3);
		 //$urutan++;
		 $kodeprodi = $userg->kode_jurusan;
		 
		 
		 //$nim = $thnmasuk.$kodeprodi.$nimsekarang;
		 $angkatanprd='0'.$userg->angkatan_prodi;
		 $prodiangka=substr($userg->id_programstudi,1,1);
		 $kodeprodi = $userg->kode_jurusan;
		 $jalurpendaftar = $userg->id_jalurpendaftaran;
		 
		 $nim = $thnmasuk.$angkatanprd.$prodiangka.$jalurpendaftar.$nimsekarang;
		 $cekmhs = Mahasiswa::where('id',$id)->count();
		 $idbaru=$id;
		 
		 User::where('id',$id)->update(['usertype' => $request->status]);
		
		$bln = date('m');
		if($bln == 10){
		if($request->status == 'mhs' && $cekmhs < 1){
         Mahasiswa::create([
            'nama_mhs'=> $userg->nama_calon_mahasiswa,
            'email'=> $userg->email,
            'no_tlp'=> $userg->no_hp,
            'id'=> $idbaru,
			'id_programstudi'=> $userg->id_programstudi,
			'angkatan' => $tahunskr,
			'status' => 'Aktif',
            'nim'=> $nim,
			'smt_mahasiswa' => 1,
        ]);
		}else if($request->status == 'user' && $cekmhs > 0){
			Mahasiswa::where('id',$idbaru)->delete();
		}else{
			
		}	
		
		}else{		
		if($request->status == 'mhs' && $cekmhs < 1){
         Mahasiswa::create([
            'nama_mhs'=> $userg->nama_calon_mahasiswa,
            'email'=> $userg->email,
            'no_tlp'=> $userg->no_hp,
            'id'=> $idbaru,
			'id_programstudi'=> $userg->id_programstudi,
			'angkatan' => $tahunskr,
			'status' => 'Aktif',
            'nim'=> "         ",
			'smt_mahasiswa' => 1,
        ]);
		}else if($request->status == 'user' && $cekmhs > 0){
			Mahasiswa::where('id',$idbaru)->delete();
		}else{
			
		}
		}
        return redirect('pmban');  
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
