@extends('front.master')

@section('title')
    Show Cart
@endsection

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <div class="checkout">
        <div class="container">
            <h2>Your shopping cart contains: </h2>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Product</th>
                        <th>Quality</th>
                        <th>Product Name</th>

                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </thead>

                    @php($i=1)
                    @php($sum=0)

                    @foreach($cartProducts as $cartProduct)
                    <tr class="rem1">
                        <td class="invert">{{ $i++ }}</td>
                        <td class="invert-image"><a href=""><img src="{{ asset($cartProduct->options->image) }}" alt=" " class="img-responsive" /></a></td>

                        <td >
                            <form action=" {{ route('update-cart-qty') }}" method="post">
                                {{ csrf_field() }}
                                <input type="number" name="qty" value="{{ $cartProduct->qty  }}">
                                <input type="hidden" name="rowId" value="{{ $cartProduct->rowId  }}">
                                <input type="submit" name="btn" value="update" class="btn btn-success">
                            </form>

                            {{--<form action="{{ route('update-cart-product') }}" method="POST">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<input type="number" name="a" value="{{ $cartProduct->qty }}" min="1"/>--}}
                                {{--<input type="hidden" name="b" value="{{ $cartProduct->rowId }}"/>--}}
                                {{--<input type="submit" name="btn" value="Update"/>--}}
                            {{--</form>--}}


                        </td>

                        <td class="invert">{{ $cartProduct->name }}</td>

                        <td class="invert">{{ $total=$cartProduct->price*$cartProduct->qty  }}</td>
                        <td class="invert">

                            <a href="{{ route('delete-cart-product',['id' =>$cartProduct->rowId ]) }}" class="btn btn-danger">Delete</a>

                            {{--<div class="rem">--}}
                                {{--<div class="close1"> </div>--}}
                            {{--</div>--}}
                            {{--<script>$(document).ready(function(c) {--}}
                                    {{--$('.close1').on('click', function(c){--}}
                                        {{--$('.rem1').fadeOut('slow', function(c){--}}
                                            {{--$('.rem1').remove();--}}
                                        {{--});--}}
                                    {{--});--}}
                                {{--});--}}
                            {{--</script>--}}
                        </td>
                    </tr>
                    @php( $sum=$sum+$total)
                    @endforeach




                    <!--quantity-->
                    <script>
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->
                </table>
            </div>
            <div class="checkout-left">
                <div class="checkout-left-basket">
                    <a href="{{ route('/') }}"><h4>Continue to basket</h4></a>

                    @foreach($cartProducts as $cartProduct)
                    <ul>
                        <ul>
                        <li>{{ $cartProduct->name }}<i>-</i> <span>Tk {{ $cartProduct->price*$cartProduct->qty  }} </span></li>
                        </ul>
                        @endforeach
                    <ul>
                        <li>Total price <i>-</i> <span>{{ $sum }}</span></li>
                        <li>Total Service Charges <i>-</i> <span>TK 75</span></li>
                        <li>Vat & Tax <i>-</i> <span>{{ $vat =$sum*0.15 }}</span></li>
                        <li>Total <i>-</i> <span>{{ $grandTotal=$sum+$vat+75 }}</span></li>
                        @php(Session::put('grandTotal',$grandTotal))
                    </ul>
                    </ul>
                    @if(Session::get('customerId') && Session::get('shippingId'))
                        <a href="{{ route('payment-type') }}" class=""><h4>Check Out<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></h4></a>
                        @else
                            <a href="{{ route('checkout') }}" class=""><h4>Check Out<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></h4></a>
                        @endif

                </div>

                <div class="checkout-right-basket">
                    <a href="{{ route('/') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@endsection