@extends('home');

@section('content')

<div class="container">
    <h1 class="d-flex mb-4">Modifier un Etudiant</h1>
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



            <form method="POST" action="/update/traitement" class="form-group">
                @csrf
                <input type="text" name="id" style="display:none" value="{{ $etudiants->id}}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nom Etudiant</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nom" value="{{ $etudiants->nom}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Prenom Etudiant</label>
                  <input type="text" class="form-control" name="prenom" value="{{ $etudiants->prenom}}" >
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">classe</label>
                    <input type="text" class="form-control" name="classe" value="{{ $etudiants->classe}}" >
                </div>

                <button type="submit" class="btn btn-success mt-4">Modifier L'Etudiant</button>
                <a href="/" class="btn btn-danger mt-4">Retour</a>
              </form>
        </div>
    </div>
</div>

@endsection

