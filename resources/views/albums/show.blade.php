@extends('layouts.app')

@section('content')
	<h1>{{ $album->name }}</h1>
	<a href="{{ route('albums.index') }}" class="button secondary">Go Back</a>
	<a href="/photos/create/{{ $album->id }}" class="button">Upload Photo to Album</a>
	<hr>
@endsection
