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
    
    // ********************************* Usuario SuperAdministrador Metodos ********************************* //

    // ---- Ir a la pagina del SuperAdmistrador ---- //
    public function superAdmin()
    {
        $todosUsuarios = DB::table('users')->get();
        $suscritores = DB::table('suscritos')->get();
        ($suscritores);
        return view('users.superadmin.superadmin')
        ->with('todos',$todosUsuarios)
        ->with('suscritos',$suscritores);

    }

    // ---- El SuperAdmistrador va a editar un usuario  ---- // 
    public function goEditUser($id)
    {
        return view('users.superadmin.edituser');

    }

    // ---- Vista que utiliza el SuperAdmistrador para enviar correos  ---- // 
    public function mail()
    {
        return view('users.superadmin.mail');

    }


    // ********************************* Usuario Administrador Metodos ********************************* //
    public function goAdmin()
    {
        
        $tipoUsuarios = DB::table('tipousuarios')->get();
        //dd($tipoUsuarios);
        return view('users.admin.admin')
        ->with('tipos',$tipoUsuarios);
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
