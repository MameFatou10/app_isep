<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    function afficherCompte(){
        $comptes=Compte::all();
        $comptes_actifs=Compte::all()->when(auth()->user()->is_actif==1);
        $comptes_desactifs=Compte::all()->when(auth()->user()->is_actif==0);
        return view('comptes.index',compact('comptes','comptes_actifs','comptes_desactifs' ));
    }
    function activer_desactiver_compte($id){

        $compte=Compte::find($id);

        if($compte->is_actif==1){
            $compte->is_actif=0;
        }else{
            $compte->is_actif=1;
        }

        $compte->save();
        return redirect()->back();
    }

}