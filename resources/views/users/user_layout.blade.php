@extends('layout.main')

@section('mainContent')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<a class="btn btn-info" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
		</div>	
		<div class="col-md-8 text-right">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale"><i class="fa fa-plus"></i>
 			 New Sale
			</button>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase"><i class="fa fa-plus"></i>
 			 New Purchase
			</button>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment"><i class="fa fa-plus"></i>
 			 New Payment
			</button>

			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newrRecive"><i class="fa fa-plus"></i>
 			 New Receipt
			</button>
		</div>
	</div>

	<div class="row clearfix mt-5">
		
		<div class="col-md-2">
			<div class="nav flex-column nav-pills">
			  <a class="nav-link @if($tab_menu == 'user_info') active @endif " href=" {{ route('users.show', $user->id) }} ">User Info</a>
			  <a class="nav-link @if($tab_menu == 'sales') active @endif "  href="{{ route('user.sales', $user->id) }}">Sales</a>
			  <a class="nav-link @if($tab_menu == 'purchases') active @endif "  href="{{ route('user.purchases', $user->id) }}">Purchases</a>
			  <a class="nav-link @if($tab_menu == 'payments') active @endif "  href="{{ route('user.payments', $user->id) }}">Payments</a>
			  <a class="nav-link @if($tab_menu == 'receipts') active @endif "  href="{{ route('user.recives', $user->id) }}">Receipts</a>
			</div>
		</div>

		<div class="col-md-10">

			@yield('user_content')
	  		
	  	</div>

	  	<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
    			{!! Form::open([ 'route' => ['user.payment.store', $user->id], 'method' => 'post' ]) !!}
    			

				<div class="form-group row">
    				<label for="date" class="col-sm-2 col-form-lebel">Date</label>
    				<div class="col-sm-10">
					{{Form::date('date',$value=null,['class'=>'form-control', 'id'=> 'date', 'placeholder' => 'Date'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="phone" class="col-sm-2 col-form-lebel">Amount</label>
    				<div class="col-sm-10">
					{{Form::text('amount',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Payment amount', 'id'=> 'amount'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="note" class="col-sm-2 col-form-lebel">Note</label>
    				<div class="col-sm-10">
					{{Form::textarea('note',$value=null,['class'=>'form-control','rows'=>'3', 'placeholder' => 'Enter Your Note', 'id'=> 'note'])}}	
    				</div>	
				</div>
				<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        {{Form::submit('SAVE',['class'=>'btn btn-primary', 'name'=>'btn'])}}
	      </div>

			{!! Form::close() !!}
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="newrRecive" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">New Receipt</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
    			{!! Form::open([ 'route' => ['user.recive.store', $user->id], 'method' => 'post' ]) !!}
    			

				<div class="form-group row">
    				<label for="date" class="col-sm-2 col-form-lebel">Date</label>
    				<div class="col-sm-10">
					{{Form::date('date',$value=null,['class'=>'form-control', 'id'=> 'date', 'placeholder' => 'Date'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="phone" class="col-sm-2 col-form-lebel">Amount</label>
    				<div class="col-sm-10">
					{{Form::text('amount',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Receipts amount', 'id'=> 'amount'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="note" class="col-sm-2 col-form-lebel">Note</label>
    				<div class="col-sm-10">
					{{Form::textarea('note',$value=null,['class'=>'form-control','rows'=>'3', 'placeholder' => 'Enter Your Note', 'id'=> 'note'])}}	
    				</div>	
				</div>
				<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        {{Form::submit('SAVE',['class'=>'btn btn-primary', 'name'=>'btn'])}}
	      </div>

			{!! Form::close() !!}
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">New Sale Invoice</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
    			{!! Form::open([ 'route' => ['user.sales.store', $user->id], 'method' => 'post' ]) !!}
    			

				<div class="form-group row">
    				<label for="date" class="col-sm-2 col-form-lebel">Date</label>
    				<div class="col-sm-10">
					{{Form::date('date',$value=null,['class'=>'form-control', 'id'=> 'date', 'placeholder' => 'Date'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="challan_no" class="col-sm-2 col-form-lebel">Challan Number</label>
    				<div class="col-sm-10">
					{{Form::text('challan_no',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Challan Number', 'id'=> 'challan_no'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="note" class="col-sm-2 col-form-lebel">Note</label>
    				<div class="col-sm-10">
					{{Form::textarea('note',$value=null,['class'=>'form-control','rows'=>'3', 'placeholder' => 'Enter Your Note', 'id'=> 'note'])}}	
    				</div>	
				</div>
				<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        {{Form::submit('SAVE',['class'=>'btn btn-primary', 'name'=>'btn'])}}
	      </div>

			{!! Form::close() !!}
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newPurchaseModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">New Purchase Invoice</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
    			{!! Form::open([ 'route' => ['user.purchases.store', $user->id], 'method' => 'post' ]) !!}
    			

				<div class="form-group row">
    				<label for="date" class="col-sm-2 col-form-lebel">Date</label>
    				<div class="col-sm-10">
					{{Form::date('date',$value=null,['class'=>'form-control', 'id'=> 'date', 'placeholder' => 'Date'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="challan_no" class="col-sm-2 col-form-lebel">Challan Number</label>
    				<div class="col-sm-10">
					{{Form::text('challan_no',$value=null,['class'=>'form-control','placeholder' => 'Enter Your Challan Number', 'id'=> 'challan_no'])}}	
    				</div>	
				</div>

				<div class="form-group row">
    				<label for="note" class="col-sm-2 col-form-lebel">Note</label>
    				<div class="col-sm-10">
					{{Form::textarea('note',$value=null,['class'=>'form-control','rows'=>'3', 'placeholder' => 'Enter Your Note', 'id'=> 'note'])}}	
    				</div>	
				</div>
				<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        {{Form::submit('SAVE',['class'=>'btn btn-primary', 'name'=>'btn'])}}
	      </div>

			{!! Form::close() !!}
	      </div>
	    </div>
	  </div>
	</div>

@stop