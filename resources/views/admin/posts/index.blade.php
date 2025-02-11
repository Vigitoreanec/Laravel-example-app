@extends('layouts.app')

@section('title', 'Админ | Посты')

@section('menu')
@include('admin.parts.menu')
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Посты</div>

                <div class="card-body">
                    <a href="{{ route('admin.posts.create')}}" class="btn btn-success">создать Пост </a>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                </div>
                @forelse($posts as $post)
                    <div class="card-body" style=" display: grid; align-items: center; margin: 5px;">
                        <div style="display: flex;
                                                              align-items: center;
                                                              justify-content: space-between;
                                                              position: absolute;
                                                              width: 95%;">
                            <div style="position: relative;    float: left;">

                                <a href="{{ route('posts.show', $post->id) }}">
                                    <span style="margin: 20px">{{$post->title }}</span>
                                </a>
                            </div>
                            <div style="position: relative;    float: right;">
                                <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-primary">изменить Пост </a>

                                <a href="{{ route('admin.posts.index', $post)}}" class="btn btn-danger">удалить Пост </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="    display: grid; align-content: center;   justify-content: center;">
                        <span>Нет постов</span>
                    </div>
                @endforelse
                <div>{{$posts->links('pagination::bootstrap-4') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection