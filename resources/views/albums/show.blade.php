@extends('layouts.app')

@section('content')
	<h1>{{ $album->name }}</h1>
	<a href="" class="button secondary">Go Back</a>
	<a href="/photos/create" class="button">Upload Photo to Album</a>
	<hr>
@endsection
