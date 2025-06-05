<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificacionController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('notificaciones', compact('notifications'));
    }
}
