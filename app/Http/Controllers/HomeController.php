<?php

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    public function index()
    {
        $categories = DB::table('categoria')->get();
        
        return view('home')
        ->with('categorias', $categories);
    }

    public function getCantidadSuscriptores(Request $request, $id){
        if ($request->ajax()) {
            $contadorInfografias = DB::table('infografias')
                    ->join('items','infografias.idinfografia','=','items.infografias_idinfografia')
                    ->where('items.categoria_idcategoria','=',$id)
                    ->distinct('infografias.idinfografia')
                    ->count('infografias.idinfografia');
            $contadorSuscritos = DB::table('categoria')
                    ->join('categoria_has_suscritos','categoria.idcategoria','=','categoria_has_suscritos.idcategoria')
                    ->where('categoria.idcategoria','=',$id)
                    ->count();
            $response = array(
                'suscritores' => $contadorSuscritos,
                'infografias' => $contadorInfografias,
            );
            return response()->json($response);
        }
    }

    public function setSuscribe(Request $request){
        /*$response = array(
            'status' => 'success',
            'msg1' => $request->mail,
            'msg2' => $request->idcategoria,
        );
        return response()->json($response);*/
        $nroRegistros = DB::table('suscritos')->where('mail',$request->mail)->count();
        if ($nroRegistros == 0) {
            //Se inserta el nuevo correo
            $idSuscrito = DB::table('suscritos')->insertGetId(
                [
                    'mail' => $request->mail,
                    'tipousuario' => 3,
                ]
            );
            //Se hace la suscripción
            DB::table('categoria_has_suscritos')->insert(
                [
                    'idcategoria' => $request->idcategoria,
                    'idsuscritos' => $idSuscrito,
                ]
            );  
            return response()->json("ok");
            
        } else {
            //Recuperando el objeto suscritor
            $rowSuscritor = DB::table('suscritos')->where('mail',$request->mail)->get();

            //Obteniendo el id Suscriptor
            $idsuscrito = $rowSuscritor[0]->idsuscritos;

            $registro = DB::table('categoria_has_suscritos')
                            ->where('idcategoria',$request->idcategoria)
                            ->where('idsuscritos',$idsuscrito)
                            ->count();
            //Comprobando si no se ha suscrito a una categoria

            if ($registro == 0) {
                //Se hace la suscripción
                DB::table('categoria_has_suscritos')->insert(
                    [
                        'idcategoria' => $request->idcategoria,
                        'idsuscritos' => $idsuscrito,
                    ]
                );
                return response()->json("ok"); 
            } else {
                //Ya esta suscrito a esta categoria
                return response()->json("bad"); 
            }


        }
        
        /*$response = array(
            'status' => 'success',
            'msg1' => $request->mail,
            'msg2' => $request->idcategoria,
        );
        return response()->json($response);*/
        
     }
}
