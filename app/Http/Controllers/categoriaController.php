<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Carbon\Carbon;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $categoria = Categoria::all();
        return view('categorias.index', compact('categoria'));
    }
    public function search(Request $request)
    {
        $list = \DB::table('categorias')
            ->where("title", 'like', '%' . $request->search . "%")
            ->orderBy('categorias.id')
            ->paginate(5);

        return view('categorias.list', ['list' => $list], compact('list'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $fecha = Carbon::now();
        $request->validate([
            'title' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $imagen = $request->file('image')->store('images', 'public');
            
            $request->merge([
                'image' => $imagen,
            ]);
            $categoria = Categoria::create([
                'title' => $request->title,
                'image' => $imagen,
                'creation_date' => $fecha,
                'id_user' => $request->id_user,
    
            ]);
        }
        else{
            $categoria = Categoria::create([
                'title' => $request->title,
                'creation_date' => $fecha,
                'id_user' => $request->id_user,
    
            ]);
        }


        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function searchC(Request $request)
    {
        //
        $show = \DB::table('tecnicas')
            ->where("title", 'like', '%' . $request->search . "%")
            ->where('tecnicas.ind_cod', '=', '')
            ->orderBy('tecnicas.id')
            ->paginate(5);
        return view('show3', compact('show'));
    }

    public function show( $id)
    {
        //
        $show = \DB::table('tecnicas')
            ->where('tecnicas.categoria_id', '=', $id)
            ->paginate(5);
        //dd($metodo);
        return view('show3', compact('show'));
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
    public function update(Request $request, $id)
    {
        //
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
