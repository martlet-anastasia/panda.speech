@extends('layouts.main')

@section('content')


    <h1>This is home page</h1>

    <a href="{{ route('file.create') }}">Upload file</a>

    <i class="fa-solid fa-house-heart"></i>

@endsection
