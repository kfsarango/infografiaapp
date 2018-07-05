<?php

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use InstaInfo\Item;


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
        $items = DB::table('items')->distinct()->select('campo')->where('categoria_idcategoria', '=', 4)->get();
       // dd($todosUsuarios);
        return view('users.admin.nuevacate') ->with('categoriasAll',$todasCategorias)->with('campos',$items); 
    }

    public function createCategoria(Request $request)
    {   
        $id = DB::table('categoria')->insertGetId(
            ['nombre' =>$request->get('nom')]
        );

        

        return redirect('nuevain');

    }

    public function probandodatos(Request $request)
    {
        $campos = DB::table('items')->select('campo')->distinct('campo')->get();
        //$campos->getcodes()->distinct('campo');
        dd($campos);
        //echo ("<script>console.log($campos)</script>"); 
    }
}
