@extends('layouts.main')
@section('title', 'Пост')

@section('menu')
@include('menu')    
@endsection

@section('content')

<h1>Пост</h1>
<!-- 
<?php if ($post): ?> -->
<div style=" text-align: center; background: blue; height: auto; width: 350px; margin: 20px auto">
    <h3>Пост {{$post['title'] }}</h3>
    <span>ТЕКСТ {{ $post['text'] }}</span>
</div>

<!-- <?php else: ?>
    НЕт такого Поста
<?php endif; ?> -->

@endsection