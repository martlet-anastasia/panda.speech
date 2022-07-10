@extends('layouts.main')

@section('content')
    
    <div class="col-lg-12 container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Translates</h4>


                <div class="table-responsive mb-0">
                    <table class="table table-hover mb-1">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Translated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        <?php--}}
{{--                        $translateCount = $translates->firstItem();--}}
{{--                        ?>--}}
{{--                        @foreach($translates as $translate)--}}
                            <tr>
                                <th>1</th>
                                <td>{{ $translates->name }}</td>
                                <td>
                                    @if($file->translated)
                                        <a href="{{ route('translate.show', ['id' => $file->id]) }}" class="badge badge-success">Translated</a>
                                    @elseif(is_null($file->translated))
                                        <span class="badge badge-warning">In progress</span>
                                    @else
                                        <span class="badge badge-light">Empty</span>
                                    @endif
                                </td>
                                <td>{{ $file->updated_at }}</td>
                                <td class="color-primary">Mb {{ number_format($file->size / 1048576, 1) }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rename">
                                                <i class="fa fa-pencil m-r-5 mt-1 text-secondary"></i>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('file.translate', ['id' => $file->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Translate">
                                                <i class="fa fa-history text-secondary mt-1"></i>
                                            </a>
                                        </div>

                                        <div class="align-top">
                                            <form action="{{ route('file.destroy', compact('file')) }}" method="POST" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0 shadow-none c-pointer fa fa-close bg-transparent border-0 text-secondary"></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                $fileCount = $fileCount+1;
                                ?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $files->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>











{{--                <div class="basic-form">--}}
{{--                    <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            <div class="input-group-prepend"><span class="input-group-text">Upload</span>--}}
{{--                            </div>--}}
{{--                            <div class="custom-file">--}}
{{--                                <input id="files" type="file" class="custom-file-input" name="audiofiles[]" multiple>--}}
{{--                                <label class="custom-file-label">Choose file</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group" id="files_selected">--}}
{{--                            --}}{{-- Placeholder for selected files --}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <button type="submit" class="btn btn-dark mr-sm-2 mb-2">Upload</button>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--                </form>--}}

{{--                @if($messages)--}}
{{--                    @foreach ($messages as $message)--}}
{{--                        @if(array_key_first($message) === "true")--}}
{{--                            <div>--}}
{{--                                <i class="fa fa fa-check-circle text-success"></i>--}}
{{--                                <span class="pl-3 text-dark">{{ head($message) }}</span>--}}
{{--                                <a href="{{ route('file.translate', ['id' => $message["file_id"]]) }}"--}}
{{--                                   data-toggle="tooltip" data-placement="top" title="" data-original-title="Translate">--}}
{{--                                    <i class="fa fa-history text-secondary"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div>--}}
{{--                                <i class="fa fa fa-check-circle text-danger"></i>--}}
{{--                                <span class="pl-3 text-dark">{{ head($message) }}</span>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>
    </div>
    </div>
@endsection
