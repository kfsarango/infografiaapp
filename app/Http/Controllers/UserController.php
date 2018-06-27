<?php
//use InstaInfo\Categoria;

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function updateAdmin(Request $request)
    {
        dd("hola");
    }
}
