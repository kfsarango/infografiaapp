<?php
//use InstaInfo\Categoria;

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use InstaInfo\User;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /**/
    public function goAdmin()
    {
        
        $tipoUsuarios = DB::table('tipousuarios')->get();
        //dd($tipoUsuarios);
        return view('users.admin.admin')
        ->with('tipos',$tipoUsuarios);
    }
    public function superAdmin()
    {
        $todosUsuarios = DB::table('users')->get();
       // dd($todosUsuarios);
        return view('users.superadmin.superadmin') ->with('todos',$todosUsuarios);

    }

    public function perfil()
    {
        return view('users.admin.edit');

    }

    public function diseño()
    {
        return view('plantillas.plantilla1');

    }

    public function updateAdmin(Request $request, $id)
    {   
        $user = User::find($id);
        $user->nombres=$request->get('nombre');
        $user->apellidos=$request->get('apellido');
        $user->correo=$request->get('correo');
        $user->telefono=$request->get('telefono');
        $user->departamento=$request->get('departamento');
        $user->seccion=$request->get('seccion'); 
        $user->save();

        return redirect('edit')->with('success','Information has been  deleted');
    }
}
