@extends('layout.layout')

@section('css')

@endsection

@section('content')
    <h3 class="text-center">Mise à jour de "{{ $post->title }}"</h3>
        {{-- @include('layout.errors') --}}
    <form action="{{route('posts.update',$post) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <input class="form-control {!!$errors->has('title')? 'is-invalide':'' !!}"
                type="text" name="title"
                placeholder="Titre de l'article"
                value="{{ $post->title}}"
            >
            {!!$errors->first('title','<p>:message</p>') !!}
        </div>
        <div class="form-group">
            <textarea class="form-control {!!$errors->has('body')? 'is-invalide':'' !!}"
                name="body"
                placeholder="Description de votre article"
                id="" cols="30" rows="10"
            >{{ $post->body}}</textarea>
            {!!$errors->first('body','<p>:message</p>') !!}
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="bt btn-outline-success">Mèttre à jour </button>
            <button type="reset" class="bt btn-outline-danger">Réinitialiser</button>
        </div>
    </form>
@endsection

@section('js')

@endsection


