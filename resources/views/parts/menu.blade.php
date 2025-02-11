<ul class="navbar-nav me-auto">
    @if(Auth::user()->is_admin)
        <li class="nav-item">
            <a class="nav-link @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">Админка</a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link @if (Route::is('posts.index')) active @endif" href="{{ route('posts.index') }}">Посты</a>
    </li>

    @if(Auth::user()->is_admin)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">Категории</a>
        </li>
    @endif

</ul>