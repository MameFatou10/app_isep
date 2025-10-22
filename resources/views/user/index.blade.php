

@section('content')

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste des comptes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body>
<hr>
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3 bg-success p-2 rounded-3  ">
        <a class="btn btn-light text-black " href="/dashboard">Dashboard</a>
        <!-- <a class="btn btn-light text-black" href="{{ route('contacts.create') }}">Ajouter un contact</a> -->
    </div>
    <h1 class="text-center text-success ">Liste des utilisateurs</h1>
    <table class="table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col" >Role</th>
            <th scope="col" >Rib</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr class="text-center">
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>

            <td>{{$user->email}}</td>

            <td>{{$user->role}}</td>

            <td>{{$user->compte->rib}}</td>



        </tr>
        @endforeach
        </tbody>
    </table>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>
</body>

</html>
