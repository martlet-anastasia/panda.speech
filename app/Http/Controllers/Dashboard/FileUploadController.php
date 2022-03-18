<?php

    namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    function checkFileType(UploadFileRequest $request) {
        $files = $request->file('filenames');
        dump($request->messages());
        foreach ($files as $file) {
            dump($file);

        }
    }

    function storeFiles() {

    }
}
