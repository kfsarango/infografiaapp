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
use InstaInfo\Correo;

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
            ['nombrecategoria' =>$request->get('nom')]
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
        //dd($infos);
        //return view('users.admin.editInfografia')->with('info',$infos);
        $iden = DB::table('infografias')
                ->distinct('plantilla')
                ->select('plantilla')
                ->where('idinfografia', '=', $id)->get();        
        //dd($iden);
        //dd($info);
        return view('users.admin.editInfografia')->with('info',$infos)->with('id',$iden);
    }

    public function saveUpdateInfografia(Request $request, $id){
        $date = new Carbon();
        $info = Infografia::find($id);
        $info->nombre=$request->get('nombre');
        $info->concepto=$request->get('detalle');
        $info->plantilla=$request->get('numplan');
        //$cabb_caja->fecha_fin = $datefin;
        $info->ultima_modificacion = $date;
        //$info->ultima_modificacion=>$date;
        $info->save();

        return redirect(route('admin'))->with('info',$info);
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
        $info->ultima_modificacion = $date;
        $info->save();

        $infografia = Infografia::find($id);
        $items = DB::table('items')->distinct()->select('idItem', 'campo', 'valor')->where('infografias_idinfografia', '=', $id)->get();
        $numT=$request->get('numplan');
        $nameTemplate= 'plantillas.plantilla'.$numT;

        //insertamos los datos pre-establecidos en la tabla de la plantilla
        if($numT == 1){
            DB::insert('insert into detalles (presentaciones_idpresentacione, titulo1, foto1, titulo2, parrafo1, titulo3, titulo4, titulo5, parrafo2, titulo6, foto2) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$id, 'Title 1', '../../img/us.png', 'Title2', 'Texto del parrafo', 'Title 3', 'Title 4', 'Title 5', 'Texto del parrafo', 'Title 6', '../../img/grafico.png']);

        }
        
        return view($nameTemplate)->with('items',$items)->with('id',$id);

        }

    public function template($id)
    {
        $infografia = DB::table('infografias')
                        ->select('body')
                        ->where('idinfografia',$id)
                        ->get();
        $items = DB::table('items')->distinct()->select('idItem', 'campo', 'valor')->where('infografias_idinfografia', '=', $id)->get();
        $iden = DB::table('infografias')->select('plantilla')->where('idinfografia', '=', $id)->first();                
        //$plantilla = DB::table('infografias')->select('plantilla')->get();
        $plantilla=$iden->plantilla;
        $nameTemplate= 'plantillas.plantilla'.$plantilla;
        return view($nameTemplate)->with('items',$items)->with('id',$id)->with('body',$infografia[0]->body);   
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
    public function publicateInfografia($id)
    {
        $infografia = DB::table('infografias')
                ->join('items','infografias.idinfografia','=','items.infografias_idinfografia')
                ->join('categoria','items.categoria_idcategoria','=','categoria.idcategoria')
                ->where('infografias.idinfografia', $id)
                ->first();
        $suscritores = DB::table('suscritos')
                ->select('suscritos.mail')
                ->join('categoria_has_suscritos','suscritos.idsuscritos','=','categoria_has_suscritos.idsuscritos')
                ->join('categoria','categoria_has_suscritos.idcategoria','=','categoria.idcategoria')
                ->where('categoria.idcategoria', $infografia->idcategoria)
                ->get();

        $nrosuscritores = count($suscritores);
        
        return view('users.admin.publicateinfo')
        ->with('cantidadSuscritos',$nrosuscritores)
        ->with('infografia',$infografia)
        ->with('correos',$suscritores);
    }

    //Envia el correo a todos los suscriptores de una categoria
    public function enviarMailSuscritos(Request $request)
    {
        $data = $request->all();
        $dataMails = DB::table('suscritos')
                ->select('suscritos.mail')
                ->join('categoria_has_suscritos','suscritos.idsuscritos','=','categoria_has_suscritos.idsuscritos')
                ->join('categoria','categoria_has_suscritos.idcategoria','=','categoria.idcategoria')
                ->where('categoria.idcategoria', $request->get('categoria'))
                ->get();
        
        //Armando la lista de correos
        $correos = array();
        for ($i=0; $i < count($dataMails); $i++) { 
            $correos[] = $dataMails[$i]->mail;
        }                

        //haciendo la imagen
        $file_data = $request->input('imgvalue'); 
        $file_name = $data['concept'].'.png'; 

        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data); 
        if($file_data!=""){ // storing image in storage/app/public Folder 
            \Storage::disk('public')->put($file_name,base64_decode($file_data)); 
        }

        //Enviando los correos
        Mail::send('users.admin.attachment', $data, function ($message) use($data, $correos, $file_name){     //
            $message->from('kleverfsarango@gmail.com', 'InstaInfo');  //
            $message->to($correos);                            //
            $message->subject($data['concept']);
            $message->attach("C:\laragon\www\proyectoIngWeb\infografiaapp\storage\app\public/".$file_name,[
                'as'=>$file_name,
                'mime'=>'image/png',
            ]);
        });

        //Eliminando el archivo creado anteriormente
        if(\File::exists("C:\laragon\www\proyectoIngWeb\infografiaapp\storage\app\public/".$file_name)){
            \File::delete("C:\laragon\www\proyectoIngWeb\infografiaapp\storage\app\public/".$file_name);
          }

        //Creando un registro de los Mails Enviados
        $date = new Carbon();

        DB::table('correos')->insert([
            'asunto' => $data['concept'],
            'para' => 's',
            'descripcion' => $data['desc'],
            'fecha' => $date,
            'idusuario' => Auth::User()->id,
            'idinfografia' => $request->get('infografia')
        ]);
        
        //recuperando los datos nuevamente de la infografia
        $infografia = DB::table('infografias')
                ->where('idinfografia',$request->get('infografia'))
                ->get();
        $items = DB::table('items')
            ->distinct()
            ->select('campo', 'valor')
            ->where('infografias_idinfografia', '=', $request->get('infografia'))
            ->get();
        

        $nameTemplate= 'plantillas.plantilla'.$infografia[0]->plantilla;
        flash('Tu infografia a sido enviada los suscriptores', 'info');
        return view($nameTemplate)
            ->with('items',$items)
            ->with('id',$request
            ->get('infografia'));
    }

    //Iendo a la vista que permite enviar un correo en especifico
    public function goToSendInfografia($id)
    {
        $infografia = DB::table('infografias')
                ->join('items','infografias.idinfografia','=','items.infografias_idinfografia')
                ->join('categoria','items.categoria_idcategoria','=','categoria.idcategoria')
                ->where('infografias.idinfografia', $id)
                ->first();

        return view('users.admin.sendinfo')
        ->with('infografia',$infografia);
    }
    protected $uri;
    //Envia un correo con una infografia
    public function enviarMail(Request $request)
    {
        $data = $request->all();
        //haciendo imagen       
        $file_data = $request->input('imgvalue'); 
        $file_name = $data['concept'].'.png'; 

        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data); 
        if($file_data!=""){ // storing image in storage/app/public Folder 
            \Storage::disk('public')->put($file_name,base64_decode($file_data)); 
        }

        //Enviando los correos
        Mail::send('users.admin.attachment', $data, function ($message) use($data, $file_name){     //
            $message->from(Auth::User()->correo, 'InstaInfo');  //
            $message->to($data['tomail']);                            //
            $message->subject($data['concept']);
            $message->attach("C:\laragon\www\proyectoIngWeb\infografiaapp\storage\app\public/".$file_name,[
                'as'=>$file_name,
                'mime'=>'image/png',
            ]);
        });
        //Eliminando el archivo
        if(\File::exists("C:\laragon\www\proyectoIngWeb\infografiaapp\storage\app\public/".$file_name)){
            \File::delete("C:\laragon\www\proyectoIngWeb\infografiaapp\storage\app\public/".$file_name);
          }
        //Creando un registro del Mail Enviado
        $date = new Carbon();

        DB::table('correos')->insert([
            'asunto' => $data['concept'],
            'para' => $data['tomail'],
            'descripcion' => $data['desc'],
            'fecha' => $date,
            'idusuario' => Auth::User()->id,
            'idinfografia' => $request->get('infografia')
        ]);
        
        //recuperando los datos nuevamente de la infografia
        $infografia = DB::table('infografias')
                ->where('idinfografia',$request->get('infografia'))
                ->get();
        $items = DB::table('items')
            ->distinct()
            ->select('campo', 'valor')
            ->where('infografias_idinfografia', '=', $request->get('infografia'))
            ->get();
        

        $nameTemplate= 'plantillas.plantilla'.$infografia[0]->plantilla;
        flash('Tu infografia a sido enviada a '.$data['tomail'], 'info');
        return view($nameTemplate)
            ->with('items',$items)
            ->with('id',$request->get('infografia'));
    }

    //Guardar imagen previa ajax
    public function savePreviewImage(Request $request){

        //cargando el nuevo contenido de la infografia
        $info = Infografia::find($request->infografia);
        $info->body=$request->body;
        $info->save();

        //haciendo la imagen
        $file_data = $request->img; 
        $file_name = $request->infografia.'.png'; 

        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data); 
        if($file_data!=""){ // storing image in storage/app/public Folder 
            \Storage::disk('infografias')->put($file_name,base64_decode($file_data)); 
        }
        
        return response()->json('ok');
    }

}
