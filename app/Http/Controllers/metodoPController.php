<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class metodoPcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MOSTRAR LISTADO EN LAS TABLAS - VISTA ADMIN
        $metodosP = \DB::table('metodos')
        ->whereNull('metodos.ind_cod')
        ->orderBy('metodos.id')
        ->get();
        return view('metodosP.index', compact('metodosP'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //RETORNAR A ARCHIVO DE CREACIÓN
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
        //METODO CARBÓN TRAE LA HORA ACTUAL
        $fecha = Carbon::now();
        $user = Auth::user()->id;

        $request->validate([
            'title' => 'required',
        ]);
        $ind_cod = NULL;
        //METODO PARA INSERTAR
        try {
            if ($imageName = $request->file('image_met')) {
                $imageName = time().'.'.$request->image_met->extension();
            
                $request->image_met->move(public_path('image'),$imageName);
    
                $metodo = Metodo::create([
                    'ind_cod' => $ind_cod,
                    'title' => $request->title,
                    'image_met' => $imageName,
                    'description' => $request->description,
                    'creation_date' => $fecha,
                    'id_user' => $user
        
                ]);
                $met = Metodo::latest('id')->first();
                if ($metodo !== null) {
                    $metodo->update(['first_cod' => $met->id]);
                } 
                //dd($tecnica);
            }else{
                $metodo = Metodo::create([
                    'ind_cod' => $ind_cod,
                    'title' => $request->title,
                    'description' => $request->description,
                    'creation_date' => $fecha,
                    'id_user' => $user
        
                ]);
                $met = Metodo::latest('id')->first();
                if ($metodo !== null) {
                    $metodo->update(['first_cod' => $met->id]);
                } 
            }
            return redirect()->back()
            ->with('success', '¡Registro creado!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
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
    public function edit(Metodo $metodoP)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        return view("metodosP.edit", compact('metodoP'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metodo $metodoP)
    {
        //METODO PARA ACTUALIZAR
        $fecha = Carbon::now();
        $user = Auth::user()->id;
        try {
            if ($imageName = $request->file('image_met')) {
                $imageName = time().'.'.$request->image_met->extension();
            
                $request->image_met->move(public_path('image'),$imageName);
    
                $metodoP->update([
                    'title' => $request->title,
                    'image_met' => $imageName,
                    'description' => $request->description,
                    'creation_date' => $fecha,
                    'id_user' => $user
        
                ]);
                //dd($tecnica);
            }else{
                $metodoP->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'creation_date' => $fecha,
                    'id_user' => $user
        
                ]);
            }
            return redirect(route('metodosP.index'))->with('success', '¡Registro actualizado!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
    }
    public function imageDelete(Metodo $metodoP)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $imageName = "";
        $metodoP->update([
            'image_met' => $imageName
        ]);
        return redirect()->back()
        ->with('success', '¡Se eliminó la imagen!');
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
        Metodo::where('id',$id)->delete();
        return back();
    }
}
