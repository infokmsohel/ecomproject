@extends('front.master')
@section('title')
     Customer Registration
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Registration Page</li>
            </ol>
        </div>
    </div>

   <div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">New Customer Registration</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    {!! Form::open(['route' => 'save-customer-registration' , 'method' => 'POST', 'class' =>'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="control-label col-md-3">First Name</label>
                        <div class="col-md-9">
                            <input type="text" name="first_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : ''  }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" name="last_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : ''  }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Mobile No</label>
                        <div class="col-md-9">
                            <input type="number" name="number" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('number') ? $errors->first('number') : ''  }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Date of Birth</label>
                        <div class="col-md-9">
                            <input type="date" name="date_of_birth" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : ''  }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <input type="text" name="address" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ''  }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" id="email" name="email" class="form-control"/>
                            <span id="emailText" class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''  }}</span>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-3 control-label">Password</label>

                        <div class="col-md-9">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>
                        <div class="col-md-9">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    {{--<div class="g-recaptcha" data-sitekey="6LcfxkgUAAAAAA_X75aP5ZkBcJdL58pTd0Mera1Z"></div>--}}

                    <div class="form-group">

                        <div class="col-md-3 col-md-offset-3">

                            {!! NoCaptcha::display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Registered" class="btn btn-success btn-block"/>
                        </div>
                    </div>
                </div>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        var emailaddres = document.getElementById('email');
        emailaddres.onblur = function () {

            var inputData= document.getElementById('email').value ;

            var xmlhttp= new XMLHttpRequest();

            xmlhttp.open('GET','http://localhost/php73/public/email-check/'+inputData);
            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                    document.getElementById('emailText').innerHTML=xmlhttp.responseText

                }


            }

            xmlhttp.send(null);

            
        }
    </script>
@endsection