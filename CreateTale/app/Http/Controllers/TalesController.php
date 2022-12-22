<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Tale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tales = Tale::all();
        return response()->json([
            $tales
        ], 200);        
    }
    public function borrar()
    {
        return response()->json([
            "hola  todod mundo"
        ], 200);        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $headerBearer = $request->header('Authorization');
        if($headerBearer)
        {
            $header = explode(' ', $headerBearer);
            $header = $header[1];
        }
        if(!isset($header)){
            return response()->json([
                "message" => "Insertar token Bearer"
            ], 200);    
        }
        // Check token in database
        $user = DB::table('User')
            ->where('token', '=', $header)
            ->get();
        if($user->isEmpty()){
            return response()->json([
                "message" => "No se ha encontrado el token en la base de datos"
            ], 200);
        }        
        if($user->isEmpty()){
            return response()->json([
                "message" => "No se ha encontrado el token en la base de datos"
            ], 200);
        }        
        $user = $user->first();
        $collections = Collection::where('user_id', $user->id)->where('id',$request->col_id)->get();
        if($collections->isEmpty()){
            return response()->json([
                "message" => "No se ha encontrado ninguna colección"
            ], 200);
        }
        $request->validate([
            'tal_titl' => 'required|string',
            'tal_desc' => 'required|string',
            // 'tal_fron_img' => 'required|string',
            'tal_cont' => 'required|string',
            'col_id' => 'required|integer',
        ]);
        Tale::create([
            'tal_titl' => $request->tal_titl,
            'tal_desc' => $request->tal_desc,
            'tal_cont' => $request->tal_cont,
            // 'col_fron_img' => 'string',
            'col_id' => $request->col_id
        ]);

        return response()->json([
            'message' => 'Creado correctamente'
        ], 200);        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
