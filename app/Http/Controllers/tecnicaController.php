<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Tecnica;
use Carbon\Carbon;
use PDF;
use File;
use Illuminate\Support\Facades\Auth;

class tecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //MOSTRAR LISTADO TECNICAS EN VISTA CLIENTE
        $list = \DB::table('tecnicas')
            ->where("title_tec", 'like', '%' . $request->search . "%")
            ->whereNull('tecnicas.ind_cod_tec')
            ->orderBy('tecnicas.title_tec', 'asc')
            ->paginate(10);

        return view('tecnicas.list', ['list' => $list], compact('list'));
    }

    public function index()
    {
        //MOSTRAR TECNICAS EN LAS TABLAS - VISTA ADMIN
        
        $tecnicas = \DB::table('tecnicas')
        ->whereNull('tecnicas.categoria_id')
        ->orderBy('tecnicas.title_tec', 'asc')
        ->get();
        $li = \DB::table('tecnicas')
            ->select("tecnicas.first_cod_tec AS tecnica_p", "ind_cod_tec", "title_tec")
            ->whereNull('tecnicas.ind_cod_tec')
            ->orderBy('tecnicas.title_tec', 'asc')
            ->get();
        return view('tecnicas.index', compact('tecnicas', 'li'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPDF($id){
        //CREACIÓN DE PDF X TECNICA SELECCIONADA
        $list = \DB::table('tecnicas')
        ->whereNull('tecnicas.ind_cod_tec')
            ->where('tecnicas.first_cod_tec', '=', $id)
            ->orderBy('tecnicas.id')
            ->paginate(10);

        $show = \DB::table('tecnicas')
            ->leftjoin('insumo_metodo', 'tecnicas.id', '=', 'insumo_metodo.tecnica_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->where('tecnicas.first_cod_tec', '=', $id)
            ->orderBy('tecnicas.ind_cod_tec', 'asc')
            ->get();

        view()->share('tecnicas', $show);
        $pdf = PDF::loadView('show-pdf', compact('show', 'list'));
        return $pdf->download('archivo-pdf.pdf');
        
    }
    public function createPDF2(){
        //CREACIÓN DE PDF CON TECNICAS COMPLETAS
        $list = \DB::table('tecnicas')
        ->whereNull('tecnicas.ind_cod_tec')
            ->orderBy('tecnicas.id')
            ->paginate(10);

        $show = Tecnica::all();

        view()->share('tecnicas', $show);
        $pdf = PDF::loadView('show-pdf', compact('show', 'list'));
        return $pdf->download('archivo-pdf.pdf');
        
    }
    public function tecnicas()
    {
        //MOSTRAR TECNICAS VISTA CLÍENTE
        $list = \DB::table('tecnicas')
        ->whereNull('tecnicas.ind_cod_tec')
            ->get();
        return view('tecnicas.list', compact('list'));
    }

    public function create()
    {
        //RETORNAR A ARCHIVO DE CREACIÓN
        $categoriaP = \DB::table('categorias')->get();
        $tecnicaP = \DB::table('tecnicas')
        ->whereNull('tecnicas.ind_cod_tec')
        ->orderBy('title_tec', 'asc')
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
        //METODO CARBON TRAE LA HORA ACTUAL
        $fecha = Carbon::now();

        //OBTENER ID DEL USUARIO LOGUEADO
        $user = Auth::user()->id;
        //METODO PARA INSERTAR
        try {
            if ($imageName = $request->file('image_tec')) {
                $imageName = time().'.'.$request->image_tec->extension();
            
                $request->image_tec->move(public_path('image'),$imageName);
    
                $tecnica = Tecnica::create([
                    'categoria_id' => $request->categoria_id,
                    'first_cod_tec' => $request->id_tecnica,
                    'ind_cod_tec' => $request->ind_cod_tec,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'image_tec' => $imageName,
                    'creation_date' => $fecha,
                    'level' => $request->level,
                    'order' => $request->order,
                    'id_user' => $user,
        
                ]);
                //dd($tecnica);
            }else{
                $tecnica = Tecnica::create([
                    'categoria_id' => $request->categoria_id,
                    'first_cod_tec' => $request->id_tecnica,
                    'ind_cod_tec' => $request->ind_cod_tec,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'creation_date' => $fecha,
                    'level' => $request->level,
                    'order' => $request->order,
                    'id_user' => $user,
        
                ]);
            }
            return redirect(route('tecnicas.index'))
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
        //MOSTRAR ACORDEÓN DE TECNICAS
        $bandera = 0;
        $list = \DB::table('tecnicas')
            ->select('first_cod_tec')
            ->distinct()
            ->whereNull('tecnicas.ind_cod_tec')
            ->where('tecnicas.first_cod_tec', '=', $id)
            ->paginate(10);

        $show = \DB::table('tecnicas')
            ->leftjoin('insumo_metodo', 'tecnicas.id', '=', 'insumo_metodo.tecnica_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->where('tecnicas.first_cod_tec', '=', $id)
            ->orderBy('tecnicas.ind_cod_tec', 'asc')
            ->get();

        //dd($show);

        return view('show', compact('show', 'bandera', 'list'))->with('show', $show, 'list', $list);
    }
    public function show2(Request $request,$id)
    {
        //MOSTRAR VISTA PARA DESCARGAR PDF
        $list = \DB::table('tecnicas')
        ->select('first_cod_tec')
            ->distinct()
            ->where("title_tec", 'like', '%' . $request->search . "%")
            ->whereNull('tecnicas.ind_cod_tec')
            ->where('tecnicas.first_cod_tec', '=', $id)
            ->paginate(10);
            
        $bandera = 0;
        $show = \DB::table('tecnicas')
            ->leftjoin('insumo_metodo', 'tecnicas.id', '=', 'insumo_metodo.tecnica_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->where('tecnicas.first_cod_tec', '=', $id)
            ->orderBy('tecnicas.ind_cod_tec')
            ->get();

        //dd($metodo);
        //SELECT * FROM metodos A left join det_metodo B ON B.id_metodo = A.id WHERE A.first_cod = 1 ORDER BY `ind_cod`
        return view('show-pdf', compact('show', 'bandera', 'list'))->with('show', $show);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnica $tecnica)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $tecnicaP = \DB::table('tecnicas')
        ->whereNull('tecnicas.ind_cod_tec')
        ->orderBy('title_tec', 'desc')
        ->get();
        $li = \DB::table('tecnicas')
            ->select("tecnicas.first_cod_tec AS tecnica_p", "ind_cod_tec", "title_tec")
            ->whereNull('tecnicas.ind_cod_tec')
            ->get();
        return view("tecnicas.edit", compact('tecnica', 'tecnicaP', 'li'));
    }
    public function imageDelete(Tecnica $tecnica)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $imageName = "";
        $tecnica->update([
            'image_tec' => $imageName
        ]);
        return redirect()->back()
        ->with('success', '¡Se eliminó la imagen!');
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
        //METODO CARBÓN TRAE LA HORA ACTUAL
        $fecha = Carbon::now();

        $user = Auth::user()->id;
        //METODO PARA ACTUALIZAR
        try {
            if ($imageName = $request->file('image_tec')) {
                $imageName = time().'.'.$request->image_tec->extension();
            
                $request->image_tec->move(public_path('image'),$imageName);
    
                $tecnica->update([
                    'first_cod_tec' => $request->id_tecnica,
                    'ind_cod_tec' => $request->ind_cod_tec,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'image_tec' => $imageName,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }else{
                $tecnica->update([
                    'first_cod_tec' => $request->id_tecnica,
                    'ind_cod_tec' => $request->ind_cod_tec,
                    'title_tec' => $request->title_tec,
                    'description_tec' => $request->description_tec,
                    'creation_date' => $fecha,
                    'id_user' => $user,
        
                ]);
            }
            return redirect(route('tecnicas.index'))->with('success', '¡Registro actualizado!');
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
        Tecnica::where('id',$id)->delete();
        return back();
    }
}
