@extends('layouts.app')

@section('title', 'Админ | Посты')

@section('menu')
@include('parts.menu')
@endsection
@section('content')
@@dump($posts)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Посты</div>

                <div class="card-body">
                    <a href="" class="btn btn-success">создать Пост </a>


                </div>
                @forelse($posts as $post)
                    <div style="display:inline; position:relative;">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <span>{{$post->title }}</span>
                        </a>
                    </div>
                @empty
                    <div>
                        <span>Нет постов</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection