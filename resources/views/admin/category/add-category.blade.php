@extends('admin.master')

@section('title')
Add Category
@endsection

@section('body')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Add Category Form</h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    {!! Form::open(['route' => 'save-category' , 'method' => 'POST', 'class' =>'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" class="form-control"/>
                        </div>
                    </div>

                        <div class="form-group">
                             <label class="control-label col-md-3">Category Description</label>
                        <div class="col-md-9">
                            <textarea name="category_description" class="form-control"></textarea>
                        </div>
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
                                <input type="submit" name="btn" value="Save Category" class="btn btn-success btn-block"/>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection