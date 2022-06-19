<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Jalur_pendaftaran;
use App\Http\Resources\JpendaftaranResource;

class jpendaftaranController extends Controller
{
    // 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jalur_pendaftaran::latest()->get();
        return response()->json(JpendaftaranResource::collection($data));
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
         //   'id_jalurpendaftaran' => 'required',
            'jalur_pendaftaran' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $jdaftar = Jalur_pendaftaran::create([
          //  'id_jalurpendaftaran' => $request->id_jalurpendaftaran,
            'jalur_pendaftaran' => $request->jalur_pendaftaran
         ]);
        
        return response()->json(['jalur masuk created successfully.', new JpendaftaranResource($jdaftar)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jdaftar = Jalur_pendaftaran::find($id);
        if (is_null($jdaftar)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new JpendaftaranResource($jdaftar)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jalur_pendaftaran $jdaftar)
    {
        $validator = Validator::make($request->all(),[
            //'id_jalurpendaftaran' => 'required|string|max:255',
            'jalur_pendaftaran' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

       // $jdaftar->id_jalurpendaftaran = $request->id_jalurpendaftaran;
        $jdaftar->jalur_pendaftaran = $request->jalur_pendaftaran;
        $jdaftar->save();
        
        return response()->json(['Jalur Pendaftaran updated successfully.', new JpendaftaranResource($jdaftar)]);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jalur_pendaftaran $jdaftar)
    {
        $jdaftar->delete();

        return response()->json('Jalur Pendaftaran deleted successfully');
    }
}
