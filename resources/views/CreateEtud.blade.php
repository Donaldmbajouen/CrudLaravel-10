@extends('home');

@section('content')

<div class="container">
    <h1 class="d-flex mb-4">Ajouter un Etudiant</h1>
    <hr>
    <div class="row">
        <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{  session('status')}}
                </div>
{{--
            @else
            <div class="alert alert-danger">
                {{ " echec de lenregistrement de l'etudiant" }}
            </div> --}}
            @endif

            @foreach($errors->all() as $errors)
                <div class="alert alert-danger">{{ $errors }}</div>
            @endforeach



            <form method="POST" action="/create/traitement" class="form-group">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail1">Nom Etudiant</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nom" aria-describedby="emailHelp" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Prenom Etudiant</label>
                  <input type="text" class="form-control" name="prenom" id="exampleInputPassword1" >
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">classe</label>
                    <input type="text" class="form-control" name="classe" id="exampleInputPassword1" >
                </div>

                <button type="submit" class="btn btn-success mt-4">Ajouter un Etudiant</button>
                <a href="/" class="btn btn-primary mt-4">Voir la Liste des Etudiants</a>
              </form>
        </div>
    </div>
</div>

@endsection

