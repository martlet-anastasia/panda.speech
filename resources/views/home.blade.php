@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-grid gradient-9-text"></i></span>
                            <h2 class="mt-3">{{ $total_files }} Total Files</h2>
                            <p>Currently uploaded</p>
                            <a href="{{ route('file.index') }}" class="btn gradient-9 btn-lg border-0 btn-rounded px-5">Show
                                all</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-earphones gradient-3-text"></i></span>
                            <h2 class="mt-3">{{ $translates_count }} Translates</h2>
                            <p>Successfully processed</p>
                            <a href="javascript:void()"
                               class="btn gradient-3 btn-lg border-0 btn-rounded px-5">Download now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-self-stretch">
            <div class="col-3">
                <div class="card">
                    <div class="card-body pb-0 pt-2">
                        <div class="text-center mb-lg-4">
                            <img alt="" class="rounded-circle img-circle mt-2 img-thumbnail"
                                 src="{{ Storage::url($avatar) }}">
                            <h4 class="card-widget__title text-dark mt-3">{{ $user_name }}</h4>
                            <p class="text-muted">{{ $email }}</p>
                            <a class="btn gradient-4 btn-lg border-0 btn-rounded px-5" href="{{ route('profile') }}">Profile</a>
                            <a class="btn gradient-7 btn-lg border-0 btn-rounded px-5 mt-2"
                               href="{{ route('tariff') }}">Tariff</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="card card-widget">
                    <div class="card-body pb-0">
                        <h5 class="text-muted">Latest translates</h5>
                        <table class="table table-hover mt-3">
                            <tbody>
                            @foreach($latest_translates as $translate)
                                <tr>
                                    <td>
                                        <h6>{{ $translate->name }}</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $translate->updated_at }}</h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <a href="{{ route('translate.show', ['id' => $translate->id ]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show translate">
                                                <i class="fa fa-eye text-secondary mt-1"></i>
                                            </a>
                                        </h6>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
