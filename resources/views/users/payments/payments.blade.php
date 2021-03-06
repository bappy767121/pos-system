@extends('users.user_layout')

@section('user_content')

	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Payments of <strong>{{ $user->name }} </strong></h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th>Admin</th>
		              <th>Date</th>
		              <th>Total</th>
		              <th>Note</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </thead>
		          <tfoot>
		              <th>Admin</th>
		              <th>Date</th>
		              <th class="text-right">Total:{{ $user->payments()->sum('amount') }}TK </th>
		              <th>Note</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </tfoot>
		          <tbody>
		          	@foreach ($user->payments as $payment)
			            <tr>
			              <td> {{ optional($payment->admin)->name }} </td>
			              <td> {{ $payment->date }} </td>
			              <td class="text-right"> {{ $payment->amount }}TK </td>
			              <td> {{ $payment->note }} </td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.payment.destroy', ['id' => $user->id, 'payment_id'=> $payment->id]) }} ">
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
  	
  	<!-- Button trigger modal -->

	<!-- Modal -->
	

@stop