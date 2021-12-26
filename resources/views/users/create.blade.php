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
	    				{!! Form::model($user, [ 'route' => ['users.update', $user->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'users.store', 'method' => 'post' ]) !!}	
	    			@endif
    			<div class="form-group row">
    				<label for="group" class="col-sm-2 col-form-lebel">Group</label>
    				<div class="col-sm-10">
					{{Form::select('group_id', $groups, null,['class'=>'form-control','placeholder' => 'Select Group', 'id'=> 'group'])}}	
    				</div>	
				</div>

    			<div class="form-group row">
    				<label for="name" class="col-sm-2 col-form-lebel">Name</label>
    				<div class="col-sm-10">
					{{Form::text('name',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Name', 'id'=> 'name'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="email" class="col-sm-2 col-form-lebel">Email</label>
    				<div class="col-sm-10">
					{{Form::text('email',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Email', 'id'=> 'email'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="phone" class="col-sm-2 col-form-lebel">Phone</label>
    				<div class="col-sm-10">
					{{Form::text('phone',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Phone no', 'id'=> 'phone'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="address" class="col-sm-2 col-form-lebel">Address</label>
    				<div class="col-sm-10">
					{{Form::text('address',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Address', 'id'=> 'address'])}}	
    				</div>	
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-lebel"></label>
					<div class="col-sm-10">
						{{Form::submit('SAVE',['class'=>'btn btn-success form-control', 'name'=>'btn'])}}
					</div>
                     
                </div>
			{!! Form::close() !!}
		</div>
		
</div>
</div>

@stop