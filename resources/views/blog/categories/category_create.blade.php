@extends('layout.layout')

@section('css')

@endsection

@section('content')
    <h1 class="text-center">Nouvelle categorie</h1>
        {{-- @include('layout.errors') --}}
    <form action="{{ route('category.create') }}" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control {!!$errors->has('name')? 'is-invalide':'' !!}"
                type="text" name="name"
                placeholder="Nom de la catégorie"
                value="{{ old('name')}}"
            >
            {!!$errors->first('name','<p>:message</p>') !!}
        </div>
        <div>
            <button type="submit" class="bt btn-dark">Envoyer</button>
            <button type="reset" class="bt btn-danger">Reset</button>
        </div>
    </form>
@endsection

@section('js')

@endsection
