@extends('front.master')

@section('title')
    Shipping Info
@endsection

@section('body')



    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Shipping Info</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- register -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Shipping Information</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    {!! Form::open(['route' => 'save-shipping-info' , 'method' => 'POST', 'class' =>'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="control-label col-md-3">First Name</label>
                        <div class="col-md-9">
                            <input type="text" value="{{ $customer->first_name }}" name="first_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : ''  }}</span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" value="{{ $customer->last_name }}" name="last_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : ''  }}</span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Mobile No</label>
                        <div class="col-md-9">
                            <input type="number" value="{{ $customer->number }}" name="number" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('number') ? $errors->first('number') : ''  }}</span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <input type="text" value="{{ $customer->address }}"  name="address" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ''  }}</span>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email"  value="{{ $customer->email }}" name="email" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''  }}</span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Gender Male</label>
                        <div class="col-md-9">
                            <label><input type="radio" name="gender" value="Male" />Male</label>
                            <label><input type="radio" name="gender" value="Female" />Female</label>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Saved Shipping Info" class="btn btn-success btn-block"/>
                        </div>
                    </div>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection