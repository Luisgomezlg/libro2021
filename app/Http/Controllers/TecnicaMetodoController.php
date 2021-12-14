<?php

namespace App\Http\Controllers;

use App\Models\TecnicaMetodo;
use Illuminate\Http\Request;

class TecnicaMetodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tecnica_metodo = \DB::table('metodo_tecnica')
        ->select(
            'metodo_tecnica.id AS id_ins_tec',
            'tecnicas.title_tec',
            'metodos.first_cod',
            'metodos.ind_cod',
            'metodos.title'
        )
        ->leftjoin('tecnicas', 'tecnicas.id', '=', 'metodo_tecnica.tecnica_id')
        ->leftjoin('metodos', 'metodos.id', '=', 'metodo_tecnica.metodo_id')
        ->get();
        $li = \DB::table('metodos')
        ->select("metodos.first_cod AS ins", "metodos.ind_cod", "metodos.title")
        ->whereNull('metodos.ind_cod')
        ->get();
        
    return view('tecnicas_metodos.index', compact('tecnica_metodo', 'li'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TecnicaMetodo  $tecnicaMetodo
     * @return \Illuminate\Http\Response
     */
    public function show(TecnicaMetodo $tecnicaMetodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TecnicaMetodo  $tecnicaMetodo
     * @return \Illuminate\Http\Response
     */
    public function edit(TecnicaMetodo $tecnicaMetodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TecnicaMetodo  $tecnicaMetodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TecnicaMetodo $tecnicaMetodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TecnicaMetodo  $tecnicaMetodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TecnicaMetodo $tecnicaMetodo)
    {
        //
    }
}
