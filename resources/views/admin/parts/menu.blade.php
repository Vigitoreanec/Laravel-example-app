<ul class="navbar-nav me-auto">

    <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">Админка</a>
    </li>
    @auth()
   <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.posts.index')) active @endif" href="{{ route('admin.posts.index') }}">Посты</a>
    </li>
    @endauth
   <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.category.index')) active @endif" href="{{ route('admin.category.index') }}">Категории</a>
    </li>

</ul>