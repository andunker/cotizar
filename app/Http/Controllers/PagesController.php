<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class PagesController extends Controller
{
    public function home()
    {
        $productos= Producto::all();
        return view('welcome',[
            'productos' => $productos
        ]
    );
    }
}
