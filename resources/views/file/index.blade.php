@extends('layouts.main')

@section('content')


    <div class="col-lg-12 container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-content-center">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 text-center">Table of audios</h4>
                    </div>
                    <div>
                        <a href="{{ route('file.create') }}" class="btn text-dark btn-rounded btn-success d-inline-flex">
                            <span class="btn-icon-left"><i class="fa fa-upload color-success"></i></span>
                            Upload
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
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
                        $fileCount = 1;
                        ?>
                        @foreach($files as $file)
                            <tr>
                                <th>{{ $fileCount }}</th>
                                <td>{{ $file->name }}</td>
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
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>


@endsection
