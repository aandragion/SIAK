<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jalur_masuk;
use App\Http\Resources\JmasukResource;
 
class JmasukController extends Controller
{
    // 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jalur_masuk::latest()->get();
        return response()->json(JmasukResource::collection($data));
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
          //  'id_jalurmasuk' => 'required',
            'jalur_masuk' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $jmasuk = Jalur_masuk::create([
          //  'id_jalurmasuk' => $request->id_jalurmasuk,
            'jalur_masuk' => $request->jalur_masuk
         ]);
        
        return response()->json(['Jurusan created successfully.', new JmasukResource($jmasuk)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jmasuk = Jalur_masuk::find($id);
        if (is_null($jmasuk)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new JmasukResource($jmasuk)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jalur_masuk $jmasuk)
    {
        $validator = Validator::make($request->all(),[
           // 'id_jalurmasuk' => 'required|string|max:255',
            'jalur_masuk' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $jmasuk->jalur_masuk = $request->jalur_masuk;
        $jmasuk->save();
        
        return response()->json(['Jalur Masuk updated successfully.', new JmasukResource($jmasuk)]);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jalur_masuk $jmasuk)
    {
        $jmasuk->delete();

        return response()->json('Jalur Masuk deleted successfully');
    }
}
