@extends('admin/index')

@section('title','SUB CATEGORY')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('finalize-site-admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Sub Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Sub Category</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('finalize-site-admin/sub-category-add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id">
                                        <option value="">Select category</option>
                                        @foreach($cate_info as $single_info)
                                        <option value="{{$single_info->cat_id}}">{{$single_info->cate_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Parent Sub Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="parent_id">
                                        <option value=0>Select parent category</option>
                                        @foreach($all_info as $single_info)
                                        <option value="{{$single_info->subcat_id}}">{{$single_info->subcate_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="subcate_name">Name</label>
                                    <input type="text" name="subcate_name" class="form-control" id="subcate_name"
                                    placeholder="Enter name" value="mobile{{old('subcate_name')}}">
                                    @error('subcate_name')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" name="description"
                                    placeholder="description">sub cate content {{old('description')}}</textarea>
                                    @error('description')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status" checked
                                        id="active_status" value="0">
                                        <label for="active_status" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                        id="inactive_status" value="1">
                                        <label for="inactive_status" class="custom-control-label">Inactive</label>
                                    </div>
                                    @error('status')
                                    <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
@stop