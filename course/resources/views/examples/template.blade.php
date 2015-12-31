@extends('examples.layout')

@section('title')
    Ejemplo Blade Uno
@stop

@section('content')

    <img src="assets/imgs/logo.jpg" alt="">
    <h1>Curso básico de Laravel 5</h1>
    <p>
        @if (isset($user))
            Bienvenido {{ $user }}
        @else
            [login]
        @endif
    </p>

@stop