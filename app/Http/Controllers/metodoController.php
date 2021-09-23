<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use App\Models\Tecnica;
use App\Models\Insumo;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class metodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $first_cod, $ind_cod, $title, $description, $image, $id_insumo, $id_tecnica, $creation_date,  $level, $order, $id_user;

    public function search(Request $request)
    {
        $list = \DB::table('metodos')
            ->where("title", 'like', '%' . $request->search . "%")
            ->where('metodos.ind_cod', '=', '')
            ->orderBy('metodos.id')
            ->paginate(10);

        return view('metodos.list', ['list' => $list], compact('list'));
    }
    public function createPDF(){
        //Recuperar todos los productos de la db
        $show = Metodo::all();
        view()->share('metodos', $show);
        $pdf = PDF::loadView('show', compact('show'));
        return $pdf->download('archivo-pdf.pdf');
        
    }

    public function index()
    {
        //
        $metodo = Metodo::all();
        return view('metodos.index', compact('metodo'));
    }
    public function ajaxTecnica(Request $request)
    {
        $tecnica = [];

        if ($request->has('q')) {
            $search = $request->q;
            $tecnica = Tecnica::select("id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($tecnica);
    }
    public function ajaxInsumo(Request $request)
    {
        $insumo = [];

        if ($request->has('q')) {
            $search = $request->q;
            $insumo = Insumo::select("id", "title_ins")
                ->where('title_ins', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($insumo);
    }
    public function metodos()
    {
        //
        $list = \DB::table('metodos')
            ->where('metodos.ind_cod', '=', '')
            ->get();
        return view('metodos.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $metodoP = \DB::table('metodos')
            ->where('metodos.ind_cod', '=', '')
            ->get();

        return view('metodos.create', compact('metodoP'));
    }

    public function store(Request $request)
    {
        //
        $fecha = Carbon::now();
        $request->validate([
            'title' => 'required',
            'image' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imagen = $request->file('image')->store('images', 'public');
            
            $request->merge([
                'image' => $imagen,
            ]);
            $metodo = Metodo::create([
                'first_cod' => $request->id_metodo,
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
            $metodo = Metodo::create([
                'first_cod' => $request->id_metodo,
                'ind_cod' => $request->ind_cod,
                'title' => $request->title,
                'description' => $request->description,
                'creation_date' => $fecha,
                'level' => $request->level,
                'order' => $request->order,
                'id_user' => $request->id_user,
    
            ]);
        }
        
        $metodo->insumo()->attach($request->id_insumo);
        $metodo->tecnica()->attach($request->id_tecnica);

        //dd($metodo);

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
        $bandera = 0;
        $show = \DB::table('metodos')
            ->leftjoin('insumo_metodo', 'metodos.id', '=', 'insumo_metodo.metodo_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.ind_cod')
            ->get();

        //dd($metodo);
        //SELECT * FROM metodos A left join det_metodo B ON B.id_metodo = A.id WHERE A.first_cod = 1 ORDER BY `ind_cod`
        return view('show', compact('show', 'bandera'))->with('show', $show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Metodo $metodo)
    {
        //
        $metodoP = \DB::table('metodos')
        ->where('metodos.ind_cod', '=', '')
        ->get();
        return view("metodos.edit", compact('metodo', 'metodoP'));
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
        
        $prod = $request->all();

        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'images/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['image'] = "$imagenProducto";
        }else{
            unset($prod['image']);
        }
        $metodo->update($prod);
        //dd($metodo);
        return redirect(route('metodos.index'));
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
