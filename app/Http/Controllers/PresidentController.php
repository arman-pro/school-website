<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class PresidentController extends Controller
{
    public function index()
    {
        $message = Message::where('page', 'president')->get();
        return view('menu.administration.president', compact('message'));
    }
}
