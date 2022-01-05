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
	    				{!! Form::model($product, [ 'route' => ['products.update', $product->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!}	
	    			@endif
    			<div class="form-category row">
    				<label for="category" class="col-sm-4 col-form-lebel">Category</label>
    				<div class="col-sm-10">
					{{Form::select('category_id', $categories, null,['class'=>'form-control','placeholder' => 'Select category', 'id'=> 'category'])}}	
    				</div>	
				</div>

    			<div class="form-category row">
    				<label for="title" class="col-sm-4 col-form-lebel">Product Title</label>
    				<div class="col-sm-10">
					{{Form::text('title',$value=null,['class'=>'form-control','placeholder' => 'Enter Your title', 'id'=> 'title'])}}	
    				</div>	
				</div>

				<div class="form-category row">
    				<label for="description" class="col-sm-4 col-form-lebel">Description</label>
    				<div class="col-sm-10">
					{{Form::text('description',$value=null,['class'=>'form-control','placeholder' => 'Enter Your description', 'id'=> 'description'])}}	
    				</div>	
				</div>

				<div class="form-category row">
    				<label for="price" class="col-sm-4 col-form-lebel">Sell-Price</label>
    				<div class="col-sm-10">
					{{Form::text('price',$value=null,['class'=>'form-control','placeholder' => 'Enter Your price no', 'id'=> 'price'])}}	
    				</div>	
				</div>

				<div class="form-category row">
    				<label for="cost_price" class="col-sm-4 col-form-lebel">Cost-Price</label>
    				<div class="col-sm-10">
					{{Form::text('cost_price',$value=null,['class'=>'form-control','placeholder' => 'Enter Your cost_price', 'id'=> 'cost_price'])}}	
    				</div>	
				</div>

				<div class="form-category row">
					<label for="title" class="col-sm-4 col-form-lebel"></label>
					<div class="col-sm-10">
						{{Form::submit('SAVE',['class'=>'btn btn-success form-control', 'title'=>'btn'])}}
					</div>
                     
                </div>
			{!! Form::close() !!}
		</div>
		
</div>
</div>

@stop