@extends('layouts.app')
@section('title', 'Пост')

@section('menu')
@if (auth())
    @include('admin.parts.menu')
@else
    @include('parts.menu')    
@endif
@endsection

@section('content')
<div style="text-align: center;  
                    margin-top: 0;
                    margin-bottom: 0;">
    <h1>Пост</h1>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('parts.message')

            <div class="card">

                <div class="card-header"> {{ $post->title }} </div>

                <div class="card-body">
                    @if ($post->image)
                        <img class="w-25 me-2 float-start" src="{{ asset('storage/' . $post->image) }}" alt="img">
                    @endif
                    {{ $post->text }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection