@extends('layouts.app')
@section('title', 'Пост')

@section('menu')
@include('parts.menu')    
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
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <p>Пост добавлен!</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header"> {{ $post->title }} </div>

                <div class="card-body"> {{ $post->text }} </div>
            </div>
        </div>
    </div>
</div>



@endsection