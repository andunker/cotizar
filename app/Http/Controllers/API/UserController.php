<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Direccione;
use App\Cliente;
use App\Proveedore;
use Lcobucci\JWT\Parser;

class UserController extends Controller
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_tipo_documento' => 'required',
            'documento' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'direccion' => 'required',
            'id_ciudad' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $data = $request->all();

        $usuario = User::create([
            'name' => $data['name'],
            'id_tipo_documento' => $data['id_tipo_documento'],
            'documento' => $data['documento'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Direccione::create([
            'direccion_txt' => $data['direccion'],
            'ciudad_id' => $data['id_ciudad'],
            'user_id' => $usuario->id
        ]);

        Cliente::create([
            'user_id' => $usuario->id
        ]);

        $data['proveedor'] = 'on';

        Proveedore::create([
            'user_id' => $usuario->id
        ]);

        $success['token'] = $usuario->createToken('MyApp')->accessToken;
        $success['name'] = $usuario->name;

        return response()->json([
            'usuario' => $usuario,
            'success' => $success
        ], $this->successStatus);

    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    /** 
     * logout api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function logout(Request $request)
    {
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();
        $response = 'You have been successfully logged out!';
        return response($response, 200);
    }

}