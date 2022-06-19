<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Http\Resources\PembayaranResource;

class PembayaranController extends Controller
{
      // 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembayaran::latest()->get();
        return response()->json([PembayaranResource::collection($data), 'Pembayaran fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
         //   'id_pembayaranpmb' => 'required',
            'no_registrasi' => 'required|string|max:255',
            'no_tagihan' => 'required',
            'tanggal_setor' => 'required|string|max:255',
            'bukti_transfer' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $pembayaran = Pembayaran::create([
            //'id_pembayaranpmb' => $request->id_pembayaranpmb,
            'no_registrasi' => $request->no_registrasi,
            'no_tagihan' => $request->no_tagihan,
            'tanggal_setor' => $request->tanggal_setor,
            'bukti_transfer' => $request->bukti_transfer  ]);
        
        return response()->json(['Pembayaran created successfully.', new PembayaranResource($pembayaran)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::find($id);
        if (is_null($pembayaran)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new PembayaranResource($pembayaran)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validator = Validator::make($request->all(),[
            //'id_pembayaranpmb' => 'required|string|max:255',
            'no_registrasi' => 'required',
            'no_tagihan' => 'required|string|max:255',
            'tanggal_setor' => 'required',
            'bukti_transfer' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

      //  $pembayaran->id_pembayaranpmb = $request->id_pembayaranpmb;
        $pembayaran->no_registrasi = $request->no_registrasi;
        $pembayaran->no_tagihan = $request->no_tagihan;
        $pembayaran->tanggal_setor = $request->tanggal_setor;
        $pembayaran->bukti_transfer = $request->bukti_transfer;
        $pembayaran->save();
        
        return response()->json(['Pembayaran updated successfully.', new PembayaranResource($pembayaran)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return response()->json('Pembayaran deleted successfully');
    }
} 
