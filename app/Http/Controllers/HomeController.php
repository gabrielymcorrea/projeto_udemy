<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Restaurante $id)
    {
        $restaurantes =  Restaurante::paginate(10);
        return view('home', compact('restaurantes'));
    }

    public function get(Restaurante $id){
        return view('single', compact('id'));
        //print $id;
    }
}
