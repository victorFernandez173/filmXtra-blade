@extends('layouts.principal')

@section('titulo', config('app.name'))

@section('contenido')

    <h2>TOP FILMXTRA</h2>
    <p>{{Route::current()->getName()}}</p>

@endsection

