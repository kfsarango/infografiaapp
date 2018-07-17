<?php

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Carbon\Carbon;
use Auth; 
use InstaInfo\User;
use InstaInfo\Item;
use InstaInfo\Categoria;
use InstaInfo\Infografia;
use InstaInfo\Detalle;

use Mail;


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
        $items = DB::table('items')->distinct()->select('campo')->where('categoria_idcategoria', '=', 2)->get();
        return view('users.admin.nuevacate') ->with('categoriasAll',$todasCategorias)->with('campos',$items); 
    }

    public function createCategoria(Request $request)
    {   
        $id = DB::table('categoria')->insertGetId(
            ['nombre' =>$request->get('nom')]
        );
        flash('Se ha creado una nueva categoría', 'info');
        return redirect('/useradmin/nuevain');

    }

    public function probandodatos(Request $request)
    {
        $campos = DB::table('items')->select('campo')->distinct('campo')->get();
        $date = new Carbon();
        //creando una nueva infografia para poder guardar los items
        DB::table('infografias')->insert([
            'nombre' => '',
            'concepto' => '',
            'plantilla' => '',
            'fecha_creacion' => $date,
            'ultima_modificacion' => $date,
            'usuarios_idusuario' => Auth::User()->id
        ]);
        
        //Recuperando ultimo id de la infografia insertada
        $infografiaData = DB::table('infografias')
                                ->select('idinfografia')
                                ->where('usuarios_idusuario', '=', Auth::User()->id)
                                ->orderBy('ultima_modificacion', 'desc')
                                ->first();

        $idInfo = $infografiaData->idinfografia;
        
        //Recorriendo los datos del formulario de items
        $items = $request->all();
        $cont = 0;
        $idcategoria = $request->get('idcat');
        foreach ($items as $name => $value) {
            if ($cont > 1) {
                print_r($name." - ");
                //Insertando los items
                DB::table('items')->insert([
                    'campo' => $name,
                    'valor' => $value,
                    'categoria_idcategoria' => $idcategoria,
                    'infografias_idinfografia' => $idInfo
                ]);
            }
            $cont++;
        }
        return view('users.admin.infografiaFinish')->with('infografia',$idInfo);
              
    }

    public function updateInfografia($id)
    {
        $infos = Infografia::find($id);
        $iden = DB::table('infografias')->distinct('plantilla')->select('plantilla')->where('idinfografia', '=', $id)->get();        
        //dd($iden);
        //dd($info);
        return view('users.admin.editInfografia')->with('info',$infos)->with('id',$iden);
    }


    public function getItemsOfCategory(Request $request, $id){
        if ($request->ajax()) {
            $items = DB::table('items')->distinct()->select('campo')->where('categoria_idcategoria', '=', $id)->get();
            return response()->json($items);
        }

    }
    
    public function plantillaenviada(Request $request, $id)
    {   
        
        $date = new Carbon();
        $info = Infografia::find($id);
        $info->nombre=$request->get('nombre');
        $info->concepto=$request->get('detalle');
        $info->plantilla=$request->get('numplan');
        $info->ultima_modificacion=$request->get('datemodificacion');
        $info->save();

        $infografia = Infografia::find($id);
        $items = DB::table('items')->distinct()->select('campo', 'valor')->where('infografias_idinfografia', '=', $id)->get();
        $numT=$request->get('numplan');
        $nameTemplate= 'plantillas.plantilla'.$numT;
        return view($nameTemplate)->with('items',$items)->with('id',$id);

    }

    public function templateeditada(Request $request, $id)
    {   
        $items = $request->all();
        
        dd($items);
        //Recorriendo los datos del formulario de items
        $detalles = $request->all();
        $cont = 0;
        foreach ($detalles as $detalle => $value) {
            if ($cont > 1) {
                //Insertando los items
                DB::table('detalles')->insert([
                    'iddetalle' => $name,
                    'contenido' => $value,
                    'presentaciones_idpresentacione' => $idcategoria
                ]);
            }
            $cont++;
        }

        return view;

    }

    //Envia a la vista que permite publicar la infografia
    public function publicateInfografia()
    {
        return view('users.admin.publicateinfo');
    }

    //Envia el correo a todos los suscriptores de una categoria
    public function enviarMailSuscritos(Request $request)
    {
        $data = $request->all();
        Mail::send('users.admin.attachment', $data, function ($message) use($data){     //
            $message->from('kleverfsarango@gmail.com', 'InstaInfo');  //
            $message->to('kleversarango@yahoo.com');                            //
            $message->subject('Test img');                                   //
           });
        return view('users.admin.publicateinfo');
    }
}
