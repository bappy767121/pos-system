@extends('layout.main')

@section('mainContent')
@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
<h1 class="h3 mb-2 text-gray-800">{{ $headline }}</h1>  
<div class="card-body">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
    		@if($mode == 'edit')
	    				{!! Form::model($category, [ 'route' => ['categories.update', $category->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'categories.store', 'method' => 'post' ]) !!}	
	    			@endif

    			<div class="form-group">
    				
    				<div class="col-sm-10">
    					<label>Enter Title</label>
					{{Form::text('title',$value=null,['class'=>'form-control','placeholder' => 'Enter Your title', 'id'=> 'title'])}}	
    				</div>
    				<h1></h1>
    				<div class="col-sm-10">
						{{Form::submit('SAVE',['class'=>'btn btn-primary', 'title'=>'btn'])}}
					</div>	
				</div>

				
			{!! Form::close() !!}
		</div>
		
</div>
</div>

@stop