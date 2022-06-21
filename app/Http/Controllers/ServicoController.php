<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function Servicos()
    {
        return view('site.servicos');
    }
}