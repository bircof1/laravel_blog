@extends('layout.layout')

@section('css')

@endsection

@section('content')
   <h1 class="text-center">La catégrie <strong> {{ $category->name }}</strong> et ses articles</h1>
   @forelse ($posts as $post)
   <div class="card mt-1">
       <div class="card-body w-100">
           <h5 class="card-title"><a href=" {{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
           <div class="d-flex justify-content-between">
               <span>
                   <strong>{{ $post->category->name }}</strong>-
                   Publié par:{{ $post->user->name }},le
                  {{ ucWords($post->created_at->formatLocalized("%a %e %b %Y") )}}</span>
               <span> Mise à jour le {{ $post->updated_at}}</span>
           </div>
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
           <p class="card-text">{{ $post->body }}</p>
           <a href="{{  route('posts.show', $post->id)  }}" class="btn btn-primary">Voir+</a>
       </div>
   </div>
   @empty
       <h4 class="text-center">Pas d'article trouvé</h4>
   @endforelse

@endsection
