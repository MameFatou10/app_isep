@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2>Modifier le Transfert</h2>

    <form action="{{ route('transferts.update', $transfert->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Type :</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $transfert->type) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Montant :</label>
            <input type="number" step="0.01" name="montant" class="form-control" value="{{ old('montant', $transfert->montant) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact :</label>
            <select name="contact_id" class="form-select" required>
                <option value="">-- Choisir un contact --</option>
                @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}" {{ $contact->id == $transfert->contact_id ? 'selected' : '' }}>
                        {{ $contact->nom }} — RIB : {{ $contact->rib }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('transferts.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
