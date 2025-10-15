@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Liste des Contacts</h1>

    <!-- Barre de recherche -->
    <form action="{{ route('contacts.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" name="q" class="form-control me-2" 
               placeholder="Rechercher un contact..." value="{{ $query ?? '' }}">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form><br><br>

        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Ajouter un contact</a>

    <!-- Tableau CRUD -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>RIB</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->prenom }}</td>
                <td>{{ $contact->nom }}</td>
                <td>{{ $contact->adress }}</td>
                <td>{{ $contact->telephone }}</td>
                <td>{{ $contact->rib }}</td>
                <td>
                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Aucun contact trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $contacts->appends(['q' => $query])->links() }}
    </div>
    
</div>
@endsection
 