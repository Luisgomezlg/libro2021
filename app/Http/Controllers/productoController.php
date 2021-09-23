<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
use Carbon\Carbon;

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
        $list = \DB::table('insumos')
        ->where("title_ins", 'like', '%' . $request->search . "%")
        ->orderBy('insumos.id')
        ->paginate(10);

        return view('productos.list', ['list' => $list], compact('list'));
    }

    public function index()
    {
        //
        $insumos = Insumo::all();
        return view('productos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productos()
    {
        //
        $list = Insumo::paginate(6);
        return view('productos.list', compact('list'));
    }
    public function create()
    {
        //
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
            'description_ins' => 'required',

        ]);
        $fecha = Carbon::now();
        if ($request->hasFile('image')) {
            $imagen = $request->file('image')->store('images', 'public');
            
            $request->merge([
                'image' => $imagen,
            ]);
            $producto = Insumo::create([
                'title_ins' => $request->title_ins,
                'description_ins' => $request->description_ins,
                'image' => $imagen,
                'creation_date' => $request->$fecha,
                'id_user' => $request->id_user,
    
            ]);
        }
        else{
            $producto = Insumo::create([
                'title_ins' => $request->title_ins,
                'description_ins' => $request->description_ins,
                'creation_date' => $request->creation_date,
                'id_user' => $request->id_user,
    
            ]);
        }
        

        return redirect(route('productos.index'));
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
        //
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
        $prod = $request->all();

        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['image'] = "$imagenProducto";
        }else{
            unset($prod['image']);
        }
        $producto->update($prod);
        //dd($metodo);
        return redirect(route('productos.index'));
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
