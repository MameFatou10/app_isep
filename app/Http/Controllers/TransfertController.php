<?php

namespace App\Http\Controllers;

use App\Models\Transfert;
use App\Models\Contact;
use Illuminate\Http\Request;

class TransfertController extends Controller
{
    public function index()
    {
        $transferts = Transfert::with('contact')->get();
        return view('transferts.index', compact('transferts'));
    }

    public function create()
    {
        $contacts = Contact::all();
        return view('transferts.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'montant' => 'required|numeric|min:0',
            'contact_id' => 'required|exists:contacts,id',
        ]);

        Transfert::create($request->all());

        return redirect()->route('transferts.index')->with('success', 'Transfert ajouté avec succès.');
    }

    public function edit(Transfert $transfert)
    {
        $contacts = Contact::all();
        return view('transferts.edit', compact('transfert', 'contacts'));
    }

    public function update(Request $request, Transfert $transfert)
    {
        $request->validate([
            'type' => 'required|string',
            'montant' => 'required|numeric|min:0',
            'contact_id' => 'required|exists:contacts,id',
        ]);

        $transfert->update($request->all());
        return redirect()->route('transferts.index')->with('success', 'Transfert mis à jour.');
    }

    public function destroy(Transfert $transfert)
    {
        $transfert->delete();
        return redirect()->route('transferts.index')->with('success', 'Transfert supprimé.');
    }
}
