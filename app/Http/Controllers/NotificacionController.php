<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function index()
    {
        // Aquí puedes obtener las notificaciones para el usuario autenticado y enviarlas a la vista
        return view('notificaciones.index'); // Crea esta vista
    }
}
