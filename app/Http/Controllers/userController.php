<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MOSTRAR DATOS EN LAS TABLAS - VISTA ADMIN
        $users = \DB::table('users')
        ->orderBy("name")
        ->get();
        return view('users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //RETORNAR A ARCHIVO DE CREACCIÓN
        $roles = Roles::all();
        return view('users.create', compact('roles'));
    }
    public function unauthorized()
    {
        //VISTA PARA RETORNAR A USUARIOS SIN PERMISOS PARA ADMINISTRADOR
        return view('unauthorized');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = 60;
        $request->validate([
            'name',
            'email',
            'password',
            'number_company',
        ]);
        //METODO PARA INSERTAR
        try {
            $user = User::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => $request->password = Hash::make(request('password')),
                'id_rol' => $request->id_rol,
                'number_company' => $request->number_company,
                'state' => $estado,
            ]);

            return redirect()->back()
                ->with('success', '¡Usuario creado!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', '¡Error al insertar!');
        }
    }
    public function userChangeStatus(Request $request)
    {
        //METODO PARA CAMBIAR EL ESTADO DEL USUARIO
    	\Log::info($request->all());
        $user = User::find($request->id);
        $user->state = $request->state;
        $user->save();
  
        return response()->json(['success'=>'Estado de usuario actualizado.']);
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
    public function passwordReset(User $user) 
    {
        //RETORNAR A ARCHIVO DE CAMBIO DE CONTRASEÑA - VISTA CLIENTE
        $user = Auth::user()->id;
        return view("users.passwordReset", compact('user'));
    }

    public function edit(User $user) 
    {
        //RETORNAR A ARCHIVO DE EDICCIÓN 
        $roles = Roles::all();
        return view("users.edit", compact('user', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request, User $user)
    {
        //METODO PARA CAMBIAR LA CONTRASEÑA DE USUARIO - VISTA CLIENTE
        $user->update([
            'password' => $request->password = Hash::make(request('password')),
        ]);
        return redirect()->route('login');
    }
    public function update(Request $request, User $user)
    {
        //
        $estado = 60;
        //METODO PARA ACTUALIZAR
        try {
            $user->update([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => $request->password = Hash::make(request('password')),
                'id_rol' => $request->id_rol,
                'number_company' => $request->number_company,
                'state' => $estado,
            ]);

            return redirect(route('users.index'))->with('success', '¡Registro actualizado!');

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
        User::where('id',$id)->delete();
        return back();
    }
}
