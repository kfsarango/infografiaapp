<?php

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use InstaInfo\Categoria;

class InfografiaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /**/
    public function Categoria()
    {
        $todasCategorias = DB::table('categoria')->get();
       // dd($todosUsuarios);
        return view('users.admin.nuevacate') ->with('categoriasAll',$todasCategorias); 
    }

    public function createCategoria(Request $request)
    {   
        $id = DB::table('categoria')->insertGetId(
            ['nombre' =>$request->get('nom')]
        );
        return redirect('nuevain')->with('success', 'Information has been added');
    }

    public function probandodatos(Request $request)
    {   
        $id_usuario = Categoria::select('idcategoria')->orderby('created_at','DESC')->first();
        dd($id_usuario);
    }

}
