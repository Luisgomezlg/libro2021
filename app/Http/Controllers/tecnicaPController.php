<?php

namespace App\Http\Controllers;

use App\Models\Tecnica;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class tecnicaPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MOSTRAR DATOS EN LAS TABLAS - VISTA ADMIN
        $tecnicasP = \DB::table('tecnicas')
            ->select(
                "tecnicas.id AS id_tec",
                "tecnicas.categoria_id",
                "tecnicas.title_tec",
                "tecnicas.description_tec",
                "tecnicas.image_tec",
                "tecnicas.creation_date",
                "categorias.title"
            )
            ->join('categorias', 'categorias.id', '=', 'tecnicas.categoria_id')
            ->whereNull('tecnicas.ind_cod_tec')
            ->orderBy('tecnicas.title_tec', 'asc')
            ->get();
        return view('tecnicasP.index', compact('tecnicasP'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //RETORNAR A ARCHIVO DE CREACIÓN
        $categoriaP = \DB::table('categorias')->get();
        return view('tecnicasP.create', compact('categoriaP'));
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
        //METODO CARBON TRAE LA HORA ACTUAL
        $fecha = Carbon::now();

        $ind_cod_tec = NULL;
        //OBTENER EL ID DE USUARIO LOGUEADO
        $user = Auth::user()->id;
        //METODO PARA INSERTAR
        try {
            if ($imageName = $request->file('image_tec')) {
                $imageName = time().'.'.$request->image_tec->extension();
            
                $request->image_tec->move(public_path('image'),$imageName);
    
                $tecnica = Tecnica::create([
                    'categoria_id' => $request->categoria_id,
                    'ind_cod_tec' => $ind_cod_tec,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'image_tec' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
    
                ]);
                $tec = Tecnica::latest('id')->first();
            if ($tecnica !== null) {
                $tecnica->update(['first_cod_tec' => $tec->id]);
            }
                //dd($tecnica);
            }else{
                $tecnica = Tecnica::create([
                    'categoria_id' => $request->categoria_id,
                    'ind_cod_tec' => $ind_cod_tec,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'creation_date' => $fecha,
                    'id_user' => $user,
    
                ]);
                $tec = Tecnica::latest('id')->first();
            if ($tecnica !== null) {
                $tecnica->update(['first_cod_tec' => $tec->id]);
            }
            }
            return redirect(route('tecnicasP.index'))
            ->with('success', '¡Registro creado!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }

        //dd($metodo);


        return redirect(route('tecnicasP.index'));
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
    public function edit(Tecnica $tecnicaP)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $categoriaP = \DB::table('categorias')->get();

        return view("tecnicasP.edit", compact('tecnicaP', 'categoriaP'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnica $tecnicaP)
    {
        //METODO PARA ACTUALIZAR
        $fecha = Carbon::now();
        //OBTENER EL ID DE USUARIO LOGUEADO
        $user = Auth::user()->id;

        try {
            if ($imageName = $request->file('image_met')) {
                $imageName = time().'.'.$request->image_met->extension();
            
                $request->image_met->move(public_path('image'),$imageName);
    
                $tecnicaP->update([
                    'categoria_id' => $request->categoria_id,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'image_tec' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
    
                ]);
                //dd($tecnica);
            }else{
                $tecnicaP->update([
                    'categoria_id' => $request->categoria_id,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'creation_date' => $fecha,
                    'id_user' => $user,
    
                ]);
            }
            return redirect(route('tecnicasP.index'))->with('success', '¡Registro actualizado!');
        } catch (\Exception $e){
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
        Tecnica::where('id', $id)->delete();
        return back();
    }
}
