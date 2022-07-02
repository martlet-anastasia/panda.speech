<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFileRequest $request)
    {
        $userId = auth()->id();
        $existFiles = User::findOrFail($userId)->files;
        $existFilesName = [];
        foreach($existFiles as $existFile) {
            $existFilesName[] = $existFile->name;
        }

        $errors = [];
        foreach ($request->audiofiles as $file) {
            $originalFileName = $file->getClientOriginalName();
            if(in_array($file->getClientOriginalName(), $existFilesName)) {
                $errors[] = 'File ' . $originalFileName . ' already exists';
            } else {
                $data = [
                    'user_id' => $userId,
                    'name' => $originalFileName,
                    'path' => $file->store('public/' . $userId . '/files'),
                    'size' => $file->getSize(),
                ];
                File::create($data);
            }
        }
        return back()->withErrors($errors);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $translate = $file->translate;
        return view('file.show', [
            'file' => $file,
            'translate' => $translate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
