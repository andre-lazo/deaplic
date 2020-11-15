<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notas;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_users=User::count();
        $count_notas=Notas::count();
        return view('home',compact('count_users','count_notas'));
    }
}
