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
<<<<<<< HEAD
    {
        $suma = (s+1);
        $arreglo = array(5,"hola",7);

        return view('users.admin.admin')->with("var",$suma)->with("res",5)->with("array",$arreglo);
=======
    {   
        $tipoUsuarios = DB::table('tipousuarios')->get();
        //dd($tipoUsuarios);
        return view('users.admin.admin')
        ->with('tipos',$tipoUsuarios);
>>>>>>> ba8850c70675e103916c3718b1d818aa14287282
    }
}
