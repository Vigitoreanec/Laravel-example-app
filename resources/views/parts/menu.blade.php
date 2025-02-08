<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link @if (Route::is('posts.index')) active @endif" href="{{ route('posts.index') }}">Посты</a>
    </li>

    @auth()
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categories') }}">Категории</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">Админка</a>
    </li>
    @endauth
</ul>