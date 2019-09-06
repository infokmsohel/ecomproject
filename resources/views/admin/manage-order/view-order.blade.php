@extends('admin.master')

@section('title')
    View Order
@endsection

@section('body')

    <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Order Information</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <table class="table table-bordered">

                        <tr >
                            <th>Order Date</th>
                            <td>{{ $order->created_at }}</td>
                        </tr>

                        <tr >
                            <th>Order Total</th>
                            <td>{{ $order->order_total }}</td>
                        </tr>

                        <tr >
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Customer Information</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <table class="table table-bordered">

                        <tr >
                            <th>Customer Name</th>
                            <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                        </tr>

                        <tr >
                            <th>Phone No</th>
                            <td>{{$customer->number  }}</td>
                        </tr>

                        <tr >
                            <th>Email Address</th>
                            <td>{{$customer->email  }}</td>
                        </tr>

                        <tr >
                            <th> Address</th>
                            <td>{{$customer->address  }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Shipping Information</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <table class="table table-bordered">

                        <tr >
                            <th>Full Name</th>
                            <td>{{ $shipping->first_name.' '.$shipping->last_name }}</td>
                        </tr>

                        <tr >
                            <th>Phone No</th>
                            <td>{{$shipping->number  }}</td>
                        </tr>

                        <tr >
                            <th>Email Address</th>
                            <td>{{$shipping->email  }}</td>
                        </tr>

                        <tr >
                            <th> Address</th>
                            <td>{{$shipping->address  }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Payment Information</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <table class="table table-bordered">

                        <tr >
                            <th>Payment type</th>
                            <td>{{ $payment->payment_type }}</td>
                        </tr>

                        <tr >
                            <th>Payment Status</th>
                            <td>{{ $payment->payment_status }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Product Order Information</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <table class="table table-bordered">

                        <tr >
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total price</th>
                        </tr>
@foreach($orderDetail as $orderDetails)
                        <tr >
                            <td>{{ $orderDetails->product_name  }}</td>
                            <td>{{ $orderDetails->product_price  }}</td>
                            <td>{{ $orderDetails->product_qty  }}</td>
                            <td>{{ $orderDetails->product_price*$orderDetails->product_qty  }}</td>
                        </tr>
    @endforeach




                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection