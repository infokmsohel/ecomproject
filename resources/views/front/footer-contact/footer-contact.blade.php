@extends('admin.master')

@section('title')
    Footer Contact
@endsection

@section('body')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Footer  Form</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    {!! Form::open(['route' => 'save-footer' , 'method' => 'POST', 'class' =>'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="control-label col-md-3"> Address</label>
                        <div class="col-md-9">
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Number</label>
                        <div class="col-md-9">
                            <input type="number" name="number" class="form-control"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Save Footer Contact" class="btn btn-success btn-block"/>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection