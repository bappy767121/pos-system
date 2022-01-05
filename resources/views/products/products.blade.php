@extends('layout.main')

@section('mainContent')

<!-- Begin Page Content -->
            <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container-fluid">
                    <!-- Page Heading -->
                <div class="row clearfix">
                    <div class="col-md-6">
                      <h1 class="h3 mb-2 text-gray-800">products</h1>  
                    </div>
                    <div class="col-md-6 text-right">
                      <a class="btn btn-info" href="{{ url('products/create') }}"> <i class="fa fa-plus"></i> New product</a>  
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
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Cost Price</th>
                                            <th>Actuion</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Cost Price</th>
                                            <th>Actuion</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->title}}</td>
                                            <td>{{optional($product->category)->title}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->cost_price}}</td>
                                            <td class="text-right">
                                                <form method="POST" action="{{  route('products.destroy', ['product' => $product->id]) }}"> 
                                                <a class="btn btn-info" href="{{ route('products.show', ['product' => $product->id])}}"><i class="fa fa-eye"></i></a> 
                                                <a class="btn btn-info" href="{{ route('products.edit', ['product' => $product->id])}}"><i class="fa fa-edit"></i></a>
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
@stop