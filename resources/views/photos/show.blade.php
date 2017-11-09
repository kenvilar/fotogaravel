@extends('layouts.app')

@section('content')
	<a href="/albums/{{ $photo->album_id }}">Back to Gallery</a>
	<h3>{{ $photo->title }}</h3>
	<p>{{ $photo->description }}</p>
	<hr>
	<div class="float-center text-center">
		<img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
	</div>
	<br><br>
	{!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'DELETE']) !!}
	{{ Form::submit('Delete Photo', ['class' => 'button alert',]) }}
	{!! Form::close() !!}
	<hr>
	<small>Size: {{ $photo->size }}</small>
@endsection
