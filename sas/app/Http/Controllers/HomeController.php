<?php

namespace App\Http\Controllers;
use App\Models\Termini;
use App\Models\SlobodniDani;
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
    public function rezervacijaAdmin()
    {
        $sve = SlobodniDani::select("*")
        ->orderBy("dateMin")
        ->get();
        $termini = Termini::all();
        return view('rezervacijaAdmin',compact('termini','sve'));
    }
    public function index()
    {
        $sve = SlobodniDani::select("*")
        ->orderBy("dateMin")
        ->get();
        $termini = Termini::all();
        return view('home',compact('termini','sve'));
    }
    public function eKartoni(){
       
        $terminiGroup = Termini::select('*')
        ->groupBy('email')
        ->get();
        $termini = Termini::all();


        return view('eKartoni',compact('terminiGroup','termini'));
    }
 
}
