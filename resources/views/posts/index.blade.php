@extends('layouts.app')
@section('title', 'Посты')

@section('menu')
    @include('parts.menu')    
@endsection


@section('content')

    <section style="text-align: center;  
                        margin-top: 0;
                        margin-bottom: 0;">
        <h1>Посты</h1>
        <div style="margin: 42px auto 0 calc(((100% - 1480px) / 2));
                        display: grid;
                        grid-template-columns: repeat(3, auto);
                        min-height: 80%;
                        background-color: #ececec;">

            @forelse($posts as $post)
                <div class="u-carousel-duration-750 u-carousel-right u-gallery u-layout-grid u-lightbox u-show-text-always u-thumbnails-position-bottom u-gallery-1"
                    id="carousel-49c1" data-pswp-uid="1">

                    <div style=" text-align: center; background: grey; height: auto; max-width: 250px; margin: 20px auto">
                        <div style="display:inline; position:relative;">
                            {{-- <a href="/post/{{ $post['slug'] }}"> --}}
                                <a href="{{ route('posts.show', $post->id) }}">
                                    <span>{{$post->title }}</span>
                                </a>
                                <!-- <a href="/?c=posts&a=delete&id=<?= $post->id ?>"> -->
                                <span style="position:absolute; padding:0 5px; right:0;">❌</span>
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
        {{-- <div>{{$posts -> links('pagination::bootstrap-5') }}</div> --}}

    </section>
@endsection