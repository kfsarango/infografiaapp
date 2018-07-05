<?php

namespace InstaInfo\Http\Controllers\Auth;

use InstaInfo\User;
use InstaInfo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Mail; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/super';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:25',
            'correo' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \InstaInfo\User
     */
    protected function create(array $data)
    {
        Mail::send('users.superadmin.mail', $data, function ($message) use($data){     //
            $message->from('kleverfsarango@gmail.com', 'InstaInfo');  //
            $message->to($data['correo']);                            //
            $message->subject('Bienvenido');                                   //
           });
        return User::create([
            'nombres' => 'Usuario',
            'apellidos' => 'Admin',
            'correo' => '',
            'telefono' => '',
            'departamento' => '',
            'seccion' => '',
            'username' => $data['username'],
            'tipousuario' => '1',
            'password' => Hash::make($data['password']),
        ]);
    }
}
