@extends('layouts.main')

@section('content')


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger">{{ $error }}</div>
        @endforeach
    @endif

    <div class="col-lg-12 container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Files</h4>
            <div class="basic-form">
                <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto my-1">
                        <input id="files" type="file" class="form-control-file d-flex" placeholder="Select files"
                               name="audiofiles[]" multiple>
                    </div>
                        <div class="flex">
                            <button type="submit" class="btn btn-dark mr-sm-2 mb-2">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <script>
        const filesInput = document.getElementById("files");
        filesInput.onchange = function (e) {
            const fileArray = [];
            Array.prototype.forEach.call(e.target.files, function (file) {
                fileArray.push(file.name)
            });
            // const fileJson = JSON.stringify(fileArray);
            document.getElementById("filenames").value = fileArray;
        }
    </script>

@endsection

