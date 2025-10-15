
@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Ajouter un Contact</h1>

    <form action="{{ route('contacts.store')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div></br>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div></br>
        <div class="form-group">
            <label>Adress</label>
            <input type="text" name="adress" class="form-control" required>
        </div></br>
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" required>
        </div></br>
        <div class="form-group">
            <label>RIB</label>
            <input type="text" name="rib" class="form-control" required>
        </div></br>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('contacts.index')}}" class="btn btn-secondary p-lg-10">Annuler</a>
    </form>
</div>
@endsection
