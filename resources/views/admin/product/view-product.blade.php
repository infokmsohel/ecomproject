@extends('admin.master')

@section('title')
    View Product
@endsection

@section('body')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">View Product</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    <table class="table table-bordered">

                        <tr>
                            <th>Product Id</th>
                            <td>{{ $product->id }}</td>
                        </tr>

                        <tr>
                            <th>Category Id</th>
                            <td>{{ $product->category_id }}</td>
                        </tr>

                        <tr>
                            <th>Brand Id</th>
                            <td>{{ $product->brand_id }}</td>
                        </tr>

                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->product_name }}</td>
                        </tr>

                        <tr>
                            <th>Product Price</th>
                            <td>{{ $product->product_price }}</td>
                        </tr>

                        <tr>
                            <th>Product Quantity</th>
                            <td>{{ $product->product_quantity }}</td>
                        </tr>

                        <tr>
                            <th>Short description</th>
                            <td>{{ $product->short_description }}</td>
                        </tr>

                        <tr>
                            <th>Long description</th>
                            <td>{!! $product->long_description !!}</td>
                        </tr>

                        <tr>
                            <th>Product Image</th>
                            <td><img src="{{ asset($product->product_image) }}" alt="" height="200" width="450" /></td>
                        </tr>

                        <tr>
                            <th>Publication Status</th>
                            <td>{{ $product->publication_status == 1 ? 'Published': 'Unpublished' }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection