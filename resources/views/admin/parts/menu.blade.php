<ul class="navbar-nav me-auto">

    <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">Админка</a>
    </li>
    
    @if(Auth::user()->is_admin)
   <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.posts.index')) active @endif" href="{{ route('admin.posts.index') }}">Посты</a>
    </li>
   
   
   <li class="nav-item">
        <a class="nav-link @if (Route::is('admin.categories.index')) active @endif" href="{{ route('admin.categories.index') }}">Категории</a>
    </li>
    @endif
</ul>