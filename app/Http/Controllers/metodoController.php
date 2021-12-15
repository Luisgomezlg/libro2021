<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use App\Models\Tecnica;
use App\Models\Insumo;
use App\Models\Principal;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use PDF;
use Illuminate\Support\Facades\Auth;

class metodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $first_cod, $ind_cod, $title, $description, $image_met, $id_insumo, $id_tecnica, $creation_date,  $level, $predecesor_met, $id_user;

    public function search(Request $request)
    {
        //LISTA DE METODOS VISTA CLIENTE
        $list = \DB::table('metodos')
            ->where("title", 'like', '%' . $request->search . "%")
            ->whereNull('metodos.ind_cod')
            ->orderBy('metodos.title', 'asc')
            ->paginate(10);

        return view('metodos.list', ['list' => $list], compact('list'));
    }
    public function createPDF($id)
    {
        //CREACIÓN DE PDF
        $list = \DB::table('metodos')
            ->whereNull('metodos.ind_cod')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.id')
            ->paginate(10);
        $principales = \DB::table('principals')
            ->where("principals.id", '=', 1)
            ->get();
        $show = \DB::table('metodos')
            ->leftjoin('insumo_metodo', 'metodos.id', '=', 'insumo_metodo.metodo_id')
            ->leftjoin('metodo_tecnica', 'metodos.id', '=', 'metodo_tecnica.metodo_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->leftjoin('tecnicas', 'tecnicas.id', '=', 'metodo_tecnica.tecnica_id')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.ind_cod', 'asc')
            ->get();

        view()->share('metodos', $show);
        $pdf = PDF::loadView('show-pdf', compact('show', 'list', 'principales'));
        return $pdf->stream('metodo.pdf');
    }
    public function createPDF2()
    {
        //CREACION DE PDF CON METODOS COMPLETOS
        $list = \DB::table('metodos')
            ->whereNull('metodos.ind_cod')
            ->orderBy('metodos.id')
            ->paginate(10);
            $principales = \DB::table('principals')
            ->where("principals.id", '=', 1)
            ->get();
        $show = Metodo::all();

        view()->share('metodos', $show);
        $pdf = PDF::loadView('show-pdf', compact('show', 'list', 'principales'));
        return $pdf->download('archivo-pdf.pdf');
    }
    public function index()
    {
        //LISTADO DE METODOS EN LAS TABLAS - VISTA ADMIN
        $metodo = \DB::table('metodos')
            ->select("metodos.id AS id_metodo", "metodos.first_cod AS metodo_p", "ind_cod", "title", "description", "creation_date", "level", "image_met", "predecesor_met", "name")
            ->leftjoin('users', 'users.id', '=', 'metodos.id_user')
            ->whereNotNull('metodos.ind_cod')
            ->get();
            $li = \DB::table('metodos')
            ->select("metodos.id AS id_metodo", "metodos.first_cod AS metodo_p", "ind_cod", "title")
            ->whereNull('metodos.ind_cod')
            ->get();

        //dd($metodo);
        return view('metodos.index', compact('metodo', 'li'));
    }
    public function ajaxTecnica(Request $request)
    {
        //METODO PARA BUSCAR TECNICA EN FORMULARIO - VISTA ADMIN
        $tecnica = [];

        if ($request->has('q')) {
            $search = $request->q;
            $tecnica = Tecnica::select("id", "title_tec")
                ->where('title_tec', 'LIKE', "%$search%")
                ->whereNull('tecnicas.ind_cod_tec')
                ->get();
        }
        return response()->json($tecnica);
    }
    public function ajaxInsumo(Request $request)
    {
        //METODO PARA BUSCAR INSUMOS EN FORMULARIO - VISTA ADMIN
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
        //LISTA DE METODOS - VISTA CLIENTE
        $list = \DB::table('metodos')
            ->whereNull('metodos.ind_cod')
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
        //RETORNAR A ARCHIVO DE CREACIÓN
        $metodo = \DB::table("metodos")
        ->whereRaw('LENGTH(ind_cod) >= 6')->get();
        $metodoall = DB::table("metodos")->orderby('created_at','DESC')->take(1)->get();
        
        $metodoPGuion = \DB::table('metodos')
            ->whereNull('metodos.ind_cod')
            ->orderBy('title', 'desc')
            ->get();
        $metodoP = \DB::table('metodos')
            ->whereNull('metodos.ind_cod')
            ->orderBy('title', 'desc')
            ->get();
        return view('metodos.create', compact('metodoP', 'metodo', 'metodoall', 'metodoPGuion'));
    }
    public function metodoGuion(Request $request){
        \Log::info($request->all());
        $fecha = Carbon::now();
        $datos = "-";
        $user = Auth::user()->id;
        $metodo = Metodo::create([
            'first_cod' => $request->enca,
            'ind_cod' => $datos,
            'title' => $datos,
            'description' => $datos,
            'creation_date' => $fecha,
            'id_user' => $user

        ]);
        return response()->json(['success'=>'Estado de usuario actualizado.']);
    }
    public function predecesor($id){
        $predecesor = \DB::table("metodos")->where("first_cod",$id)->whereRaw('LENGTH(ind_cod) <= 5 AND LENGTH(ind_cod) >= 2')->get();
        return json_encode($predecesor);
    }
    public function store(Request $request)
    {
        //METODO CARBÓN TRAE LA HORA ACTUAL
        $fecha = Carbon::now();
        $request->validate([
            'title' => 'required',
            'image_met' => 'nullable'
        ]);
        //METODO PARA INSERTAR
        $user = Auth::user()->id;
        try {
            $id = Metodo::latest('id')->first();
            if ($imageName = $request->file('image_met')) {
                $imageName = time() . '.' . $request->image_met->extension();

                $request->image_met->move(public_path('image'), $imageName);

                $metodo = Metodo::create([
                    'first_cod' => $request->id_metodo,
                    'ind_cod' => $request->ind_cod,
                    'title' => $request->title,
                    'description' => $request->description,
                    'image_met' => $imageName,
                    'creation_date' => $fecha,
                    'level' => $request->level,
                    'predecesor_met' => $request->pred,
                    'id_user' => $user,

                ]);
                //dd($metodo);
            } else {
                $metodo = Metodo::create([
                    'first_cod' => $request->id_metodo,
                    'ind_cod' => $request->ind_cod,
                    'title' => $request->title,
                    'description' => $request->description,
                    'creation_date' => $fecha,
                    'level' => $request->level,
                    'predecesor_met' => $request->pred,
                    'id_user' => $user,

                ]);
            }
            $metodo->insumo()->attach($request->id_insumo);
            $metodo->tecnica()->attach($request->id_tecnica);
            return redirect()->back()
            ->with('success', '¡Registro creado!');
        } catch (\Exception $e) {
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
    public function show(Request $request, $id)
    {
        //MOSTRAR ACORDEÓN
        //$bandera = 0;
        $list = \DB::table('metodos')
            ->where("title", 'like', '%' . $request->search . "%")
            ->whereNull('metodos.ind_cod')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.ind_cod', 'asc')
            ->paginate(10);
        $show = \DB::table('metodos')
            ->leftjoin('insumo_metodo', 'insumo_metodo.metodo_id', '=', 'metodos.id')
            ->leftjoin('metodo_tecnica', 'metodo_tecnica.metodo_id', '=','metodos.id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->leftjoin('tecnicas', 'tecnicas.id', '=', 'metodo_tecnica.tecnica_id')
            ->where('metodos.first_cod', '=', $id)
            ->get();

        //dd($show);
        //SELECT * FROM metodos A left join det_metodo B ON B.id_metodo = A.id WHERE A.first_cod = 1 ORDER BY `ind_cod`
        return view('show', compact('show', 'list'))->with('show', $show, 'list', $list);
    }
    public function showpre(Request $request, $id)
    {
        $list = \DB::table('metodos')
            ->where("title", 'like', '%' . $request->search . "%")
            ->whereNull('metodos.ind_cod')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.id')
            ->paginate(10);
        $showpre = \DB::table('metodos')
        ->where("metodos.id", '=', $id)->get();
            

        return view('showpre', compact('showpre', 'list'))->with('showpre', $showpre, 'list', $list);
    }
    public function show2(Request $request, $id)
    {
        //MOSTRAR VISTA PARA DESCARGAR PDF 
        $list = \DB::table('metodos')
            ->where("title", 'like', '%' . $request->search . "%")
            ->whereNull('metodos.ind_cod')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.id')
            ->paginate(10);
            $principales = \DB::table('principals')
            ->where("principals.id", '=', 1)
            ->get();
        $bandera = 0;
        $show = \DB::table('metodos')
            ->leftjoin('insumo_metodo', 'metodos.id', '=', 'insumo_metodo.metodo_id')
            ->leftjoin('metodo_tecnica', 'metodos.id', '=', 'metodo_tecnica.metodo_id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            //->leftjoin('tecnicas', 'tecnicas.id', '=', 'metodo_tecnica.tecnica_id')
            ->leftjoin('tecnicas', 'tecnicas.id', '=', 'metodo_tecnica.tecnica_id')
            ->where('metodos.first_cod', '=', $id)
            ->orderBy('metodos.ind_cod')
            ->get();

        //dd($metodo);
        //SELECT * FROM metodos A left join det_metodo B ON B.id_metodo = A.id WHERE A.first_cod = 1 ORDER BY `ind_cod`
        return view('show-pdf', compact('show', 'bandera', 'principales', 'list'))->with('show', $show, 'principales', $principales);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($metodo)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN

        $metodoP = \DB::table('metodos')
        ->where('id', $metodo)
        ->orderBy('title', 'desc')
        ->get();
        $encabezados = \DB::table('metodos')
        ->whereNull('metodos.ind_cod')
        ->orderBy('title', 'desc')
        ->get();

        //dd($metodoP);
        $metodos = Metodo::where('id', $metodo)->first();
        $insumos = Metodo::select("insumos.id", "insumos.title_ins")
            ->leftjoin('insumo_metodo', 'insumo_metodo.metodo_id', '=', 'metodos.id')
            ->leftjoin('insumos', 'insumos.id', '=', 'insumo_metodo.insumo_id')
            ->where('metodos.id', '=', $metodo)->get();
        $tecnicas = Metodo::select("tecnicas.id", "tecnicas.title_tec")
            ->leftjoin('metodo_tecnica', 'metodo_tecnica.metodo_id', '=', 'metodos.id')
            ->leftjoin('tecnicas', 'tecnicas.id', '=', 'metodo_tecnica.tecnica_id')
            ->where('metodos.id', '=', $metodo)->get();
        //dd($tecnicas);
            $predecesor = \DB::table("metodos")->where("first_cod",$metodo)->whereRaw('LENGTH(ind_cod) <= 5')->get();
        
            $li = \DB::table('metodos')
            ->select("metodos.id AS id_metodo", "metodos.first_cod AS metodo_p", "ind_cod", "title")
            ->whereNull('metodos.ind_cod')
            ->get();
        return view("metodos.edit", compact('metodos', 'encabezados', 'tecnicas', 'metodo', 'metodoP', 'predecesor', 'insumos', 'li'));
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
        $fecha = Carbon::now();
        $request->validate([
            'title' => 'required',
            'image_met' => 'nullable'
        ]);
        //METODO PARA ACTUALIZAR
        $user = Auth::user()->id;
        try {
            if ($imageName = $request->file('image_met')) {
                $imageName = time() . '.' . $request->image_met->extension();

                $request->image_met->move(public_path('image'), $imageName);
                $metodo->update([
                    'first_cod' => $request->id_metodo,
                    'ind_cod' => $request->ind_cod,
                    'title' => $request->title,
                    'description' => $request->description,
                    'image_met' => $imageName,
                    'creation_date' => $fecha,
                    'level' => $request->level,
                    'id_user' => $user

                ]);
            } else {
                $metodo->update([
                    'first_cod' => $request->id_metodo,
                    'ind_cod' => $request->ind_cod,
                    'title' => $request->title,
                    'description' => $request->description,
                    'creation_date' => $fecha,
                    'level' => $request->level,
                    'id_user' => $user

                ]);
                if ($request->filled('id_insumo')) {
                    $metodo->insumo()->detach($request->id);
                }
                if ($request->filled('id_tecnica')) {
                    $metodo->tecnica()->detach($request->id);
                }
            }
            $metodo->insumo()->attach($request->id_insumo);
            $metodo->tecnica()->attach($request->id_tecnica);

            return redirect(route('metodos.index'))->with('success', '¡Registro actualizado!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
        //dd($metodo);
    }
    public function imageDelete(Metodo $metodo)
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN
        $imageName = "";
        $metodo->update([
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
        Metodo::where('id', $id)->delete();
        return back();
    }
}
