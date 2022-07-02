@extends('layouts.main')

@section('content')

    <ul>
        @foreach($files as $file)
            <li>{{ $file->name }}</li>
        @endforeach
    </ul>

@endsection
