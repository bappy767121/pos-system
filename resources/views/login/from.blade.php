@extends('layout.primary')

@section('page_body')

<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        @if ($errors->any())
										    <div class="alert alert-danger">
										        <ul>
										            @foreach ($errors->all() as $error)
										                <li>{{ $error }}</li>
										            @endforeach
										        </ul>
										    </div>
										@endif
                                    </div>
                                    {!! Form::open([ 'route' => 'login.confirm', 'method' => 'post' ]) !!}
                                    <form class="user">
                                        <div class="form-group">
                                        	{{Form::text('email',$value=null,['class'=>'form-control form-control-user','placeholder' => 'Enter Email Address...', 'id'=> 'email'])}}
                                        </div>
                                        <div class="form-group">
                                        	{{Form::password('password',['class'=>'form-control form-control-user','placeholder' => 'Password', 'id'=> 'password'])}}
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        {{Form::submit('Login',['class'=>'btn btn-primary btn-user btn-block', 'name'=>'btn'])}}
                                        
                                        
                                    </form>
                                    {!! Form::close() !!}
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@stop