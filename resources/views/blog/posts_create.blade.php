@extends('layout.layout')

@section('css')

@endsection

@section('content')
    <h1 class="text-center">Nouveau article</h1>
        {{-- @include('layout.errors') --}}
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <select  class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name }}</option>
                @endforeach
            </select>

            {!!$errors->first('title','<p>:message</p>') !!}
        </div>
        <div class="form-group">
            <input class="form-control {!!$errors->has('title')? 'is-invalide':'' !!}"
                type="text" name="title"
                placeholder="Titre de l'article"
                value="{{ old('title')}}"
            >
            {!!$errors->first('title','<p>:message</p>') !!}
        </div>
        <div class="form-group">
            <textarea class="form-control {!!$errors->has('body')? 'is-invalide':'' !!}"
                name="body"
                placeholder="Description de votre article"
                id="" cols="30" rows="10"
            >{{ old('body')}}</textarea>
            {!!$errors->first('body','<p>:message</p>') !!}
        </div>
        <div>
            <button type="submit" class="bt btn-success">Envoyer</button>
            <button type="reset" class="bt btn-danger">Reset</button>
        </div>
    </form>
@endsection

@section('js')

@endsection
