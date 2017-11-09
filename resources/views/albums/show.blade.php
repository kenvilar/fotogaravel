@extends('layouts.app')

@section('content')
	<h1>{{ $album->name }}</h1>
	<a href="{{ route('albums.index') }}" class="button secondary">Go Back</a>
	<a href="/photos/create/{{ $album->id }}" class="button">Upload Photo to Album</a>
	<hr>
	@if(count($album->photos) > 0)
        <?php
        $photoCount = count($album->photos);
        $i = 1;
        ?>
		<div id="photos">
			<div class="row text-center">
				@foreach($album->photos as $photo)
					@if($i == $photoCount)
						<div class="medium-4 columns end">
							<a href="/photos/{{ $photo->id }}">
								<img class="thumbnail" src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}"
								     alt="{{ $photo->title }}">
							</a>
							<br>
							<h4>{{ $photo->title }}</h4>
					@else
						<div class="medium-4 columns">
							<a href="/photos/{{ $photo->id }}">
								<img class="thumbnail" src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}"
								     alt="{{ $photo->title }}">
							</a>
							<br>
							<h4>{{ $photo->title }}</h4>
					@endif

					@if($i % 3 == 0)
						</div></div><div class="row text-center">
					@else
						</div>
					@endif

                    <?php $i++; ?>
				@endforeach
			</div>
		</div>
	@else
		<p>No photos found.</p>
	@endif
@endsection
