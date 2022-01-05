@extends('layout.main')

@section('mainContent')

<!-- Begin Page Content -->
    <div class="container-fluid">
            <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container-fluid">
               
                    <!-- Page Heading -->
                <div class="row clearfix">
                    <div class="col-md-6">
                      <h1 class="h3 mb-2 text-gray-800">Users</h1>  
                    </div>
                    <div class="col-md-6 text-right">
                      <a class="btn btn-info" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New user</a>  
                    </div>
                </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Group</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Group</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{ optional($user->group)->title }}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td class="text-right">
                                                <form method="POST" action="{{  route('users.destroy', ['user' => $user->id]) }}"> 
                                                <a class="btn btn-info" href="{{ route('users.show', ['user' => $user->id])}}"><i class="fa fa-eye"></i></a> 
                                                <a class="btn btn-info" href="{{ route('users.edit', ['user' => $user->id])}}"><i class="fa fa-edit"></i></a>
                                                 @csrf
                                                 @method('DELETE')
                                                 <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>  
                                                </form>
                                            </td>   
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

            <!-- End of Main Content -->
    </div>
@stop