@extends('layouts.main')

@section('content')
    @dump($file);
    @dump($translate->text);
@endsection
