@extends('layouts.main')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger">{{ $error }}</div>
        @endforeach
    @endif

    @dump($_REQUEST)
    <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
        @csrf
        <input id="files" type="file" name="audiofiles[]" multiple>
        <button type="submit">Senddddd!</button>
    </form>

{{--    <script>--}}
{{--        const filesInput = document.getElementById("files");--}}
{{--        filesInput.onchange = function(e) {--}}
{{--            const fileArray = [];--}}
{{--            Array.prototype.forEach.call(e.target.files, function(file) {--}}
{{--                fileArray.push(file.name)--}}
{{--            });--}}
{{--            // const fileJson = JSON.stringify(fileArray);--}}
{{--            document.getElementById("filenames").value = fileArray;--}}
{{--        }--}}
{{--    </script>--}}

@endsection

