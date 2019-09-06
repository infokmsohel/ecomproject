@extends('admin.master')

@section('title')
    Manage Order
@endsection

@section('body')

    <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Manage Order</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-info">
                            <th>Order Id</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>

                 @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id  }}</td>
                                <td>{{ $order->first_name.' '.$order->last_name  }}</td>
                                <td>{{ $order->order_total  }}</td>
                                <td>{{ $order->order_status  }}</td>
                                <td>{{ $order->created_at  }}</td>
                                <td>{{ $order->payment_type  }}</td>
                                <td>{{ $order->payment_status  }}</td>
                                <td>

                                    <a href="{{ route('view-order-details',['id' =>$order->id]) }}" class="btn btn-info btn-xs" title="View order">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>

                                    <a href="{{ route('view-invoice',['id' =>$order->id]) }}" class="btn btn-success btn-xs" title="View Invoice">
                                        <span class="glyphicon glyphicon-zoom-out"></span>
                                    </a>

                                    <a href=" {{ route('download-invoice',['id' =>$order->id]) }} " class="btn btn-info btn-xs" title="Download Invoice">
                                        <span class="glyphicon glyphicon-download"></span>
                                    </a>

                                    <a href="" class="btn btn-info btn-xs" title="Download Invoice">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="" class="btn btn-info btn-xs" title="Update">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>

                                </td>
                            </tr>
                 @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection