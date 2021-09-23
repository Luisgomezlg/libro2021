<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Tecnica;
use Carbon\Carbon;

class tecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $list = \DB::table('tecnicas')
            ->where("title", 'like', '%' . $request->search . "%")
            ->where('tecnicas.ind_cod', '=', '')
            ->orderBy('tecnicas.id')
            ->paginate(10);

        return view('tecnicas.list', ['list' => $list], compact('list'));
    }

    public function index()
    {
        //
        
        $tecnicas = Tecnica::all();
        return view('tecnicas.index', compact('tecnicas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tecnicas()
    {
        //
        $list = \DB::table('tecnicas')
            ->where('tecnicas.ind_cod', '=', '')
            ->get();
        return view('tecnicas.list', compact('list'));
    }

    public function create()
    {
        // 
        
        $categoriaP = \DB::table('categorias')->get();

        $tecnicaP = \DB::table('tecnicas')
            ->where('tecnicas.ind_cod', '=', '')
            ->get();

        return view('tecnicas.create', compact('tecnicaP', 'categoriaP'));
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
        $fecha = Carbon::now();
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('image')) {
            $imagen = $request->file('image')->store('images', 'public');
            
            $request->merge([
                'image' => $imagen,
            ]);
            Tecnica::create([
                'categoria_id' => $request->categoria_id,
                'first_cod' => $request->id_tecnica,
                'ind_cod' => $request->ind_cod,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagen,
                'creation_date' => $fecha,
                'level' => $request->level,
                'order' => $request->order,
                'id_user' => $request->id_user,
    
            ]);
        }
        else{
            Tecnica::create([
                'categoria_id' => $request->categoria_id,
                'first_cod' => $request->id_tecnica,
                'ind_cod' => $request->ind_cod,
                'title' => $request->title,
                'description' => $request->description,
                'creation_date' => $fecha,
                'level' => $request->level,
                'order' => $request->order,
                'id_user' => $request->id_user,
    
            ]);
        }

        return redirect(route('tecnicas.index'));
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
        $show = \DB::table('tecnicas')
            ->leftjoin('insumo_metodo', 'tecnicas.id', '=', 'insumo_metodo.tecnica_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->where('tecnicas.first_cod', '=', $id)
            ->orderBy('tecnicas.ind_cod')
            ->get();

        //dd($metodo);

        return view('show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnica $tecnica)
    {
        //
        $tecnicaP = \DB::table('tecnicas')
        ->where('tecnicas.ind_cod', '=', '')
        ->get();
        return view("tecnicas.edit", compact('tecnica', 'tecnicaP'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnica $tecnica)
    {
        //
        $prod = $request->all();

        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['image'] = "$imagenProducto";
        }else{
            unset($prod['image']);
        }
        $tecnica->update($prod);
        //dd($metodo);
        return redirect(route('tecnicas.index'));
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
