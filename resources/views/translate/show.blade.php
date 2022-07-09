@extends('layouts.main')

@section('content')
    <h4>{{ $data->filename }}</h4>
    <div class="col-lg-12 my-1">
        <div class="card">
            <div class="card-body">
                <div class="m-2">
                        <div class="d-flex justify-content-between mx-1 mb-0">
                            <div>
                                <p>Transtaled at {{ $data->translated_at }}</p>
                            </div>
                            <div>
                                <a href="{{ route('file.translate', ['id' => $data->fileid]) }}"
                                   data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="Download translate">
                                    <i class="fa fa-lg fa-save text-dark"></i>
                                </a>
                            </div>
                        </div>

                        <blockquote>{{ $data->text }}</blockquote>
                </div>

            </div>
        </div>
    </div>
@endsection
