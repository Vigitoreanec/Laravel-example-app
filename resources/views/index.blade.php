@extends('layouts.main')
@section('title', 'Главная')

@section('menu')
@include('menu')    
@endsection

@section('content')

<h2>Главная страница</h2>
<form action="/?c=auth&a=login" method="post">
    <div class="row" style="text-align: center;">
        <div class="form-data">
            <label>Логин</label><br />
            <input type="text" name="login">
        </div>
        <div class="form-data" style=" margin-top: 10px;">
            <label>Пароль</label><br />
            <input type="password" name="pass">
        </div>
        <div style="margin: 10px 20px;">
            <input class="btn btn-primary" type="submit" value="Войти" style="
                position: relative;
                width: auto;
                height: 30px;
                text-align: center;"></input>
            <a class="btn btn-primary" href="/?c=auth&a=logout" style=" position: relative;
                            width: auto;
                            height: 40px;
                            text-align: center;">
                Назад
            </a>
        </div>
</form>
@endsection