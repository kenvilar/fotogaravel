<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        return view('photos.create', [
            'album_id' => $album_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required',
            'description' => 'required',
            'photo' => 'image|max:1999', //You can change the value of max file size if you have dedicated server
        ]);
    
        // get file name with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
    
        // get file name only
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
        // get the file extension
        $extension = $request->file('photo')->getClientOriginalExtension();
    
        // create a file name format
        $newfileformat = $filename . '_' . time() . '.' . $extension;
    
        // upload the file
        // run the command php artisan storage:link to create symbolic link for uploading files
        $filePath = $request->file('photo')->storeAs('public/photos/' . $request->input('album_id'), $newfileformat);
    
        $photo = new Photo();
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $newfileformat;
    
        $photo->save();
    
        return redirect('/albums/' . $request->input('album_id'))->with('success', 'Photo Uploaded successfully!');
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
