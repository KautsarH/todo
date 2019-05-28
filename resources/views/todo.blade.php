@extends('layout2')

@section('title','To do list')


@section('content')
    <h1> TO DO LIST</h1>

        @foreach($tasks as $task)
        <input type="checkbox"> {{ $task }} <br>
        @endforeach
@endsection
