<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadTranslate(Request $request, $id) {

        $file = File::findOrFail($id);
        $translate = $file->translate;
        $name = pathinfo($file->name, PATHINFO_FILENAME);
        $name = $name . '-text.txt';
        return Storage::download($translate->path, $name);
    }

//    public function downloadAudio(Request $request, $id) {
//
//        $file = File::findOrFail($id);
//        $translate = $file->translate;
//
//        return Storage::download($translate->path, $file->name);
//    }
}
