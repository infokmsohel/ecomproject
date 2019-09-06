@extends('front.master')

@section('title')
    404 Not Found
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active"></li>
            </ol>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="agileinfo_single">

                <div class="wrap">
                    <!---start-header---->
                    {{--<div class="header">--}}
                        {{--<div class="logo">--}}
                            {{--<h1><a href="#">Ohh</a></h1>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!---End-header---->
                    <!--start-content------>
                    <div class="content">
                        <img src="{{ asset('/') }}/front/images2/error-img.png" title="error" />
                        <p><span><label>O</label>hh.....</span>We can't seem to find the page you're looking for</p>
                        <a href="{{ route('/') }}">Back To Home</a>
                        <div class="copy-right">
                            {{--<p>&copy; 2013 Ohh. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3Layouts</a></p>--}}
                        </div>
                    </div>
                    <!--End-Cotent------>
                </div>



                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>



    <!-- new -->


@endsection