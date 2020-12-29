<nav class="nav nav-pills nav-justified mb-4 alert alert-info">
    <a class="nav-item nav-link" href="{{ route('posts.index') }}">Home</a>
    @guest()
        <a class="nav-item nav-link" href="{{ route('register') }}">S'enrregistrer</a>
        <a class="nav-item nav-link" href="{{ route('login') }}">Se connecter</a>
    @else
        <a class="nav-item nav-link" href="{{ route('logout') }}"> Se déconnecter</a>
        @if (auth()->user()->rank_id>=5)
        <a class="nav-item nav-link" href="{{ route('admin') }}"> Admin</a>
        @endif
    @endguest
</nav>
