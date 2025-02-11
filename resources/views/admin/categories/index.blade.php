@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
@include('admin.parts.menu')
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            @include('parts.message')
            
            <div class="card">
                <div class="card-header">Категории</div>

                <div class="card-body">
                    <a href="{{ route('admin.categories.create')}}" class="btn btn-success">создать Категорию </a>

                    
                </div>
                @forelse($categories as $category)
                    <div class="card-body" style=" display: grid; align-items: center; margin: 5px;">
                        <div style="display: flex;
                                                                                  align-items: center;
                                                                                  justify-content: space-between;
                                                                                  position: absolute;
                                                                                  width: 95%;">
                            <div style="position: relative;    float: left;">

                                <a href="{{ route('admin.categories.show', $category) }}">
                                    <span style="margin: 20px">{{$category->name }}</span>
                                </a>
                            </div>
                            <div style="position: relative;    float: right;">
                                <a href="{{ route('admin.categories.edit', $category)}}" class="btn btn-primary">изменить
                                    Категорию </a>

                                <a href="{{ route('admin.categories.index', $category)}}" class="btn btn-danger">удалить
                                    Категорию </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="    display: grid; align-content: center;   justify-content: center;">
                        <span>Нет категорий</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection