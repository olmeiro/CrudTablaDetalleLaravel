<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        return view('landing.index');
    }

    public function clientes(){
        return view('landing.clientes');
    }

    public function empresas(){
        return view('landing.empresas');
    }

    
}
