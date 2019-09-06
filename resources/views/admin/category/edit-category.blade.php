@extends('admin.master')

@section('title')
    Edit Category
@endsection

@section('body')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-success text-center">Edit Category </h3>
                </div>
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    <form action="{{route('updateCat')}}" method="post" class="form-horizontal" style="border: 2px ">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{ $categories->category_name }}" name="category_name" class="form-control"/>
                                <input type="hidden" value="{{ $categories->id }}" name="category_id" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Category Description</label>
                            <div class="col-md-9">
                                <textarea name="category_description"  class="form-control">{{ $categories->category_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Publication Status</label>
                                <div class="col-md-9">
                                    <label><input type="radio" {{ $categories->publication_status == 1 ? 'checked ': '' }} name="publication_status" value="1" />Publish</label>
                                    <label><input type="radio" {{ $categories->publication_status == 0 ? 'checked ': '' }} name="publication_status" value="0" />Unpublish</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" name="btn" value="Update Category" class="btn btn-success btn-block"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection