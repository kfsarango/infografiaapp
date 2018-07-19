<?php
//use InstaInfo\Categoria;

namespace InstaInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use InstaInfo\User;
use InstaInfo\Item;

use Carbon\Carbon;
use Auth; 
use InstaInfo\Categoria;
use InstaInfo\Infografia;

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
        $usuarios = DB::table('users')
                    ->where('tipousuario',1)
                    ->get();
        $mailIdependientes = DB::table('correos')
                    ->select(
                        'correos.asunto',
                        'correos.para',
                        'correos.descripcion',
                        'correos.fecha',
                        'infografias.nombre',
                        'infografias.concepto',
                        'users.nombres',
                        'users.apellidos'
                    )
                    ->join('infografias','correos.idinfografia','infografias.idinfografia')
                    ->join('users','infografias.usuarios_idusuario','id')
                    ->where('correos.para','<>','s')
                    ->orderBy('correos.fecha','desc')
                    ->get();
        $categoria = DB::table('infografias')
                    ->select('categoria.idcategoria','categoria.nombrecategoria')
                    ->join('items','infografias.idinfografia','infografias_idinfografia')
                    ->join('categoria','idcategoria','categoria_idcategoria')
                    ->first();
        
        $mailSuscritos = DB::table('correos')
                    ->select(
                        'correos.asunto',
                        'correos.descripcion',
                        'correos.fecha',
                        'infografias.idinfografia',
                        'infografias.nombre',
                        'infografias.concepto',
                        'users.nombres',
                        'users.apellidos',
                        'categoria.idcategoria',
                        'categoria.nombrecategoria'
                    )
                    ->join('infografias','correos.idinfografia','infografias.idinfografia')
                    ->join('users','infografias.usuarios_idusuario','id')
                    ->join('items','infografias.idinfografia','infografias_idinfografia')
                    ->join('categoria','idcategoria','categoria_idcategoria')
                    ->where('correos.para','s')
                    ->orderBy('correos.fecha','desc')
                    ->distinct('infografias.idinfografia')
                    ->get();
        
        //$Todas las Infografias
        $infografias = DB::table('infografias')
                    ->select(
                        'infografias.idinfografia',
                        'infografias.nombre',
                        'infografias.ultima_modificacion',
                        'infografias.fecha_creacion',
                        'users.nombres',
                        'users.apellidos',
                        'users.departamento',
                        'users.seccion'
                        )
                    ->join('users','infografias.usuarios_idusuario','id')
                    ->orderBy('infografias.fecha_creacion','desc')
                    ->get();
        //$Todas las Categorias
        $categorias = DB::table('categoria')->get();

        $items = DB::table('items')
                    ->select('campo', 'categoria_idcategoria')
                    ->distinct()
                    ->get();

        $suscritores = DB::table('suscritos')->get();
        return view('users.superadmin.superadmin')
        ->with('todos',$usuarios)
        ->with('suscritos',$suscritores)
        ->with('undestinatario',$mailIdependientes)
        ->with('parasuscritores',$mailSuscritos)
        ->with('dataInfo',$infografias)
        ->with('categorias',$categorias)
        ->with('items',$items);

    }

    // ---- El SuperAdmistrador va a editar un usuario  ---- // 
    public function goEditUser($id)
    {
        $userObj = DB::table('users')
                ->where('id', $id)
                ->get();
       
        return view('users.superadmin.edituser')
                ->with('myUser',$userObj[0]);

    }
     // ---- El SuperAdmistrador va a eliminar un usuario  ---- // 
     public function dropUserAdmin($id)
     {
        DB::table('users')->where('id', $id)->delete();

        flash('Se ha eliminado un usuario', 'success');


        $usuarios = DB::table('users')
                ->where('tipousuario',1)
                ->get();
        $mailIdependientes = DB::table('correos')
                ->select(
                    'correos.asunto',
                    'correos.para',
                    'correos.descripcion',
                    'correos.fecha',
                    'infografias.nombre',
                    'infografias.concepto',
                    'users.nombres',
                    'users.apellidos'
                )
                ->join('infografias','correos.idinfografia','infografias.idinfografia')
                ->join('users','infografias.usuarios_idusuario','id')
                ->where('correos.para','<>','s')
                ->orderBy('correos.fecha','desc')
                ->get();
        $categoria = DB::table('infografias')
                ->select('categoria.idcategoria','categoria.nombrecategoria')
                ->join('items','infografias.idinfografia','infografias_idinfografia')
                ->join('categoria','idcategoria','categoria_idcategoria')
                ->first();

        $mailSuscritos = DB::table('correos')
                ->select(
                    'correos.asunto',
                    'correos.descripcion',
                    'correos.fecha',
                    'infografias.idinfografia',
                    'infografias.nombre',
                    'infografias.concepto',
                    'users.nombres',
                    'users.apellidos',
                    'categoria.idcategoria',
                    'categoria.nombrecategoria'
                )
                ->join('infografias','correos.idinfografia','infografias.idinfografia')
                ->join('users','infografias.usuarios_idusuario','id')
                ->join('items','infografias.idinfografia','infografias_idinfografia')
                ->join('categoria','idcategoria','categoria_idcategoria')
                ->where('correos.para','s')
                ->orderBy('correos.fecha','desc')
                ->distinct('infografias.idinfografia')
                ->get();

        //$Todas las Infografias
        $infografias = DB::table('infografias')
                ->select(
                    'infografias.idinfografia',
                    'infografias.nombre',
                    'infografias.ultima_modificacion',
                    'infografias.fecha_creacion',
                    'users.nombres',
                    'users.apellidos',
                    'users.departamento',
                    'users.seccion'
                    )
                ->join('users','infografias.usuarios_idusuario','id')
                ->orderBy('infografias.fecha_creacion','desc')
                ->get();
        //$Todas las Categorias
        $categorias = DB::table('categoria')->get();

        $items = DB::table('items')
                ->select('campo', 'categoria_idcategoria')
                ->distinct()
                ->get();

        $suscritores = DB::table('suscritos')->get();
        return view('users.superadmin.superadmin')
        ->with('todos',$usuarios)
        ->with('suscritos',$suscritores)
        ->with('undestinatario',$mailIdependientes)
        ->with('parasuscritores',$mailSuscritos)
        ->with('dataInfo',$infografias)
        ->with('categorias',$categorias)
        ->with('items',$items);


 
     }

    // ---- El SuperAdmistrador actualiza los datos de un usuario  ---- // 
    public function updateUserAdmin( Request $request)
    {
      // dd($request->all());
       $user = User::find($request->get('id'));
        $user->nombres=$request->get('name');
        $user->apellidos=$request->get('lastname');
        $user->correo=$request->get('mail');
        $user->telefono=$request->get('phone');
        $user->departamento=$request->get('department');
        $user->seccion=$request->get('section'); 
        $user->save();

        flash('Se ha actualizado la información del usuario', 'success');

        $usuarios = DB::table('users')
                    ->where('tipousuario',1)
                    ->get();
        $mailIdependientes = DB::table('correos')
                    ->select(
                        'correos.asunto',
                        'correos.para',
                        'correos.descripcion',
                        'correos.fecha',
                        'infografias.nombre',
                        'infografias.concepto',
                        'users.nombres',
                        'users.apellidos'
                    )
                    ->join('infografias','correos.idinfografia','infografias.idinfografia')
                    ->join('users','infografias.usuarios_idusuario','id')
                    ->where('correos.para','<>','s')
                    ->orderBy('correos.fecha','desc')
                    ->get();
        $categoria = DB::table('infografias')
                    ->select('categoria.idcategoria','categoria.nombrecategoria')
                    ->join('items','infografias.idinfografia','infografias_idinfografia')
                    ->join('categoria','idcategoria','categoria_idcategoria')
                    ->first();
        
        $mailSuscritos = DB::table('correos')
                    ->select(
                        'correos.asunto',
                        'correos.descripcion',
                        'correos.fecha',
                        'infografias.idinfografia',
                        'infografias.nombre',
                        'infografias.concepto',
                        'users.nombres',
                        'users.apellidos',
                        'categoria.idcategoria',
                        'categoria.nombrecategoria'
                    )
                    ->join('infografias','correos.idinfografia','infografias.idinfografia')
                    ->join('users','infografias.usuarios_idusuario','id')
                    ->join('items','infografias.idinfografia','infografias_idinfografia')
                    ->join('categoria','idcategoria','categoria_idcategoria')
                    ->where('correos.para','s')
                    ->orderBy('correos.fecha','desc')
                    ->distinct('infografias.idinfografia')
                    ->get();
        
        //$Todas las Infografias
        $infografias = DB::table('infografias')
                    ->select(
                        'infografias.idinfografia',
                        'infografias.nombre',
                        'infografias.ultima_modificacion',
                        'infografias.fecha_creacion',
                        'users.nombres',
                        'users.apellidos',
                        'users.departamento',
                        'users.seccion'
                        )
                    ->join('users','infografias.usuarios_idusuario','id')
                    ->orderBy('infografias.fecha_creacion','desc')
                    ->get();
        //$Todas las Categorias
        $categorias = DB::table('categoria')->get();

        $items = DB::table('items')
                    ->select('campo', 'categoria_idcategoria')
                    ->distinct()
                    ->get();

        $suscritores = DB::table('suscritos')->get();
        return view('users.superadmin.superadmin')
        ->with('todos',$usuarios)
        ->with('suscritos',$suscritores)
        ->with('undestinatario',$mailIdependientes)
        ->with('parasuscritores',$mailSuscritos)
        ->with('dataInfo',$infografias)
        ->with('categorias',$categorias)
        ->with('items',$items);

    } 

    // ---- El SuperAdmistrador consulta los correos de usuarios suscritos  ---- // 
    public function getSuscriptores($id)
    {
        $suscritores = DB::table('suscritos')
                ->select('suscritos.mail')
                ->join('categoria_has_suscritos','suscritos.idsuscritos','=','categoria_has_suscritos.idsuscritos')
                ->join('categoria','categoria_has_suscritos.idcategoria','=','categoria.idcategoria')
                ->where('categoria.idcategoria', $id)
                ->get();
        return response()->json($suscritores);
    }


    // ---- Vista que utiliza el SuperAdmistrador para enviar correos  ---- // 
    public function mail()
    {
        return view('users.superadmin.mail');

    }


    // ********************************* Usuario Administrador Metodos ********************************* //
    public function goAdmin()
    {
        //$tipoUsuarios = DB::table('tipousuarios')->get();
        //recuperando los datos nuevamente de la infografia

        $info = DB::table('infografias')
                ->select('infografias.idinfografia', 'infografias.nombre', 'infografias.concepto','infografias.plantilla', 'infografias.ultima_modificacion')
                ->join('users','infografias.usuarios_idusuario','id')
                ->where('users.id', Auth::user()->id)->get();
        //$info = DB::table('infografias')->get();
        //dd($info);

        return view('users.admin.admin')->with('dataInfo',$info);
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


        flash('Los datos del perfil se actualizaron exitosamente', 'success');

        return redirect('useradmin/edit')->with('success','Information has been  deleted');
    }
}
