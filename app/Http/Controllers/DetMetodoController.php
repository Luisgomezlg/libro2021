<?php

namespace App\Http\Controllers;

use App\Models\DetMetodo;
use App\Models\Insumo;
use Illuminate\Http\Request;

class DetMetodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $list = \DB::table('det_metodos')
            ->where("title_det", 'like', '%' . $request->search . "%")
            ->orderBy('det_metodos.id')
            ->paginate(10);

        return view('det_metodos.list', ['list' => $list], compact('list'));
    }
    public function ajaxSearch(Request $request)
    {
    	$insumo = [];

        if($request->has('q')){
            $search = $request->q;
            $insumo =Insumo::select("id", "title")
            		->where('title', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($insumo);
    }
    public function index()
    {
        //
        $det_metodo = DetMetodo::all();
        return view('det_metodos.index', compact('det_metodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('det_metodos.create');
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
            'title_det' => 'required',
            'id_metodo' => 'required',
            'id_insumo' => 'required',
            'id_user' => 'required',

        ]);

        DetMetodo::create([
            'title_det' => $request->title_det,
            'id_metodo' => $request->id_metodo,
            'id_tecnica' => $request->id_tecnica,
            'id_insumo' => $request->id_insumo,
            'id_user' => $request->id_user,

        ]);
        return redirect(route('det_metodos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetMetodo  $detMetodo
     * @return \Illuminate\Http\Response
     */
    public function show(DetMetodo $detMetodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetMetodo  $detMetodo
     * @return \Illuminate\Http\Response
     */
    public function edit(DetMetodo $detMetodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetMetodo  $detMetodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetMetodo $detMetodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetMetodo  $detMetodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetMetodo $detMetodo)
    {
        //
    }
}
