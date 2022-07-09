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
                                <input name="name" type="text" class="form-control rounded" placeholder={{ $file->name }}>
                            </div>
                        </fieldset>
                        <input name="id" type="hidden" class="hidden" value={{ $file->id }}>
                        <div class="form-row align-items-end">
                            <div class="col-auto my-1">
                                <label class="mr-sm-2">Encoding type</label>
                                <select name="encoding" class="custom-select mr-sm-2">
                                    <option value="MP3">MP3</option>
                                    <option value="FLAC">FLAC</option>
                                    <option value="LINEAR16" selected="selected">LINEAR16</option>
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

    @dd($message);
    <?php
        $message = $message ?? null;
        $exception = $exception ?? null;
        $message = $message ?? $exception;
        ?>

    @isset($message)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Audio Configuration</h4>

                <p>{{ $message }}</p>
                @endisset

    </div>
        </div>
    </div>


@endsection
