<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use App\Cotizacione;
use DateTime;


class CotizacioneController extends Controller
{
    public $successStatus = 200;

    /** 
     * logout api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function cotizar(Request $request){
       
        $validator = Validator::make($request->all(), [
            'json_productos' => 'required',
            'estado' => 'required',
            'fecha_cierre' => 'required',
            'cliente_id' => 'required',
            'ciudad_id' => 'required',
          ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $validator = Validator::make(json_decode($request->all()['json_productos']), [
            'id' => 'required',
            'cantidad' => 'required',
            'categoria' => 'required'
        ]);

        $data = $request->all();

        $Cotizacion= Cotizacione::create([
            'json_productos' => $data['json_productos'],
            'estado' => $data['estado'] ,
            //'fecha_cierre' => $data['fecha_cierre'],
            'fecha_cierre' => new DateTime($data['fecha_cierre']),
            'cliente_id' => $data['cliente_id'],
            'ciudad_id' => $data['ciudad_id'],
        ]);
        
        return response()->json([
            'success' => 'success',
            'cotizacion_id'=> $Cotizacion['id']
        ], 
        $this->successStatus);
    }
}
