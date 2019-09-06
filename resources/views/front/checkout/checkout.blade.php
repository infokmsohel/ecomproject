@extends('front.master')

@section('title')
    Check Out
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Login Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h2>Login Form</h2>

            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="{{ route('customer-login') }}" method="post">
                    {{ csrf_field() }}
                    <h4 class="text-center">{{Session::get('message')}}</h4>
                    <input type="email" name="email" placeholder="Email Address" >
                    <input type="password" name="password" placeholder="Password"  >
                    <div class="forgot">
                        <a href="">Forgot Password?</a>
                    </div>
                    <input type="submit" name="btn" value="Log In">
                </form>
            </div>
            <h4>For New People</h4>
            <p><a href="{{ route('registered') }}">Register Here</a> (Or) go back to <a href="{{ route('/') }}">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>
    </div>
    <!-- //login -->
@endsection