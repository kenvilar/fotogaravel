@if(count($errors) > 0)
	<div class="callout alert">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session('success'))
	<div class="callout success">
		{{ session('success') }}
	</div>
@endif

@if(session('error'))
	<div class="callout alert">
		{{ session('error') }}
	</div>
@endif
