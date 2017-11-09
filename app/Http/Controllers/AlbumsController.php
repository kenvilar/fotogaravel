<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('Photos')->get();
    
        return view('albums.index', [
            'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            'name'        => 'required',
            'description' => 'required',
            'cover_image' => 'image|max:1999', //you change the value of max file size if you have dedicated server
        ]);
        
        // get file name with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        
        // get file name only
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        // get the file extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        
        // create a file name format
        $newfileformat = $filename . '_' . time() . '.' . $extension;
        
        // upload the file
        // run the command php artisan storage:link to create symbolic link for uploading files
        $filePath = $request->file('cover_image')->storePubliclyAs('public/album_covers', $newfileformat);
        
        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $newfileformat;
        
        $album->save();
        
        return redirect('/albums')->with('success', 'Album created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        
        return view('albums.show', [
            'album' => $album,
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
