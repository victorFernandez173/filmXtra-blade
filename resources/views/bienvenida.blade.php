@extends('layouts.principal')

@section('titulo', config('app.name'))

@section('contenido')
    <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-x-8 gap-y-4 m-auto my-8">
        @foreach($obras as $obra)
            @include('components.poster')
        @endforeach
    </div>
@endsection

