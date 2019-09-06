@extends('admin.master')

@section('title')
    Edit Product
@endsection

@section('body')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Edit Product Information </h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <form action="{{route('updateProduct')}}" name="editForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control">
                                    <option>--Select-Category-Name--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" class="form-control">
                                    <option>Select Brand Name</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control"/>
                                <input type="hidden" value="{{ $product->id }}" name="product_id" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ''  }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Price</label>
                            <div class="col-md-9">
                                <input type="text" value="{{ $product->product_price }}" name="product_price" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ''  }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Quantity</label>
                            <div class="col-md-9">
                                <input type="text" value="{{ $product->product_quantity }}" name="product_quantity" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ''  }}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Short Description</label>
                            <div class="col-md-9">
                                <textarea name="short_description" class="form-control">{{ $product->short_description }}</textarea>
                                <span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ''  }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Long Description</label>
                            <div class="col-md-9">
                                <textarea name="long_description" id="editor" class="form-control">{{ $product->long_description }}</textarea>
                                <span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ''  }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" name="product_image" accept="image/*">
                                <img src="{{ asset($product->product_image) }}" alt="" height="100" width="100" />
                                <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : ''  }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <label><input type="radio"{{ $product->publication_status == 1 ? 'checked': '' }} name="publication_status" value="1" />Publish</label>
                                <label><input type="radio"{{ $product->publication_status == 0 ? 'checked': '' }} name="publication_status" value="0" />Unpublish</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" value="Update Product" class="btn btn-success btn-block"/>
                            </div>
                        </div>
                        {{--</div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['editForm'].elements['category_id'].value='{{ $product->category_id  }}';
        document.forms['editForm'].elements['brand_id'].value='{{ $product->brand_id  }}';
    </script>


@endsection