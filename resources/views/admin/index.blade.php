@extends('layouts.app')

@section('title', 'Админ | Главная')

@section('menu')
@include('admin.parts.menu')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Админка</div>

                <div class="card-body" style="display: flex; justify-content: space-around;">

                    <h2>Добро пожаловать в админку!</h2>
                    <a href="{{ route('admin.posts.create')}}" class="btn btn-success">создать Пост </a>
                    {{-- <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">изменить Пост </a>
                    <a href="{{ route('admin.posts.create')}}" class="btn btn-danger">удалить Пост </a> --}}
                </div>

                <section style="text-align: center;  
                    margin-top: 0;
                    margin-bottom: 0;">
                    <h1>Посты</h1>
                    <div style="
                    display: grid;
                    grid-template-columns: repeat(3, auto);
                    min-height: 80%;">

                        @forelse($posts as $post)
                            <div class="u-carousel-duration-750 u-carousel-right u-gallery u-layout-grid u-lightbox u-show-text-always u-thumbnails-position-bottom u-gallery-1"
                                id="carousel-49c1" data-pswp-uid="1">

                                <div
                                    style=" text-align: center; background: grey; height: auto; max-width: 250px; margin: 20px auto">
                                    <div style="display:inline; position:relative;">
                                        {{-- <a href="/post/{{ $post['slug'] }}"> --}}
                                            <a href="{{ route('posts.show', $post->id) }}">
                                                <span>{{$post->title }}</span>
                                            </a>
                                            <!-- <a href="/?c=posts&a=delete&id=<?= $post->id ?>"> -->
                                            <span style="position:absolute; padding:0 5px; right:0;" href="{{ route('admin.posts.destroy', $post) }}">❌</span>
                                            {{-- </a> --}}
                                        <div class="u-align-center u-over-slide u-over-slide-1">
                                            <span>{{ $post->text }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div style="    display: grid; align-content: center;   justify-content: center;">
                                <span>Нет постов</span>
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection