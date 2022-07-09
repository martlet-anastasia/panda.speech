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
        <h4 class="card-title">Input File</h4>
        <div class="basic-form">
            <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="files" class="btn">Select Files</label>
                <input id="files" type="file" class="form-control-file" placeholder="Select files" name="audiofiles[]" multiple>
                <button type="submit">Upload!</button>
            </form>

        </div>
    </div>
        </div>
    </div>



    <div class="col-lg-12 container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-title flex justify-content-end"><a href="{{ route('file.create') }}" class="btn mb-1 btn-rounded btn-success">
                        <span class="btn-icon-left"><i class="fa fa-upload color-success"></i></span>
                        Upload
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Size</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $fileCount = 1;
                        ?>
{{--                        @foreach($files as $file)--}}
{{--                            <tr>--}}
{{--                                <th>{{ $fileCount }}</th>--}}
{{--                                <td>{{ $file->name }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($file->translated)--}}
{{--                                        <a href="{{ route('translate.show') }}" class="badge badge-success">Translated</a>--}}
{{--                                    @elseif(is_null($file->translated))--}}
{{--                                        <span class="badge badge-warning">In progress</span>--}}
{{--                                    @else--}}
{{--                                        <span class="badge badge-light">Empty</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>{{ $file->updated_at }}</td>--}}
{{--                                <td class="color-primary">Mb {{ number_format($file->size / 1048576, 1) }}</td>--}}
{{--                                <td>--}}

{{--                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rename">--}}
{{--                                        <i class="fa fa-pencil color-muted m-r-5"></i>--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('translate.create') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Translate">--}}
{{--                                        <i class="fa fa-close color-danger"></i>--}}
{{--                                    </a>--}}

{{--                                    <form action="{{ route('file.destroy', compact('file')) }}" method="POST" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="fa fa-close color-danger"></button>--}}
{{--                                    </form>--}}

{{--                                </td>--}}
{{--                                <?php--}}
{{--                                $fileCount = $fileCount+1;--}}
{{--                                ?>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>


    <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
        @csrf
        <input id="files" type="file" name="audiofiles[]" multiple>
        <button type="submit">Senddddd!</button>
    </form>

    <script>
        const filesInput = document.getElementById("files");
        filesInput.onchange = function(e) {
            const fileArray = [];
            Array.prototype.forEach.call(e.target.files, function(file) {
                fileArray.push(file.name)
            });
            // const fileJson = JSON.stringify(fileArray);
            document.getElementById("filenames").value = fileArray;
        }
    </script>

@endsection

