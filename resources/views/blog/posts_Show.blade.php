@extends('layout.layout')

@section('css')

@endsection

@section('content')
<div class="row my-3 text-center">
    <div class="col-sm-12">
        <h1>{{ $post->title }}</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <div class="d-flex justify-content-between">
                            <span>Publié par:{{ $post->user->name }},  le
                               {{ ucWords($post->created_at->formatLocalized("%a %e %b %Y") )}}</span>
                            <span> Mise à jour le {{ $post->updated_at->diffForHumans()}}</span>
                        </div>
                        @can('update', $post)
                            <div class="d-flex justify-content-end mb-1 mt-1">
                                <a href="{{route('posts.edit',$post) }}">
                                    <button class="btn btn-outline-success m-1">Editer</button>
                                </a>
                                <form action="{{route('posts.delete',$post)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-1">Supprimer</button>
                                </form>
                            </div>
                        @endcan
                        <p class="card-text">{{ $post->body }}</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Aller à l'Acceuil</a>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <textarea name="body" id="body" cols="80" placeholder="Votre commentaire" rows="5"></textarea>
                            <button type="submit" class="btn btn-dark">Commenter</button>
                        </form>
                    </div>
                    <div class="card mt-5">
                        @foreach($post->comments()->with(['user','post'])->latest()->get() as $comment)
                            <div>
                                <strong>{{ $comment->user->name }}</strong>
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                            <div class="card-body">
                                {{ $comment->body }}
                            </div>
                        @endforeach
                    </div>
                </div>
    </div>
</div>

@endsection

@section('js')

@endsection
