@extends('layouts.app')

@section('title', 'Админ | Создать Пост')

@section('menu')
@include('admin.parts.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            {{-- @include('parts.messages') --}}

            <div class="card">
                <div class="card-header">Создать пост</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store') }} ">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Заголовок поста</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" autofocus>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Текст поста</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="text"></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection