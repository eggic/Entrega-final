<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class HomeController extends Controller
{
   public function index()
{
    if (auth()->check() && auth()->user()->rol === 'admin') {
        return view('admin.dashboard');
    }

    $pedido = Pedido::first();
    return view('home', compact('pedido'));
}


}

