@extends('layout.main')

@section('mainContent')

<h1 class="h3 mb-2 text-gray-800">Edit User</h1>  
<div class="card-body">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			{!! Form::open(['url' => 'foo/bar']) !!}
    			 Form::open(['route' => 'route.name'])
			{!! Form::close() !!}
		</div>
		
</div>
</div>

@stop