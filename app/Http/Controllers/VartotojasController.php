<?php

namespace App\Http\Controllers;

use App\Models\Vartotoja;

class VartotojasController extends Controller
{
    public function index()
    {
        $vartotojai = Vartotoja::all();
        return view('sarasas', ['vartotojai' => $vartotojai]);
    }
}