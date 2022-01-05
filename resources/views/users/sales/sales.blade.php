@extends('users.user_layout')

@section('user_content')

	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Sales of <strong>{{ $user->name }} </strong></h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th>Challen No</th>
		              <th>Name</th>
		              <th>Date</th>
		              <th>Quantity</th>
		              <th>Total</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </thead>
		          <tfoot>
		            <tr>
		              <th>Challen No</th>
		              <th>Name</th>
		              <th>Date</th>
		              <th>Quantity</th>
		              <th>Total</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </tfoot>
		          <tbody>
		          	@foreach ($user->sales as $sale)
			            <tr>
			              <td> {{ $sale->challan_no }} </td>
			              <td> {{ $user->name}} </td>
			              <td> {{ $sale->date }} </td>
			              <td> {{ $sale->items->sum('quantity') }} </td>
			              <td> {{ $sale->items->sum('total') }} </td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.sales.destroy', ['id' => $user->id, 'invoice_id' => $sale->id ]) }} ">
			              		<a class="btn btn-primary btn-sm" href="{{ route('user.sales.invoice_details', ['id' => $user->id, 'invoice_id'=>$sale->id]) }}"> 
				              	 	<i class="fa fa-eye"></i> 
				              	</a>
			              		@csrf
			              		@method('DELETE')
			              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
			              			<i class="fa fa-trash"></i>  
			              		</button>	
			              	</form>
			              </td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
	    </div>

  	</div>
  	

@stop