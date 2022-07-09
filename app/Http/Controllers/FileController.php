<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $f = DB::table('files')
            ->where('translated', 1)
            ->select(['id', 'user_id'])->get();

        $files = User::findOrFail(Auth::id())->files;
        return view('file.index', [
            'files' => $files
        ]);
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
        $existFileNames = $this->getAllUserFileNames();

        $errors = [];
        foreach ($request->audiofiles as $file) {
            $originalFileName = $file->getClientOriginalName();
            if(in_array($file->getClientOriginalName(), $existFileNames)) {
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

//    TO DO chage show method to EDIT
// Show will go from trangate cotlorrer!!!
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $translate = File::findOrFail($file->id)->translate;
        return view('file.show', [
            'file' => $file,
            'translate' => $translate
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFileRequest $request, File $file)
    {
        $newName = $request->newName;
        $existFileNames = $this->getAllUserFileNames();
        if (in_array($newName, $existFileNames)) {
            $message = 'Name ' . $newName . ' already exists';
        } else {
            $file->fill([
                'name' => $newName,
            ]);
            $file->save();
            $message = 'File successfully renamed';
        }

        return redirect()->route('file.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->translate()->delete();
        $file->delete();
        return back();
    }


    protected function getAllUserFileNames() {
        $files = User::findOrFail(Auth::id())->files;
        $fileNames = [];
        foreach($files as $file) {
            $fileNames[] = $file->name;
        }
        return $fileNames;
    }

}
