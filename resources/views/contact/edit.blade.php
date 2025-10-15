
@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Modifier le Contact</h1>

    <form action="{{ route('contacts.update', $contact->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $contact->prenom}}" required>
        </div></br>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $contact->nom}}" required>
        </div></br>
        <div class="form-group">
            <label>Adress</label>
            <input type="text" name="adress" class="form-control" value="{{ $contact->adress}}" required>
        </div></br>
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" value={{ $contact->telephone}} required>
        </div></br>
        <div class="form-group">
            <label>RIB</label>
            <input type="text" name="rib" class="form-control" value="{{$contact->rib}}" required>
        </div></br>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('contacts.index')}}" class="btn btn-secondary p-lg-10">Annuler</a>
    </form>
</div>
@endsection
