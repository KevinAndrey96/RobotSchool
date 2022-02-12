<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role=='Administrator'){
            return redirect('/projects?id=all');
        }
        if (Auth::user()->role=='Coordinator') {
            return redirect('/classrooms');
        }
        if (Auth::user()->role=='Teacher') {
            return redirect('/classrooms');
        }
        if (Auth::user()->role=='Student') {
            return redirect('/myHomeworks');
        }




            //return view('home');


    }
}
