<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    
    /**
     * liste des contacts
     */
    public function index(Request $request)
    {
        // $query = $request->input('q');

        // $contacts = Contact::when($query, function ($q) use ($query) {
        //     $q->where('prenom', 'like', "%{$query}%")
        //       ->orWhere('nom', 'like', "%{$query}%")
        //       ->orWhere('telephone', 'like', "%{$query}%");
        // })
        // ->paginate(10); // pagination

        $contacts = Contact::all()->where('user_id', Auth::user()->id);
    
        //return $contacts;
        return view('contact.index', compact('contacts'));
    }

    /**
     * Formulaire de creation
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Sauvegarder un nouveau contact
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'adress' => 'nullable|string|max:255',
            'telephone' => 'required|string|unique:contacts,telephone',
            'rib' => 'required|string|max:14|unique:contacts,rib',
        ]);

        // $contact = new Contact();
        // $contact->prenom = $request->prenom;
        // $contact->nom = $request->nom;
        // $contact->telephone = $request->telephone;
        // $contact->adress = $request->adress;
        // $contact->rib = $request->rib;
        // $contact->user_id = $request->user_id;
        // $contact->save();



        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact) 
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit' , compact('contact'));
    }

    /**
     * Mettre à jour un contact
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'adress' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:14|unique:contacts,telephone,' .$contact->id,
            'rib' => 'required|string|max:14|unique:contacts,rib,' .$contact->id,
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact  mis à jour avec succés !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimén avec succès');
    }


    public function lister() {
        return "je suis une route nomé";
    }
}
