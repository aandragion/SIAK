<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode_pendaftaran;
use App\Http\Resources\Periode_pendaftaranResource;

class Periode_pendaftaranController extends Controller
{
    //  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Periode_pendaftaran::latest()->get();
        return response()->json([Periode_pendaftaranResource::collection($data), 'Jurusan fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'id_periodependaftaran' => 'required',
            'nama_periode' => 'required|string|max:255',
            'awal_periode' => 'required',
            'selesai_periode' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $periode_daftar = Periode_pendaftaran::create([
            //'id_periodependaftaran' => $request->kode_jurusan,
            'nama_periode' => $request->nama_jurusan,
            'awal_periode' => $request->id_fakultas,
            'selesai_periode' => $request->jenjang

        ]);

        return response()->json(['Periode Pendaftaran created successfully.', new Periode_pendaftaranResource($periode_daftar)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periode_daftar = Periode_pendaftaran::find($id);
        if (is_null($periode_daftar)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new Periode_pendaftaranResource($periode_daftar)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode_pendaftaran $periode_daftar)
    {
        $validator = Validator::make($request->all(), [
            //'id_periodependaftaran' => 'required|string|max:255',
            'nama_periode' => 'required',
            'awal_periode' => 'required|string|max:255',
            'selesai_periode' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

     //   $periode_daftar->id_periodependaftaran = $request->kode_jurusan;
        $periode_daftar->nama_periode = $request->nama_jurusan;
        $periode_daftar->awal_periode = $request->id_fakultas;
        $periode_daftar->selesai_periode = $request->jenjang;
        $periode_daftar->save();

        return response()->json(['Periode Pendaftaran updated successfully.', new Periode_pendaftaranResource($periode_daftar)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode_pendaftaran $periode_daftar)
    {
        $periode_daftar->delete();

        return response()->json('Periode Pendaftaran deleted successfully');
    }
}
