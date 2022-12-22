<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Collection::all();
        return response()->json([
            $collection
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

        
        $user = $user->first();
        $request->validate([
            'col_titl' => 'required|string',
            // 'col_bann' => 'string',
            'col_desc' => 'required|string',
            'col_cate' => 'required|string',
            // 'col_fron_img' => 'string',
            // 'user_id' => 'required|integer'
        ]);

        Collection::create([
            'col_titl' => $request->col_titl,
            // 'col_bann' => 'string',  
            'col_desc' => $request->col_desc,
            'col_cate' => $request->col_cate,
            // 'col_fron_img' => 'string',
            'user_id' => $user->id
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
