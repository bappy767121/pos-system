@extends('users.user_layout')

@section('user_content')

	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Invoice Details</h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-6">
	    			<div><strong>Customer:</strong>{{ $user->name }}</div>
	    			<div><strong>Email:</strong>{{ $user->email }}</div>
	    			<div><strong>Phone:</strong>{{ $user->phone }}</div>
	    		</div>
	    		<div class="col-md-6">
	    			<div class="text-right"><strong>Date:</strong>{{ $invoice->date }}</div>
	    			<div class="text-right"><strong>Challan No:</strong>{{ $invoice->challan_no }}</div>
	    		</div>
	    	</div>
	    </div>
	    <h6></h6>
	    <h6></h6>
	    <br>
	    <table class="table">
	    	<div>
	    		<button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#newProduct">
	    				<i class="fa fa-plus "></i> Add Product 
	    			</button>
	    			<button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#newInvoiceReceipt">
	    				<i class="fa fa-plus "></i> Add Payment
	    			</button>
	    	</div>
	    	<thead>
	    		<style type="text/css">
					body
					{
					    counter-reset: Serial;          
					}

					table
					{
					    border-collapse: separate;
					}

					tr td:first-child:before
					{
					  counter-increment: Serial;      
					  content: counter(Serial); 
					}
				</style>

	    		<th>SL</th>
	    		<th>Product</th>
	    		<th>Price</th>
	    		<th>Quantity</th>
	    		<th>Total</th>
	    		<th>Action</th>
	    	</thead>
	    	<tfoot>
	    		<th>
	    			
	    		</th>
	    	</tfoot>
	    	<tbody>
	    		@foreach($invoice->items as $item)
	    		<tr>
	    			<td></td>
		    		<td>{{ $item->product->title }}</td>
		    		<td>{{ $item->price }}</td>
		    		<td>{{ $item->quantity }}</td>
		    		<td>{{ $item->total }}</td>
		    		<td class="text-right">
		    			<form method="POST" action=" {{ route('user.purchases.invoices.delete_item', ['id' => $user->id, 'invoice_id' => $invoice->id, 'item_id'=> $item->id]) }} ">
			              		@csrf
			              		@method('DELETE')
			              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			              			<i class="fa fa-trash"></i>  
			              		</button></td>
			              	</form>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    	<tbody>
	    		<tr>
	    			<th colspan="4" class="text-right"><strong>Total:</strong></th>
	    		<th>{{ $totalPayable=$invoice->items()->sum('total') }}</th>
	    		</tr>
	    		<tr>
	    			<th colspan="4" class="text-right"><strong>Payment:</strong></th>
	    			<th>{{ $totalPaid=$invoice->payments()->sum('amount') }}</th>
	    		</tr>
	    		<tr>
	    			<th colspan="4" class="text-right"><strong>Due:</strong></th>
	    			<th>{{ $totalPayable-$totalPaid }}</th>
	    		</tr>
	    	</tbody>
	    </table>

	    <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">New Purchase Item</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
	    			{!! Form::open([ 'route' => ['user.purchases.invoices.add_item', ['id' => $user->id, 'invoice_id' => $invoice->id] ], 'method' => 'post' ]) !!}
	    			<div class="form-group row">
	    				<label for="product" class="col-sm-2 col-form-lebel">Producr</label>
	    				<div class="col-sm-10">
						{{Form::select('product_id', $products, null,['class'=>'form-control','placeholder' => 'Select Product', 'id'=> 'product'])}}	
	    				</div>	
					</div>

					<div class="form-group row">
	    				<label for="quantity" class="col-sm-2 col-form-lebel">Quantity</label>
	    				<div class="col-sm-10">
						{{Form::text('quantity',$value=null,['class'=>'form-control', 'id'=> 'quantity', 'placeholder' => 'Quantity'])}}	
	    				</div>	
					</div>

					<div class="form-group row">
	    				<label for="price" class="col-sm-2 col-form-lebel">Unit Price</label>
	    				<div class="col-sm-10">
						{{Form::text('price',$value=null,['class'=>'form-control', 'id'=> 'price', 'placeholder' => 'Unit Price'])}}	
	    				</div>	
					</div>

					<div class="form-group row">
	    				<label for="total" class="col-sm-2 col-form-lebel">Total</label>
	    				<div class="col-sm-10">
						{{Form::text('total',$value=null,['class'=>'form-control','placeholder' => 'Enter Total Price', 'id'=> 'challan_no'])}}	
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

	<div class="modal fade" id="newInvoiceReceipt" tabindex="-1" role="dialog" aria-labelledby="newInvoiceReceiptModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
    			{!! Form::open([ 'route' => ['user.payment.store', ['id' => $user->id, 'invoice_id' => $invoice->id]], 'method' => 'post' ]) !!}
    			

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

	</div>

@stop