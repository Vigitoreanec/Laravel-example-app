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
                    <a href="{{ route('admin.create')}}" class="btn btn-success">создать Пост </a>


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