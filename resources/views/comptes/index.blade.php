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
            <h1 class="text-center text-success ">Liste des comptes</h1>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Rib</th>
                        <th scope="col">Status compte</th>
                        <!-- <th scope="col">Nom</th> -->
                        <th scope="col" class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comptes as $compte)
                    <tr class="text-center">
                        <th scope="row">{{$compte->id}}</th>
                        <td>{{$compte->rib}}</td>
                        <td class="alert">
                            @if ($compte->is_actif==1)
                            <span class="px-2 bg-success text-white"> Activé</span>
                            @else

                            <span class="px-2 bg-danger text-white"> Dèsactivé</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="/comptes/{{ $compte->id }}">
                                @csrf
                                @if ($compte->is_actif==1)
                                <div class="">

                                    <button type="submit" class="btn btn-danger ">Désactiver</button>
                                    @else
                                    <button type="submit" class=" btn btn-success">Activer</button>
                                    @endif
                                </div>

                            </form>
                        </td>
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