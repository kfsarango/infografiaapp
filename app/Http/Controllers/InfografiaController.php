<?php

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth; 
use InstaInfo\User;

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
        $date = new Carbon();
        //creando una nueva infografia para poder guardar los items
        /*DB::table('infografias')->insert([
            'nombre' => '',
            'concepto' => '',
            'plantilla' => '',
            'fecha_creacion' => $date,
            'ultima_modificacion' => $date,
            'usuarios_idusuario' => Auth::User()->id
        ]);*/

        //Recuperando ultimo id de la infografia insertada
        $infografiaData = DB::table('infografias')
                                ->select('idinfografia')
                                ->where('usuarios_idusuario', '=', Auth::User()->id)
                                ->orderBy('ultima_modificacion', 'desc')
                                ->first();
        $idInfo = $idInfografia->idinfografia;

        //Recorriendo los datos del formulario de items
        $items = $request->all();
        foreach ($items as $name => $value) {
            print_r($name);
            print_r($value);
            //Insertando los items
            /*DB::table('items')->insert([
                'campo' => '',
                'valor' => '',
                'categoria_idcategoria' => '',
                'infografias_idinfografia' => $idInfo
            ]);*/
        }

        
        $json = json_encode($items);
        $json2 = json_decode($json);


        
        
    }

}
