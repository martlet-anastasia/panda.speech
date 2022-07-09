@extends('layouts.main')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Audio Configuration</h4>
                <div class="basic-form">

                    <form method="POST" action="{{ route('transcription') }}">
                        @csrf
                        <fieldset disabled="disabled">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control rounded"
                                       placeholder={{ $file->name }}>
                            </div>
                        </fieldset>
                        <input name="id" type="hidden" class="hidden" value={{ $file->id }}>
                        <div class="form-row align-items-end">
                            <div class="col-auto my-1">
                                <label class="mr-sm-2">Encoding type</label>
                                <select name="encoding" class="custom-select mr-sm-2">
                                    <option value="FLAC">FLAC</option>
                                    <option value="LINEAR16" selected="selected">LINEAR16</option>
                                    <option value="ENCODING_UNSPECIFIED">Unspecified</option>
                                </select>
                            </div>

                            <div class="col-auto my-1">
                                <label class="mr-sm-2">Spoken language</label>
                                <select name="languageCode" class="h-50 custom-select mr-sm-2">
                                    <option value="ru-RU">ru-RU</option>
                                    <option value="en-US" selected="selected">en-US</option>
                                </select>
                            </div>

                            <div class="col my-1">
                                <label class="mr-sm-2">Sample rate (Hertz)</label>
                                <input name="sampleRateHertz" type="number"
                                       class="form-control rounded h-25" value="32000"
                                       min="1000" max="100000">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark mr-sm-2 mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    $message = Session::get('message') ?? null;
    $status = Session::get('status') ?? null;
    $score = Session::get('average_score') ?? null;
    $error = Session::get('error') ?? null;
    $file_id = Session::get('file_id') ?? null;
    ?>
    @if($status)
        <div class="col-lg-12 my-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="d-inline">Status:</h4>
                    <h4 class="d-inline {{ $status === 'success' ?  'text-success' : 'text-danger'}}">{{ $status }}</h4>

                    <div class="m-2">
                        @if($status === 'success')
                            <div class="d-flex justify-content-between mx-1 mb-0">
                                <div>
                                    <p>Average score = {{ $score }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('download.translate', ['file_id' => $file_id]) }}"
                                       data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Download translate">
                                        <i class="fa fa-lg fa-save text-dark"></i>
                                    </a>
                                </div>
                            </div>

                            <blockquote>{{ $message }}</blockquote>
                        @else
                            <p class="mb-0">Error = {{ $error }}</p>
                            <p>{{ $message }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
