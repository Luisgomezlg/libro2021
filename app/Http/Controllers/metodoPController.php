<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class metodoPcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metodosP.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fecha = Carbon::now();
        //$user = Auth::user()->id;

        $request->validate([
            'title' => 'required',

        ]);
        //dd($metodo);
        $metodo = Metodo::create([
            'title' => $request->title,
            'description' => $request->description,
            'creation_date' => $fecha

        ]);
        $met = Metodo::latest('id')->first();
        if ($metodo !== null) {
            $metodo->update(['first_cod' => $met->id]);
        } 

        return redirect(route('metodos.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metodo $metodo)
    {
        //
        $request->validate([
            'first_cod' => 'required',

        ]);
        $metodo = Metodo::latest('id')->first();
        $met = $request->all();

        $metodo->update($met);
        return redirect()->route('metodos.index');
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
