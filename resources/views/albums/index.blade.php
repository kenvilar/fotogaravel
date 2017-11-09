@extends('layouts.app')

@section('content')
	<h3>Albums</h3>
	@if(count($albums) > 0)
		@foreach($albums as $album)
			{{ $album->name }}
		@endforeach
	@endif
@endsection
