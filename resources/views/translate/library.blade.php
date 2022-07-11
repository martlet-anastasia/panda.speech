@extends('layouts.main')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Translates library</h4>
                <p class="text-muted"><code></code>
                </p>
                <div id="accordion-three" class="accordion">
                    @foreach($translatesArray as $translate)

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse"
                                    data-target="#collapseOne{{ $translate['file_id'] }}" aria-expanded="false"
                                    aria-controls="collapseOne{{ $translate['file_id'] }}">
                                    <i class="fa" aria-hidden="true"></i>{{ $translate['name'] }}
                                </h5>
                            </div>
                            <div id="collapseOne{{ $translate['file_id'] }}" class="collapse"
                                 data-parent="#accordion-three" style="">
                                <div class="card-body">
                                    {{ $translate['translate_text']}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
