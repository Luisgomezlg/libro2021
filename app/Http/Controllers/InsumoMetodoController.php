<?php

namespace App\Http\Controllers;

use App\Models\insumo_metodo;
use Illuminate\Http\Request;

class InsumoMetodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $insumo_metodo = \DB::table('insumo_metodo')
            ->select(
                'insumo_metodo.id AS id_ins_met',
                'insumos.title_ins',
                'metodos.first_cod',
                'metodos.ind_cod',
                'metodos.title'
            )
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->leftjoin('metodos', 'metodos.id', '=', 'insumo_metodo.metodo_id')
            ->get();
        $li = \DB::table('metodos')
        ->select("metodos.first_cod AS ins", "metodos.ind_cod", "metodos.title")
        ->whereNull('metodos.ind_cod')
        ->get();
            
        return view('insumos_metodos.index', compact('insumo_metodo', 'li'));
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
     * @param  \App\Models\insumo_metodo  $insumo_metodo
     * @return \Illuminate\Http\Response
     */
    public function show(insumo_metodo $insumo_metodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\insumo_metodo  $insumo_metodo
     * @return \Illuminate\Http\Response
     */
    public function edit(insumo_metodo $insumo_metodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\insumo_metodo  $insumo_metodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, insumo_metodo $insumo_metodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\insumo_metodo  $insumo_metodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $insumo_metodo = \DB::table("insumo_metodo")->where('id', $id)->delete();
        return back();
    }
}
