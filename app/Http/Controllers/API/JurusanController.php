<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Http\Resources\JurusanResource;

class JurusanController extends Controller
{
    // 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jurusan::latest()->get();
        return response()->json(JurusanResource::collection($data));
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
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required|string|max:255',
            'id_fakultas' => 'required',
            'jenjang' => 'required|string|max:255',
            'jumlah_semester' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $jurusan = Jurusan::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
            'id_fakultas' => $request->id_fakultas,
            'jenjang' => $request->jenjang,
            'jumlah_semester' => $request->jumlah_semester
            
         ]);
        
        return response()->json(['Jurusan created successfully.', new JurusanResource($jurusan)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = Jurusan::find($id);
        if (is_null($jurusan)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new JurusanResource($jurusan)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validator = Validator::make($request->all(),[
            'kode_jurusan' => 'required|string|max:255',
            'nama_jurusan' => 'required',
            'id_fakultas' => 'required|string|max:255',
            'jenjang' => 'required',
            'jumlah_semester' => 'required|string|max:255'
          
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->id_fakultas = $request->id_fakultas;
        $jurusan->jenjang = $request->jenjang;
        $jurusan->jumlah_semester = $request->jumlah_semester;
        $jurusan->save();
        
        return response()->json(['Jurusan updated successfully.', new JurusanResource($jurusan)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return response()->json('Jurusan deleted successfully');
    }
}
