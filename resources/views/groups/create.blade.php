@extends('layout.main')

@section('mainContent')

<h1 class="h3 mb-2 text-gray-800">User Groups</h1>  
<div class="card-body">
	<a href="">New Groupe</a>
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			<form method="POST" action="{{ url('groups') }}">
				@csrf
		  <div class="form-group">
		    <label >Groupe title</label>
		    <input type="title" name="title" class="form-control" id="title" placeholder="Enter Title">
		    <h1></h1>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
		
</div>
</div>

@stop