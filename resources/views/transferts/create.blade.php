@extends('layouts.base')

@section('content')
<h2>Ajouter un Transfert</h2>

<form action="{{ route('transferts.store') }}" method="POST">
    @csrf

    <label>Type :</label>
    <select name="type" id="type" required>
        <option value="">depot</option>
        <option value="">transfert</option>
    </select>

    <label>Montant :</label>
    <input type="number" step="0.01" name="montant" required>

    <label>Contact :</label>
    <select name="contact_id" required>
        <option value="">-- Choisir un contact --</option>
        @foreach($contacts as $contact)
            <option value="{{ $contact->id }}">{{ $contact->nom }} — RIB : {{ $contact->rib }}</option>
        @endforeach
    </select>

    <button type="submit">Enregistrer</button>
</form>
@endsection
