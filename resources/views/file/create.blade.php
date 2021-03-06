@extends('layouts.main')

@section('content')

    <?php
    $messages = Session::get('messages') ?? null;
    ?>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
                <strong>Holy guacamole!</strong> {{ $error }}
            </div>
        @endforeach

    @endif

    <div class="col-lg-12 container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Custom file input</h4>
                <div class="basic-form">
                    <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input id="files" type="file" class="custom-file-input" name="audiofiles[]" multiple>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group" id="files_selected">
                            {{-- Placeholder for selected files --}}
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark mr-sm-2 mb-2">Upload</button>
                        </div>
                </div>
                </form>

                @if($messages)
                    @foreach ($messages as $message)
                        @if(array_key_first($message) === "true")
                            <div>
                                <i class="fa fa fa-check-circle text-success"></i>
                                <span class="pl-3 text-dark">{{ head($message) }}</span>
                                <a href="{{ route('file.translate', ['id' => $message["file_id"]]) }}"
                                   data-toggle="tooltip" data-placement="top" title="" data-original-title="Translate">
                                    <i class="fa fa-history text-secondary"></i>
                                </a>
                            </div>
                        @else
                            <div>
                                <i class="fa fa fa-check-circle text-danger"></i>
                                <span class="pl-3 text-dark">{{ head($message) }}</span>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>


    <script>
        function divTemplate(value) {
            let elem = `<div class="form-check mb-3"><label class="form-check-label"><input type="checkbox" checked name="checked_files[]" class="form-check-input" value="${value}">${value}</label></div>`;
            return elem
        };
        const filesInput = document.getElementById("files");
        filesInput.onchange = function (e) {
            const fileArray = [];
            Array.prototype.forEach.call(e.target.files, function (file) {
                console.log(file.name)
                let newElem = divTemplate(file.name);
                document.getElementById('files_selected').insertAdjacentHTML("beforeend", newElem);
            });
        }
    </script>

@endsection

