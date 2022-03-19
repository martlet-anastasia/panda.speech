@extends('layouts.main')

@section('content')

    <a href="{{ route('files.create') }}">Upload file</a>

    <i class="fa-solid fa-house-heart"></i>

    @dump($_REQUEST)
    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="filenames[]" multiple>
        <button type="submit">Send!</button>
    </form>

    @dump($errors)

@endsection
