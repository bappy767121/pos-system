@extends('users.user_layout')

@section('user_content')

	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Recives of <strong>{{ $user->name }} </strong></h6>
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
		            <tr>
		              <th>Admin</th>
		              <th>Date</th>
		              <th class="text-right">Total:{{ $user->recives()->sum('amount') }}TK </th>
		              <th>Note</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </tfoot>
		          <tbody>
		          	@foreach ($user->recives as $recive)
			            <tr>
			              <td> {{ optional($recive->admin)->name }} </td>
			              <td> {{ $recive->date }} </td>
			              <td class="text-right"> {{ $recive->amount }}TK </td>
			              <td> {{ $recive->note }} </td>
			              <td class="text-right">
			              	<form method="POST" action=" {{ route('user.recive.destroy', ['id' => $user->id, 'recive_id'=> $recive->id]) }} ">
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