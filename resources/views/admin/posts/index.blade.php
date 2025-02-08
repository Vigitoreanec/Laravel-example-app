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
                <div class="card-body" style=" display: grid;">
                    @forelse($posts as $post)
                        <div style="display:inline; position:relative;">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <span>{{$post->title }}</span>
                            </a>
                        </div>
                    @empty
                        </div>
                        <div style="    display: grid; align-content: center;   justify-content: center;">
                            <span>Нет постов</span>
                        </div>
                    @endforelse
            </div>
        </div>
    </div>
</div>
@endsection