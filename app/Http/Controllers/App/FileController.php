<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFileRequest;
use App\Models\File;
use GuzzleHttp\Promise\Create;
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
        $files = File::paginate(20);
        return view('app.files.index', [
            'files' => $files,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFileRequest $request)
    {

        // upload file to the database and return to the all files and return to home
        // also pass message that xxx files were uplaoded
        $files = $request->file('audiofiles');
        foreach ($files as $file) {
            dump($file->getClientMimeType());
        }
        $data = $request->all();
        dump($data);
        dump($request->file('audiofiles'));
        $file = $request->file('audiofiles');
        dump($file);
        //Dump($request->file('img'));
//        if(!is_null($request->file('img'))) {
//            $path = $request->file('img')->store('public/products/img');
//            $path = str_replace('public/', '', $path);
//        } else {
//            $path = 'https://thumbs.dreamstime.com/b/not-found-icon-design-line-style-perfect-application-web-logo-presentation-template-not-found-icon-design-line-style-169941512.jpg';
//        }
//        $data['img'] = $path;
//        Product::create($data);
//        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
