@extends('layouts.main')

@section('content')

    @dump($_REQUEST)
    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="filenames[]" multiple>
        <button type="submit">Send!</button>
    </form>

@endsection
