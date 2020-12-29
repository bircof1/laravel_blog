<div class="row mt-4 w-100 justify-content-center">
    <div class="col-sm-10 mt-3 w-100">
        <div>
            <a class="btn-md btn btn-primary" href="{{ route('posts.create') }} ">Nouveau Article</a>
            <a class="btn-md btn btn-dark" href="{{ route('category.create')}} ">Nouvelle catégorie</a>
            @auth
                <P>
                    Salut {{ auth()->user()->name }}
                </P>
            @endauth
        </div>
        <h1 class="text-center">Les catégories</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <form action="{{ route('category.delete',$category) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-10">
                <h1 class="text-center">Les articles</h1>
                @forelse ($posts as $post)
                <div class="card mt-1">
                    <div class="card-body w-100">
                        <h5 class="card-title"><a href=" {{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
                        <div class="d-flex justify-content-between">
                            <span>
                                <strong>{{ $post->category->name }}</strong>-
                                Publié par:{{ $post->user->name }},le
                               {{ ucWords($post->created_at->formatLocalized("%a %e-%b-%Y") )}}</span>
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
                        <a href="{{  route('posts.show', $post)  }}" class="btn btn-primary">Voir+</a>
                    </div>
                </div>
                @empty
                    <h1 class="text-center">Pas d'article trouvé</h1>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-2 bg-dark">
            @forelse($categories as $key => $category)
                <p><a href="{{ route('categoryPost',$category) }}">{{ $category->name }}</a> </p>
            @empty
                <p>Pas de catégorie pour l'instant.</p>
            @endforelse
    </div>
    $posts->link;
</div>
