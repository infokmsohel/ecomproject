@extends('front.master')

@section('title')
    Payment Type
@endsection

@section('body')

    <br/>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 well text-center text-success">
            Dear {{ Session::get('CustomerName') }}. You have to give us product Payment info to complete your valuable order.
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
            <form class="form-horizontal" action="{{ route('new-order') }}" method="POST">
                {{ csrf_field() }}
                <table class="table table-bordered">
                    <tr>
                        <th>Cash On Delivery</th>
                        <td><input type="radio" name="payment_type" value="Cash"></td>
                    </tr>
                    <tr>
                        <th>Paypal</th>
                        <td><input type="radio" name="payment_type" value="Paypal"></td>
                    </tr>
                    <tr>
                        <th>BKash</th>
                        <td><input type="radio" name="payment_type" value="Bkash"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" name="btn" value="Confirm Order" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


@endsection