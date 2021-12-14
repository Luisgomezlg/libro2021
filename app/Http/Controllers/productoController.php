<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $title_ins, $description_ins, $image, $creation_date, $id_user;

    public function search(Request $request)
    {
        //MOSTRAR LISTADO DE PRODUCTOS E INSUMOS - VISTA CLÍENTE
        $list = \DB::table('insumos')
        ->where("title_ins", 'like', '%' . $request->search . "%")
        ->orderBy('insumos.title_ins', 'asc')
        ->get();

        return view('productos.list', ['list' => $list], compact('list'));
    }

    public function index()
    {
        //MOSTRAR DATOS EN LAS TABLAS - VISTA ADMIN
        $insumos = \DB::table('insumos')
        ->orderBy('insumos.title_ins', 'asc')
        ->get(); 
        return view('productos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productos()
    {
        //MOSTRAR PRODUCTOS VISTA LIST
        $list = Insumo::paginate(6);
        return view('productos.list', compact('list'));
    }
    public function create()
    {
        //RETORNAR A ARCHIVO DE CREACIÓN
        return view('productos.create');
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
        $request->validate([
            'title_ins' => 'required',
        ]);
        //METODO CARBÓN TRAE LA HORA ACTUAL
        $fecha = Carbon::now();
        //OBTENER EL ID DE USUARIO LOGUEADO
        $user = Auth::user()->id;
        //METODO PARA INSERTAR
        try {
            if ($imageName = $request->file('image')) {
                $imageName = time().'.'.$request->image->extension();
            
                $request->image->move(public_path('image'),$imageName);
    
                $producto = Insumo::create([
                    'title_ins' => $request->title_ins,
                    'description_ins' => $request->description_ins,
                    'image' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
                //dd($tecnica);
            }else{
                $producto = Insumo::create([
                    'title_ins' => $request->title_ins,
                    'description_ins' => $request->description_ins,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }
            return redirect(route('productos.index'))
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
        //MOSTRAR DATOS DE UN INSUMO O PRODUCTO X ID
        $show = \DB::table('insumos')
            ->where('insumos.id', '=', $id)
            ->get();
        //dd($metodo);
        return view('show2', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $producto)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        
        return view("productos.edit", compact('producto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $producto)
    {
        //
        $fecha = Carbon::now();
        $user = Auth::user()->id;
        //METODO PARA ACTUALIZAR
        try {
            if ($imageName = $request->file('image')) {
                $imageName = time().'.'.$request->image->extension();
            
                $request->image->move(public_path('image'),$imageName);
    
                $producto->update([
                    'title_ins' => $request->title_ins,
                    'description_ins' => $request->description_ins,
                    'image' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }else{
                $producto->update([
                    'title_ins' => $request->title_ins,
                    'description_ins' => $request->description_ins,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }
            return redirect(route('productos.index'))->with('success', '¡Registro actualizado!');

        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
    }
    public function imageDelete(Insumo $producto)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $imageName = "";
        $producto->update([
            'image' => $imageName
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
        Insumo::where('id',$id)->delete();
        return back();
    }
}
