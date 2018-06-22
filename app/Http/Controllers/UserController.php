<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $suma = (s+1);
        $arreglo = array(5,"hola",7);

        return view('users.admin.admin')->with("var",$suma)->with("res",5)->with("array",$arreglo);
    }
}
