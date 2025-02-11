@extends('layouts.app')

@section('title', 'Админ | Изменить категорию')

@section('menu')
@include('admin.parts.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            @include('parts.message')

            <div class="card">
                <div class="card-header">Изменить категорию {{$category}}</div>


            </div>
        </div>
    </div>
</div>
@endsection