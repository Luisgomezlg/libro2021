<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Principal;

class principalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cont = \DB::table('principals')
            ->get();
        //dd($cont);
        //MOTRAR LISTADO EN LAS TABLAS - VISTA ADMIN
        $principales = Principal::all();
        return view('principales.index', compact('principales', 'cont'));
    }

    public function principales()
    {
        //MOSTRAR DATOS EN VISTAS WELCOME PRINCIPAL VIEW( '/' ).
        $principales = Principal::all();
        return view('welcome', compact('principales'));
    }
    public function principalesAdm()
    {
        //MOSTRAR DATOS EN VISTAS DASHBOARD PRINCIPAL ADMINISTRATIVO VIEW( '/' ).
        $principales = Principal::all();
        return view('dashboard', compact('principales'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cont = \DB::table('principals')
        ->get();
        //RETORNAR A ARCHIVO DE CREACIÓN
        return view('principales.create', compact('cont'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //METODO INSERTAR
        try {
            if ($imageName = $request->file('image_pri')) {
                $imageName = time() . '.' . $request->image_pri->extension();

                $request->image_pri->move(public_path('image'), $imageName);

                $principal = Principal::create([
                    'title_cli' => $request->title_cli,
                    'title_adm' => $request->title_adm,
                    'title_image' => $request->title_image,
                    'image_pri' => $imageName,
                    'description_cli' => $request->description_cli,
                    'description_adm' => $request->description_adm,

                ]);
                //dd($tecnica);
            } else {
                $principal = Principal::create([
                    'title_cli' => $request->title_cli,
                    'title_adm' => $request->title_adm,
                    'description_cli' => $request->description_cli,
                    'description_adm' => $request->description_adm,
                ]);
            }
            return redirect(route('principales.index'))
                ->with('success', '¡Registro creado!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
        //dd($metodo);
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
    public function edit(Principal $principal)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN 
        return view("principales.edit", compact("principal"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Principal $principal)
    {
        //METODO PARA ACTUALIZAR
        try {
            if ($imageName = $request->file('image_pri')) {
                $imageName = time() . '.' . $request->image_pri->extension();

                $request->image_pri->move(public_path('image'), $imageName);

                $principal->update([
                    'title_cli' => $request->title_cli,
                    'title_adm' => $request->title_adm,
                    'title_image' => $request->title_image,
                    'image_pri' => $imageName,
                    'description_cli' => $request->description_cli,
                    'description_adm' => $request->description_adm,

                ]);
                //dd($tecnica);
            } else {
                $principal->update([
                    'title_cli' => $request->title_cli,
                    'title_adm' => $request->title_adm,
                    'description_cli' => $request->description_cli,
                    'description_adm' => $request->description_adm,
                ]);
            }
            return redirect(route('principales.index'))->with('success', '¡Registro actualizado!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
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
        Principal::where('id', $id)->delete();
        return back();
    }
}
