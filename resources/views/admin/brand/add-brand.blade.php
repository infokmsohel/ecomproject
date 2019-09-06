@extends('admin.master')

@section('title')
    Add Brand
@endsection

@section('body')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Add Brand </h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <form action="{{route('saveBrand')}}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Name</label>
                            <div class="col-md-9">
                                <input type="text" name="brand_name" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ''  }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Description</label>
                            <div class="col-md-9">
                                <textarea name="brand_description" class="form-control"></textarea>
                                <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ''  }}</span>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Publication Status</label>
                                <div class="col-md-9">
                                    <label><input type="radio" name="publication_status" value="1" />Publish</label>
                                    <label><input type="radio" name="publication_status" value="0" />Unpublish</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" name="btn" value="Save Brand" class="btn btn-success btn-block"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection