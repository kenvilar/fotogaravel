@extends('layouts.app')

@section('content')
	<h3>Upload Photo</h3>
	{!! Form::open(['action' => ['PhotosController@store'], 'method' => 'POST', 'files' => true]) !!}
	{{ Form::text('title', '', ['placeholder' => 'Photo Title']) }}
	{{ Form::textarea('description', '', ['placeholder' => 'Photo Description']) }}
	{{ Form::file('photo') }}
	{{ Form::hidden('album_id', $album_id) }}
	{{ Form::submit('Upload Now') }}
	{!! Form::close() !!}
@endsection
