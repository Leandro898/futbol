<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('searches'); // Carga la vista 'searches.blade.php'
    }
}
