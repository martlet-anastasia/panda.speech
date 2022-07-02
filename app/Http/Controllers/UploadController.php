<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showForm() {
        return view('upload.showForm');
    }

    public function postForm(Request $request) {
        return dd($request->input('name', hghgh));
    }
}
