@extends('layouts.app')

@section('title', 'Посты')

@section('menu')
    @include('admin.parts.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <h2>Посты категории {{ $categories->name }}</h2>
                @forelse ($posts as $post)

                    <a href="{{ route('posts.show', $post) }}">{{ $categories->name }} {{ $post->title }}</a><br>
                @empty
                    <p>Нет постов</p>
                @endforelse


            </div>
        </div>
    </div>
@endsection