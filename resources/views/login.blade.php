@extends('home');
@section('content')


    <div class="container">
        <h1> Se connecter</h1>
        <div class="card-body">
            <form action="{{route('login')}}" method="POST" class="vstack gap-3">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="Email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email')}}" placeholder="">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>

                <button class="btn btn-primary"> Se Connecter</button>

            </form>
        </div>

    </div>
@endsection
