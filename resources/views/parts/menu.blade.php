<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.posts')) active @endif" href="{{ route('admin.posts') }}">Посты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categories') }}">Категории</a>
    </li>
    @auth()
    <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">Админка</a>
    </li>
    @endauth
</ul>