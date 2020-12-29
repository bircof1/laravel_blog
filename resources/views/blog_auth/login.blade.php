@extends('layout.layout')

@php
    $title="Se connecter";
@endphp
@section('content')
    <h1 class="text-center">{{ $title }}</h1>
    <form action="{{ route('login_store') }}" method="post">
        @csrf
        <div class="form-group col-6">
            <input class="form-control {!!$errors->has('name')? 'is-invalide':'' !!}"
                type="text" name="name"
                placeholder="Nom de l'utilisateur ou email"
                value="{{ old('name')}}"
            >
            {!!$errors->first('name','<p>:message</p>') !!}
        </div>
        <div class="row">
            <div class="form-group col-6">
                <input class="form-control {!!$errors->has('password')? 'is-invalide':'' !!}"
                    type="password" name="password"
                    placeholder="Votre mote de passe"
                    value="{{ old('password')}}"
                >
                {!!$errors->first('password','<p>:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            <label for="remember">Se souvenir de moi</label>
            <input type="checkbox" name="remember" id="remember">
        </div>
        <input type="hidden" name="page"
          value="{{ isset($_SERVER['HTTP_REFERER'])}}"
        >
        <div class="form-group">
            <button type="submit" class="btn btn-outline-success">Se connecter</button>
            <button type="reset" class="btn btn-outline-danger">Réinitialiser</button>
        </div>
@endsection
