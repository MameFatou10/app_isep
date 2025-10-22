@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Liste des Transferts</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('transferts.create') }}" class="btn btn-primary">+ Nouveau transfert</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Nom du contact</th>
                <th>RIB du contact</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transferts as $transfert)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transfert->type }}</td>
                    <td>{{ number_format($transfert->montant, 2, ',', ' ') }} FCFA</td>
                    <td>{{ $transfert->contact->nom ?? '—' }}</td>
                    <td>{{ $transfert->contact->rib ?? '—' }}</td>
                    <td>{{ $transfert->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('transferts.edit', $transfert->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('transferts.destroy', $transfert->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce transfert ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Aucun transfert enregistré</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
