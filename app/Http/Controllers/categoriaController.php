<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MOSTRAR EL LISTADO DE CATEGORIAS EN LAS TABLAS
        $categoria = Categoria::all();
        return view('categorias.index', compact('categoria'));
    }
    public function search(Request $request)
    {
        $list = \DB::table('categorias')
            ->where("title", 'like', '%' . $request->search . "%")
            ->orderBy('categorias.title', 'asc')
            ->get();

        return view('categorias.list', ['list' => $list], compact('list'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //RETORNAR A ARCHIVO DE CREACIÓN
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //LA FUNCIÓN CARBÓN TRAE LA HORA ACTUAL
        $fecha = Carbon::now();

        //CAMPOS A VALIDAR
        $request->validate([
            'title' => 'required',

        ]);
        $user = Auth::user()->id;
        //METODO INSERT
        try {
            if ($imageName = $request->file('image')) {
                $imageName = time().'.'.$request->image->extension();
            
                $request->image->move(public_path('image'),$imageName);
    
                $categoria = Categoria::create([
                    'title' => $request->title,
                    'image' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
                //dd($tecnica);
            }else{
                $categoria = Categoria::create([
                    'title' => $request->title,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }
            return redirect(route('categorias.index'))
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
    
    public function searchC(Request $request)
    {
        //BUSCAR TECNICAS DENTRO DE CATEGORIAS Y EN TECNICAS SELECCIONADAS
        $show = \DB::table('tecnicas')
            ->where("title_tec", 'like', '%' . $request->search . "%")
            ->whereNull('tecnicas.ind_cod_tec')
            ->orderBy('tecnicas.title_tec', 'asc')
            ->get();
        return view('show3', compact('show'));
    }

    public function show($id)
    {
        //RETORNAR A ACORDEÓN CON TECNICAS
        $show = \DB::table('tecnicas')
            ->where('tecnicas.categoria_id', '=', $id)
            ->get();
        //dd($metodo);
        return view('show3', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        return view("categorias.edit", compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        
        $fecha = Carbon::now();
        $user = Auth::user()->id;
        //METODO ACTUALIZAR
        try {
            if ($imageName = $request->file('image')) {
                $imageName = time().'.'.$request->image->extension();
            
                $request->image->move(public_path('image'),$imageName);
    
                $categoria->update([
                    'title' => $request->title,
                    'image' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
                //dd($tecnica);
            }else{
                $categoria->update([
                    'title' => $request->title,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }
            return redirect(route('categorias.index'))->with('success', '¡Registro actualizado!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }

    }
    public function imageDelete(Categoria $categoria)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $imageName = "";
        $categoria->update([
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
        Categoria::where('id',$id)->delete();
        return back();
    }
}
