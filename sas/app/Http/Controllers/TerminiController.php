<?php

namespace App\Http\Controllers;
use App\Models\Termini;
use App\Models\SlobodniDani;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



class TerminiController extends Controller
{
    //
    public function dodajRezervaciju(Request $request){




        $t= new Termini();
        $t->date= $request['date'];
        $t->time= $request['data-Time'];
        if ($request->has('napomena')) {
            $t->text = $request['napomena'];
        }
        else{
        $t->text= 'Nema napomene.';
        }
        $t->name= $request['name'];
        $t->lname= $request['lname'];
        $t->email= $request['email'];
        $t->phone= $request['phone'];
        $t->role = $request['role'];
    // add other fields
    $t->save();

    Session::flash('flash_message', 'Uspešno ste dodali termin.');
    Session::flash('flash_type', 'alert-success');
    return back();
    }


    public function rezervisi()
    {
        $termini = Termini::all();
        Session::flash('flash_message', 'Uspešno ste dodali termin.');
	    Session::flash('flash_type', 'alert-success');
        return view('rezervisi')->with('termini',$termini);
    }

    public function obrisiRezervaciju($id){
       
     Termini::find($id)->delete();
        Session::flash('flash_message', 'Uspešno ste obrisali termin.');
	    Session::flash('flash_type', 'alert-success');
        return back();
       
    }
    public function dodajSlobodanDan(Request $request){
        
        $t= new SlobodniDani();
        $t->dateMin= $request['dateMin'];
        $t->dateMax= $request['dateMax'];
       
        $t->save();

    Session::flash('flash_message', 'Uspešno ste dodali slobodan dan.');
    Session::flash('flash_type', 'alert-success');
    return back();
    }
    public function updateNapomena($id,$text){
        $termin = Termini::find($id);
        $termin->text = $text;
        $termin->save();
        Session::flash('flash_message', 'Uspešno ste izmenili napomenu.');
	    Session::flash('flash_type', 'alert-success');
        return back();
    }

    public function deleteSlobodniDani($id){
        SlobodniDani::find($id)->delete();
        Session::flash('flash_message', 'Uspešno ste obrisali godišnji odmor.');
	    Session::flash('flash_type', 'alert-success');
        return back();
    }
}
