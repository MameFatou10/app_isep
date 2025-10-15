@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Détails du contact</h1>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $contact->prenom }} {{ $contact->nom }}</h4>
            <p class="card-text"><strong>Adresse :</strong> {{ $contact->adress ?? 'Non renseignée' }}</p>
            <p class="card-text"><strong>Téléphone :</strong> {{ $contact->telephone }}</p>
            <p class="card-text"><strong>RIB :</strong> {{ $contact->rib }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Modifier</a>

        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce contact ?')">
                Supprimer
            </button>
        </form>
    </div>
</div>
@endsection
