@extends('layouts.app')

@section('title', 'Админ | Категории')

@section('menu')
@include('admin.parts.menu')
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.category.create')}}" class="btn btn-success">создать Категорию </a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Категории</div>

                <div class="card-body">
                    {{-- <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">изменить Категорию </a>
                    <a href="{{ route('admin.posts.create')}}" class="btn btn-danger">удалить Категорию </a> --}}
                    <h2>CRUD категории</h2>
                </div>
                <section style="text-align: center;  
                    margin-top: 0;
                    margin-bottom: 0;">
                    <div style=" text-align: center; background: grey; 
                                height: auto; max-width: 250px; margin: 20px auto">


                        @forelse ($categories as $category)

                            <a href="{{ route('admin.category.index', $category) }}">{{ $category->name }}</a><br>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse

                    </div>

                </section>
            </div>
        </div>
    </div>
</div>
@endsection