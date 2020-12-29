@extends('layout.layout')

@php
    $title="S'enregistrer";
@endphp
@section('content')
    <h1 class="text-center">{{ $title }}</h1>
    <form action="{{ route('register_sotre') }}" method="post">
        @csrf
        <div class="form-group col-6">
            <input class="form-control {!!$errors->has('name')? 'is-invalide':'' !!}"
                type="text" name="name"
                placeholder="Nom de l'utilisateur"
                value="{{ old('name')}}"
            >
            {!!$errors->first('name','<p>:message</p>') !!}
        </div>
        <div class="row">
            <div class="form-group col-6">
                <input class="form-control {!!$errors->has('email')? 'is-invalide':'' !!}"
                    type="email" name="email"
                    placeholder="Votre email"
                    value="{{ old('email')}}"
                >
                {!!$errors->first('email','<p>:message</p>') !!}
            </div>
            <div class="form-group col-6">
                <input class="form-control {!!$errors->has('email')? 'is-invalide':'' !!}"
                    type="email" name="email_confirmation"
                    placeholder="Confirmer votre email"
                    value="{{ old('email_confirmation')}}"
                >
                {!!$errors->first('email','<p>:message</p>') !!}
            </div>
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
            <div class="form-group col-6">
                <input class="form-control {!!$errors->has('password')? 'is-invalide':'' !!}"
                    type="password" name="password_confirmation"
                    placeholder="Confirmer votre mote de passe"
                    value="{{ old('password_confirmation')}}"
                >
                {!!$errors->first('password','<p>:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">S'enregistrer</button>
            <button type="reset" class="btn btn-outline-danger">Réinitialiser</button>
        </div>
@endsection
