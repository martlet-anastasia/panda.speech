@extends('layouts.main')

@section('content')

    <?php
    $message = \Illuminate\Support\Facades\Session::get('message') ?? null;
    ?>

    @isset($message)
        @if(str_contains($message, 'exists'))
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
                <strong>Holy guacamole!</strong> {{ $message }}
            </div>
        @else
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
                <strong>What a wonderful day!</strong> {{ $message }}
            </div>
        @endif
    @endisset

    <div class="col-lg-12 container-fluid">
        <div class="card">
            <div class="card-body pb-2">
                <div class="card-title d-flex justify-content-between align-content-center">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 text-center">Table of audios</h4>
                    </div>
                    <div>
                        <a href="{{ route('file.create') }}"
                           class="btn text-dark btn-rounded btn-success d-inline-flex">
                            <span class="btn-icon-left"><i class="fa fa-upload color-success"></i></span>
                            Upload
                        </a>
                    </div>
                </div>
                <div class="table-responsive mb-0">
                    <table class="table table-hover mb-1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $fileCount = $files->firstItem();
                        ?>
                        @foreach($files as $file)
                            <tr name="changeDiv">
                                <th>{{ $fileCount }}</th>
                                <form action="{{ route('file.update', compact('file')) }}" method="POST"
                                      data-toggle="tooltip" data-placement="top" title=""
                                      data-original-title="Rename">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="newName" placeholder="{{ $file->name }}"
                                        class="border-0 bg-transparent"></inpit>
                                        <button type="submit"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Save"
                                                class="d-none btn p-0 ml-1 shadow-none c-pointer fa fa-check bg-transparent border-0 text-secondary"></button>
                                    </td>
                                </form>
                                <td>
                                    @if($file->translated)
                                        <a href="{{ route('translate.show', ['id' => $file->id]) }}"
                                           class="badge badge-success">Translated</a>
                                    @elseif(is_null($file->translated))
                                        <span class="badge badge-warning">In progress</span>
                                    @else
                                        <span class="badge badge-light">Empty</span>
                                    @endif
                                </td>
                                <td>{{ $file->updated_at }}</td>
                                <td class="color-primary">Mb {{ number_format($file->size / 1048576, 1) }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <div class="ml-2">
                                            <a href="{{ route('file.translate', ['id' => $file->id]) }}"
                                               data-toggle="tooltip" data-placement="top" title=""
                                               data-original-title="Translate">
                                                <i class="fa fa-history text-secondary mt-1"></i>
                                            </a>
                                        </div>

                                        <div class="align-top ml-2">
                                            <form action="{{ route('file.destroy', compact('file')) }}" method="POST"
                                                  data-toggle="tooltip" data-placement="top" title=""
                                                  data-original-title="Delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn p-0 shadow-none c-pointer fa fa-close bg-transparent border-0 text-secondary"></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                $fileCount = $fileCount + 1;
                                ?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $files->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>

    <script>
        document.getElementsByName('newName').forEach(item => {
            item.addEventListener('click', event => {
                event.target.classList.remove("bg-transparent")
                event.target.nextElementSibling.classList.toggle('d-none');
            })
        })
    </script>

@endsection
