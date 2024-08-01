@extends('home');

@section('content')

<div class="container">
    {{-- pour le modal du voir plus --}}

{{-- fin ici --}}
    <h1 class="d-flex justify-content-center">CRUD EN LARAVEL</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{  session('status')}}
        </div>
    @endif
    <div class="row">
        <div class="col-10">
            <a href="create" class="btn btn-primary mb-3">Ajouter un Etudiant</a>
            <table class="table table-striped table-hover justify-content-center">
                <thead class="table-dark">

                    <tr>
                        <th scope="row">ID</th>
                        <td> Nom </td>
                        <td> Prenom </td>
                        <td> Classe </td>
                        <td> Actions </td>
                    </tr>

                </thead>
                <tbody>
                        @php
                            $ide = 1
                        @endphp

                        @foreach($etudiants as $etudiant)
                            <tr>
                                <th scope="row">{{ $ide }}</th>
                                <td> {{ $etudiant->nom}} </td>
                                <td>{{ $etudiant->prenom}} </td>
                                <td scope="row"> {{ $etudiant->classe}} </td>
                                <td class="">
                                    <a href="/supprimer/{{ $etudiant->id }}"><i class="fa-solid fas fa-trash-alt color-black" style="color:black"> </i></a>
                                    <a href="update/{{ $etudiant->id }}"><i class="fa-solid fas fa-pencil-alt hover color-black ms-4" style="color:black"> </i></a>

                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Informatons Etudiant {{ $etudiant->nom }} </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Nom Etudiant: {{ $etudiant->nom }}<br><br>
                                                    Classe Etudiant: {{ $etudiant->classe }}<br><br>
                                                    Prenom Etudiant: {{  $etudiant->prenom }}<br>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                    <a href="/show/{{$etudiant->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn "><i class="fa-solid fas fa-eye color-black ms-4" > </i></a>
                                </td>
                            </tr>
                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    </tr>

                </tbody>
              </table>
              {{ $etudiants->links() }}
        </div>
    </div>
</div>


@endsection

