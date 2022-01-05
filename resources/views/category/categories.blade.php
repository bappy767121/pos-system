@extends('layout.main')

@section('mainContent')
<!-- Begin Page Content -->
            <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container-fluid">
                    <!-- Page Heading -->
                <div class="row clearfix">
                    <div class="col-md-6">
                      <h1 class="h3 mb-2 text-gray-800">category categories</h1>  
                    </div>
                    <div class="col-md-6 text-right">
                      <a class="btn btn-info" href="{{ url('categories/create') }}"> <i class="fa fa-plus"></i> New Category</a>  
                    </div>
                </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->title}}</td>
                                            <td class="text-right">
                                                <form method="POST" action="{{ url('categories/'.$category->id) }}">
                                                 @csrf
                                                 @method('DELETE')
                                                 <a class="btn btn-info" href="{{ route('categories.edit', ['category' => $category->id])}}"><i class="fa fa-edit"></i></a>
                                                 <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>  
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
@stop